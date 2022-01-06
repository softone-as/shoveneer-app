<?php

namespace App\Controllers;
use App\Models\M_Toko;
use Config\Services;

class C_Toko extends BaseController
{
    protected $kota;
 
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

    public function home()
    {
        return view('pages/admin/V_Home');
    }    

    // public function detail($id)
    // {
    //     $data = [
    //         'id' => $id,
    //         'title' => 'Detail Kota',
    //         'res' => $this->kota->find($id)
    //     ];

    //     return view('pages/admin/V_Detail_Kota', $data);
    // }

    // public function inputData()
    // {
    //     $data = array(
    //         'error' => false
    //     );
    //     return view('pages/admin/V_kota_input', $data);
    // }

    // public function create()
    // {
    //     $validation =  \Config\Services::validation();

    //     $validation->setRules([
    //         'nama_kota' => 'required',
    //         'jumlah_penduduk' => 'required|numeric',
    //     ]);
        
    //     $isDataValid = $validation->withRequest($this->request)->run();

    //     if($isDataValid){
    //         $this->kota->insert([
    //             'nama_kota' => $this->request->getPost('nama_kota'),
    //             'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk'),
    //             'image' => $this->request->getFile('image')->getName(),
    //         ]);
    //         $this->request->getFile('image')->move('assets/images');
    //         return redirect('kota')->with('success', 'Data Added Succesfully');
    //     }else{
    //         $data = array(
    //             'error' => true
    //         );
    //         return view('pages/admin/V_kota_input', $data);
    //     }

    // }

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
