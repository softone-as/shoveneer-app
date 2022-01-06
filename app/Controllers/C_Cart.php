<?php

namespace App\Controllers;

use App\Models\M_Toko;

class C_Cart extends BaseController
{
    function __construct()
    {
        $this->toko = new M_Toko();
        $this->session = \Config\Services::session();
    }

    public function index()
    {  
        
        if ($this->session->has('cart')) {
            $data['items'] = array_values(unserialize($this->session->get('cart')));
            $data['total'] = $this->total();
        } else {
            $data = array();
        }
        
        return view('pages/admin/V_Shopping-Cart', $data);
    }

    public function addToShoppingCart($id)
    {
        $row = $this->toko->find($id);

        $item = array(
            'id_produk' => $row['id_produk'],
            'gambar' => $row['gambar'],
            'nama_produk' => $row['nama_produk'],
            'jumlah_stok' => $row['jumlah_stok'],
            'berat' => $row['berat'],
            'harga' => $row['harga'],
            'quantity' => 1
        );
        
        if (!$this->session->get('cart')) {
            $cart = array($item);
            $this->session->set('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->get('cart')));
            if ($index == -1) {
                array_push($cart, $item);
                $this->session->set('cart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $cart[$index]['berat'] += $row['berat'];
                $this->session->set('cart', serialize($cart));
            }
        }
        
        return redirect()->to('toko/cart');
    }

    public function remove($id)
    {    
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->get('cart')));
        $cart[$index]['quantity']--;   
        $this->session->set('cart', serialize($cart));
        
        return redirect()->to('toko/cart');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->get('cart')));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id_produk'] == $id) {
                return $i;
            }
        }
        return -1;
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

    public function clearCart()
    {
        $this->session->remove('cart');
        $this->session->remove('checkout');
        $this->session->remove('payment');
        return redirect()->to('toko/cart');
    }

}
