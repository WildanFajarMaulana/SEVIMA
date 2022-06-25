<?php

namespace App\Controllers;
use App\Models\ProfileModel;


class DefaultPage extends BaseController
{
    protected $ProfileModel;

    public function __construct(){
        $this->ProfileModel = new ProfileModel();
    }
    
    public function index()
    {
       
       $data['title']='W-Clashroom | Home';
       $data['js']='home.js';
       $data['css']='home.css';
       return view('defaultPage/home',$data);
    }
    public function profile()
    {
      
       $data['profile']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $data['title']='W-Clashroom | Profile';
       $data['js']='profile.js';
       $data['css']='profile.css';
       return view('defaultPage/profile',$data);
    }
    public function getDetailProfile(){
        if($this->request->isAJAX()){
            $data['profile']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
            $mhs=[
                'user'=>$data['profile']
            ];
            echo json_encode($mhs);
        }else{
            exit("request tidak dapat dilakukan");
        }
    }
    public function tambahProfile(){
        if($this->request->isAJAX()){
           $validation=\Config\Services::validation();
           $valid=$this->validate([
               'nama'=>[
                   'rules'=>'required',
                   'errors'=>[
                       'required'=>'{field} must be filled'
                       
                   ]
               ],
                'alamat'=>[
                       'rules'=>'required',
                       'errors'=>[
                           'required'=>'{field} must be filled'
                       ]
               ],
                'foto'=>[
                       'rules'=>'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                       'errors'=>[
                           'max_size'=>'image size is too big',
                           'is_image'=>'what you choose is not a picture',
                           'mime_in'=>'Incorrect format'
                       ]
               ]
           ]);

             if(!$valid){
               $msg=[
                   'error'=>[
                       'nama'=>$validation->getError('nama'),
                       'alamat'=>$validation->getError('alamat'),
                       'foto'=>$validation->getError('foto')
                   ]
               ];
              
             }else{
               // ambil gambar
               $fileFoto=$this->request->getFile('foto');
               if($fileFoto==''){
                   $namaFoto='default.jpg';
               }else{
               // generate nama Foto random
               $namaFoto=$fileFoto->getRandomName();
               // pindahkan file ke folder image
               $fileFoto->move('images',$namaFoto);
               // ambil nama file
               // $namaFoto=$fileFoto->getName();
               }
               $data=[
                   'id_login'=>session()->get('id'),
                   'nama'=>$this->request->getPost("nama"),
                   'foto'=>$namaFoto,
                   'alamat'=>$this->request->getPost("alamat"),
               ];

               
               $this->ProfileModel->save($data);

               $msg=[
                   'success'=>'Profile Berhasil Ditambahkan'
                ];
           
             }
        
             echo json_encode($msg);




       }else{
           exit('request tidak dapat dilakukan');
       }
   }
   public function editProfile(){
    if($this->request->isAJAX()){
       $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $valid=$this->validate([
        'nama'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'{field} must be filled'
                
            ]
        ],
         'alamat'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'{field} must be filled'
                ]
        ],
         'foto'=>[
                'rules'=>'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size'=>'image size is too big',
                    'is_image'=>'what you choose is not a picture',
                    'mime_in'=>'Incorrect format'
                ]
        ]
    ]);

      if(!$valid){
        $msg=[
            'error'=>[
                'nama'=>$validation->getError('nama'),
                'alamat'=>$validation->getError('alamat'),
                'foto'=>$validation->getError('foto')
            ]
        ];
       
      }else{
           $fotoUser=$this->request->getFile('foto');
           if($fotoUser==''){
               $namaFotoUser=$this->request->getPost('fotoLama');
           }else{

           // generate nama sampul random
           $namaFotoUser=$fotoUser->getRandomName();
           // pindahkan file ke folder image
           $fotoUser->move('images',$namaFotoUser);
         
           }

           $data=[
               'id'=>$data['profilByIdLogin'],
               'nama'=>$this->request->getPost("nama"),
               'foto'=>$namaFotoUser,
               'alamat'=>$this->request->getPost("alamat")
               
           ];

           
           $this->ProfileModel->save($data);

           $msg=[
               'success'=>'Profile Berhasil Diupdate'
            ];
       

         echo json_encode($msg);
       }



   }else{
       exit('request tidak dapat dilakukan');
   }
}
}