<?php

namespace App\Controllers;
use App\Models\M_User;

class C_Login extends BaseController
{
    protected $user;
 
    function __construct()
    {
        $this->user = new M_User();
    }

    public function index()
    {
        helper(['form']);
        echo view('pages/V_login');
    } 

    public function auth()
    {
        $session = session();
        $username = $this->request->getPost('no_anggota');
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $data = $this->user->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            // dd($pass, $password);
            if($password == $pass){
                $ses_data = [
                    'no_anggota'       => $data['no_anggota'],
                    'username'     => $data['username'],
                    'password'    => $data['password'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            }else{
                $session->setFlashdata('error', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('error', 'User not Found');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        helper(['form']);
        echo view('pages/V_register');
    } 

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'username'          => 'required|min_length[3]|max_length[20]',
            'password'          => 'required|min_length[6]|max_length[200]',
            'confirm_password'  => 'matches[password]'
        ];

        $data = [
            'id_user',
            'username'     => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password'))
        ];

        if($this->validate($rules)){
            // dd('ad');
            if($this->user->where('username', $data['username'])->first()){
                $data['valid'] = 'Username has been registered before';
                
                echo view('pages/V_register', $data);
            }else {
                $this->user->insert($data);
                return redirect()->to('/login')->with('success', 'Registered Succesfully');
            }
        }else{
            $data['validation'] = $this->validator;
            echo view('pages/V_register', $data);
        }
    }
}