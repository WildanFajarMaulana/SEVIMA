<?php

namespace App\Controllers;
use App\Models\LoginModel;


class Auth extends BaseController
{
    protected $LoginModel;

    public function __construct(){
        $this->LoginModel = new LoginModel();
    }
    public function index()
    {
       
       $data['title']='W-Clashroom | Login';
       $data['js']='login.js';
       $data['css']='login.css';
       return view('auth/login',$data);
    }
    public function register()
    {
       
       $data['title']='W-Clashroom | Register';
       $data['js']='register.js';
       $data['css']='register.css';
       return view('auth/register',$data);

    }
    public function prosesRegister(){
        if($this->request->isAJAX()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'username'=>[
                    'rules'=>'required|is_unique[tb_login.username]',
                    'errors'=>[
                        'required'=>'{field} must be filled',
                        'is_unique'=>'{field}  sudah terdaftar'
                        
                    ]
                ],
                 'password'=>[
                        'rules'=>'required|min_length[5]',
                        'errors'=>[
                            'required'=>'{field} must be filled',
                            'min_length'=>'isi password minimal 5'
                        ]
                ],
                 'konfirmasiPassword'=>[
                        'rules'=>'required|matches[password]',
                        'errors'=>[
                            'required'=>'{field} must be filled',
                            'matches'=>'{field}  tidak sama'
                        ]
                ],
                'role'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field} must be filled'
                        
                    ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'error'=>[
                        'username'=>$validation->getError('username'),
                        'password'=>$validation->getError('password'),
                        'konfirmasiPassword'=>$validation->getError('konfirmasiPassword'),
                        'role'=>$validation->getError('role')
                    ]
                ];               
              }else{
                $data=[
                    'username'=>$this->request->getPost("username"),
                    'password'=>password_hash($this->request->getPost("password"),PASSWORD_BCRYPT),
                    'role'=>$this->request->getPost("role"),
                ];
                $this->LoginModel->save($data);

                $msg=[
                    'success'=>'Registrasi Berhasil'
                ];
            
              }
              echo json_encode($msg);




        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function prosesLogin(){
        
        if($this->request->isAJAX()){

            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'username'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field} must be filled'
                        ]
                ],
                 'password'=>[
                        'rules'=>'required|',
                        'errors'=>[
                            'required'=>'{field} must be filled'
                          
                        ]
                ]
            ]);

              if(!$valid){
                $msg=[
                    'errorValid'=>[
                        'username'=>$validation->getError('username'),
                        'password'=>$validation->getError('password')
                    ]
                ];
               
              }else{

                $username=$this->request->getPost('username');
                $password=$this->request->getPost('password');

                $user=$this->LoginModel->getUser($username);
                if ($user) {
                        if (password_verify($password, $user['password'])) {
                            // session
                            session()->set([
                             'username' => $user['username'],
                             'role' => $user['role'],
                             'id'=>$user['id']
                             ]);
                            if($user['role']=='siswa'){
                             $msg=[
                                'successSiswa'=>'anda login sebagai Siswa'
                             ];    
                            }else if($user['role']=='guru'){
                             $msg=[
                                'successGuru'=>'anda login sebagai Guru'
                             ];    
                            } 
                            else if($user['role']=='admin'){
                                $msg=[
                                   'successAdmin'=>'anda login sebagai Admin'
                                ];    
                               } 
                            else{
                               $msg=[
                                'successNull'=>'null'
                             ]; 
                            }
                        }else{
                             $msg=[
                                'errorPassword'=>'Password Salah'
                             ];  
                                
                        }
                }else
                {
                     $msg=[
                                'errorUsername'=>'Username Tidak Terdaftar'
                     ];  
                }
                
              }
              echo json_encode($msg);
        }else{
            exit("request tidak dapat dilakukan");
        }
        
    }
    public function logout(){
         
        if($this->request->isAJAX()){
        
            session()->destroy();
            $msg=[
                'data'=>'Logout Berhasil'
            ];

         
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
        
    }
}