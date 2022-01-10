<?php

namespace App\Controllers;
use App\Models\M_Toko;
use Config\Services;

class C_Toko extends BaseController
{
    protected $toko;
 
    function __construct()
    {
        $this->toko = new M_Toko();
    }

    public function index()
    {
        //search
        // $keyword = $this->request->getVar('keyword');
        // if($keyword)
        // {
        //     $data = array(
        //         'res' => $this->toko->search($keyword),
        //     );
        // }else{
            //get all data
            $data = array(
                'res' => $this->toko->getAllData(),
            );
        // }

        echo view('pages/admin/V_Produk', $data);
    }

    public function admin()
    {
       
        $data = array(
            'res' => $this->toko->getAllData(),
        );

        echo view('pages/admin/V_Produk_Admin', $data);
    }

    public function home()
    {
        return view('pages/admin/V_Home');
    }    

    public function inputData()
    {
        $data = array(
            'error' => false
        );
        return view('pages/admin/V_Produk_Input', $data);
    }

    public function create()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'jumlah_stok' => 'required|numeric',
            // 'gambar' => 'required',
        ]);
        
        $isDataValid = $validation->withRequest($this->request)->run();

        $produk = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $this->request->getFile('gambar')->getName(),
            'berat' => $this->request->getPost('berat'),
            'jumlah_stok' => $this->request->getPost('jumlah_stok'),
        ];

        if($isDataValid){
            $this->toko->insert($produk);
            $this->request->getFile('gambar')->move('assets/images');
            return redirect('admin')->with('success', 'Data Added Succesfully');
        }else{
            $data = array(
                'error' => true
            );
            return view('pages/admin/V_Produk_Input', $data);
        }

    }

    // public function delete($id = 0){        
        
    //     $data = $this->kota->find($id);
    //     if($data)
    //     {
    //         $this->kota->delete($id);
    //     }

    //     return redirect('kota')->with('success', 'Data '.$data['nama_kota']. ' Deleted Succesfully');
    // }

    
    // public function edit($id = 0){
    //     // dd($id);
    //     $data = array(
    //         'res' => $this->kota->find($id),
    //         'error' => false
    //     );
    //     // dd($data);
    //     return view('pages/admin/V_kota_edit',$data);
    // }

    // public function update(){
    //     $id = $this->request->getVar('id');
    //     $session = \Config\Services::session();;
    //     $validation =  \Config\Services::validation();
        
    //     $validation->setRules([
    //         'nama_kota' => 'required',
    //         'jumlah_penduduk' => 'required|numeric'
    //     ]);

    //     $isDataValid = $validation->withRequest($this->request)->run();
        
    //     if($isDataValid){
    //         $updatedData = [
    //             "nama_kota" => $this->request->getPost('nama_kota'),
    //             "jumlah_penduduk" => $this->request->getPost('jumlah_penduduk'),
    //             'image' => $this->request->getFile('image')->getName(),
    //         ];

    //         $this->request->getFile('image')->move('assets/images');

    //         $this->kota->update($id, $updatedData);
    //         $session->setFlashdata('success', 'Data Updated Successfully');

    //         return $this->response->redirect(site_url('kota'));
    //     }else{
    //         $data = array(
    //             'error' => true
    //         );
    //         return view('pages/admin/V_kota_input', $data);
    //     }
    // }

    // public function search()
    // {
    //     $keyword = $this->request->getVar('keyword');
    //     $data = array(
    //         // 'res' => $this->kota->where('nama_kota', $keyword)->first(),
    //         'res' => $this->kota->search($keyword),
    //     );
    //     // dd($data);s
        
    //     return view('pages/admin/V_kota', $data);
    // }

}
