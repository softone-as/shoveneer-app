<?php

namespace App\Controllers;

use App\Models\M_Toko;
use App\Models\M_Jual;
use App\Models\M_Ongkir;
use App\Models\M_Penjualan;

class C_Payment extends BaseController
{
    function __construct()
    {
        $this->toko = new M_Toko();
        $this->jual= new M_Jual();
        $this->penjualan = new M_Penjualan();
        $this->ongkir = new M_Ongkir();
        $this->session = \Config\Services::session();
    }

    public function index()
    {  
        if ($this->session->has('cart')) {
            $data['items'] = array_values(unserialize($this->session->get('cart')));
            // $data['total'] = $this->total();
        } else {
            $data = array();
        }
        
        return view('pages/admin/V_Shopping-Cart', $data);
    }

    public function toCheckout()
    {
        if(!$this->session->has('cart')){
            return redirect('toko/cart')->with('error', 'Tambahkan produk terlebih dahulu!');
        }else{
            $data = array(
                'error' => false
            );
        }

        return view('pages/V_Checkout', $data);
    }

    public function checkout()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'nama_user' => 'required',
            'no_hp' => 'required|regex_match[/^[0-9]{12}$/]',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $item = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kota' => $this->request->getPost('kota')
            );

            $checkout = array($item);
            $this->session->set('checkout', serialize($checkout));

            return redirect('toko/payment')->with('success', 'Success, proceed to payment!');
        }else{
            $data = array(
                'error' => true
            );
            return view('pages/V_Checkout', $data);
        }
    }

    public function toPayment()
    {
        if ($this->session->has('checkout')) {
            $data['checkout'] = array_values(unserialize($this->session->get('checkout')));
            if ($this->session->has('cart')) {                
                $ongkir = $this->ongkir->getOngkir($data['checkout'][0]['kecamatan'])->harga_ongkir;

                $data['cart'] = array_values(unserialize($this->session->get('cart')));
                $data['total'] = $this->total();
                $data['total_berat'] = $this->totalBerat();
                $data['biaya_ongkir'] = $this->totalBerat() * $ongkir;
                $data['total_pembayaran'] = $data['total'] + $data['biaya_ongkir'];

                $payment = (object) array(
                    'subtotal' => $data['total'],
                    'biaya_ongkir' => $data['biaya_ongkir'],
                    'total_pembayaran' => $data['total_pembayaran']
                );
                
                $this->session->set('payment', serialize($payment));
            }
        } else {
            $data = array();
        }
        return view('pages/V_Confirm-Payment', $data);
    }

    private function total()
    {
        $items = array_values(unserialize($this->session->get('cart')));
        $total = 0;
        foreach ($items as $item) {
            $total += $item['harga'] * $item['quantity'];
        }
        return $total;
    }

    private function totalBerat()
    {
        $items = array_values(unserialize($this->session->get('cart')));
        $total_berat = 0;
        foreach ($items as $item) {
            $total_berat += $item['berat'] / 1000;
        }

        if(fmod($total_berat, 1) < 0.3 || bccomp(fmod($total_berat, 1), 0.3, 3) == 0 )
        {
            $total_berat = floor($total_berat);
        }else{
            $total_berat = ceil($total_berat);
        }

        if(round($total_berat) == 0){
            $total_berat = 1 ;
        }
        
        return $total_berat;
    }

    public function confirm()
    {
        if($this->session->has('payment'))
        {
            // dd(unserialize($this->session->get('payment')));
            $cart = array_values(unserialize($this->session->get('cart')));
            $checkout = unserialize($this->session->get('checkout'));
            $payment = unserialize($this->session->get('payment'));
            // dd($cart);
            
            $i = 0;
            $quantity = 0;
            while ($i < count($cart)) {
                $quantity += $cart[$i]['quantity'];
                $total_stok = $this->toko->getStok($cart[$i]['id_produk']);
                // dd($total_stok->jumlah_stok);
                $sisa_stok = $total_stok->jumlah_stok - $quantity;
                // dd($sisa_stok);
                $this->jual->insert([
                    'id_produk' => $cart[$i]['id_produk'],
                    'jumlah_jual' => $quantity,
                    'harga' => $cart[$i]['harga'],
                ]);

                $this->toko->updateData($cart[$i]['id_produk'], $sisa_stok);
                $i++;
            }

            $this->penjualan->insert([
                'tanggal' => date("Y-m-d"),
                'nama' => $checkout[0]['nama_user'],
                'alamat' => $checkout[0]['alamat'],
                'no_hp' => $checkout[0]['no_hp'],
                'kecamatan' => $checkout[0]['kecamatan'],
                'kota' => $checkout[0]['kota'],
                'total_harga' => $payment->total_pembayaran,
            ]);
            
            $this->session->remove('cart');
            $this->session->remove('checkout');
            $this->session->remove('payment');
            return view('pages/V_Success');
        }

    }
}
