<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\RoomGuruModel;
use App\Models\DataRoomGuruModel;
use App\Models\RoomSiswaModel;
use App\Models\DataCommentRoomModel;
use App\Models\DataRoomSiswaModel;
use App\Models\KirimModel;
class DefaultPage extends BaseController
{
    protected $ProfileModel;
    protected $RoomGuruModel;
    protected $DataRoomGuruModel;
    protected $RoomSiswaModel;
    protected $DataCommentRoomModel;
    protected $DataRoomSiswaModel;
    protected $KirimModel;
    public function __construct(){
        $this->RoomGuruModel = new RoomGuruModel();
        $this->ProfileModel = new ProfileModel();
        $this->RoomSiswaModel = new RoomSiswaModel();
        $this->DataRoomGuruModel = new DataRoomGuruModel();
        $this->DataCommentRoomModel = new DataCommentRoomModel();
        $this->DataRoomSiswaModel = new DataRoomSiswaModel();
        $this->KirimModel = new KirimModel();

    }
    
    public function index()
    {
       $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $data['title']='W-Clashroom | Home';
       $data['js']='home.js';
       $data['css']='home.css';
       return view('defaultPage/home',$data);
    }
    public function profile()
    {
      
       $data['profile']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $data['roomGuru']=$this->RoomGuruModel->getRoomGuruByIdGuru(@$data['profile']['id']);
       $data['roomSiswa']=$this->RoomSiswaModel->getRoomByIdSiswa(@$data['profile']['id']);
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
    public function learning()
    {
       $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $data['roomGuru']=$this->RoomGuruModel->getRoomGuruByIdGuru(@$data['profilByIdLogin']['id']);
       $data['roomSiswa']=$this->RoomSiswaModel->getRoomByIdSiswa(@$data['profilByIdLogin']['id']);
       $data['title']='W-Clashroom | Learning';
       $data['js']='learning.js';
       $data['css']='learning.css';
       return view('defaultPage/learning',$data);
    }
    public function tambahRoomLearning(){
        if($this->request->isAjax()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'nama_pembelajaran'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field} must be filled'
                        
                    ]
                ],
                 'kelas'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field} must be filled'
                        ]
                ],
                'kode_room'=>[
                    'rules'=>'required|is_unique[tb_roomguru.kode_room]',
                    'errors'=>[
                        'required'=>'{field} must be filled',
                        'is_unique'=>'{field}  already use'
                        
                    ]
                ],
            
            ]);

              if(!$valid){
                $msg=[
                    'errorValid'=>[
                        'nama_pembelajaran'=>$validation->getError('nama_pembelajaran'),
                        'kelas'=>$validation->getError('kelas'),
                        'kode_room'=>$validation->getError('kode_room')
                    ]
                ];               
              }else{
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
                $data=[
                    'id_guru'=>  $data['profilByIdLogin']['id'],
                    'nama_pembelajaran'=>$this->request->getPost("nama_pembelajaran"),
                    'kelas'=>$this->request->getPost("kelas"),
                    'kode_room'=>$this->request->getPost("kode_room"),$this->request->getPost('kode_room'),
                    'jumlah_siswa'=>0,
                    'status'=>'open'
                ];
                $this->RoomGuruModel->save($data);

                $msg=[
                    'success'=>'Room Berhasil Dibuat'
                ];
            
              }
              echo json_encode($msg);

        }else{
            exit("request tidak dapat dilakukan");
        }
    }
    public function dataroom($id)
    {
       $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       if(session()->get('role')=='guru'){
        $data['dataRoomGuru']=$this->DataRoomGuruModel->getDataRoomByidguruIdroom( $data['profilByIdLogin']['id'],$id);
       }else{
            
       $data['dataRoomSiswa']=$this->RoomSiswaModel->cekDaftarSiswaRoom(@$data['profilByIdLogin']['id'],$id);
       $data['dataRoomGuru']=$this->DataRoomGuruModel->getDataRoomByidguruIdroom(@$data['dataRoomSiswa']['id_guru'],$id);
       
       }
      
       
       $data['daftarSiswa']=$this->RoomSiswaModel->getDaftarSiswaByidroom($id);
       $data['totalSiswaPerRoom']=$this->RoomGuruModel->gettotalSiswaPerRoom($id);
       $data['roomGuru']=$this->RoomGuruModel->getRoomGuruByIdGuru($data['profilByIdLogin']['id']);
       $data['title']='W-Clashroom | DataRoom';
       $data['js']='dataroom.js';
       $data['css']='dataroom.css';
       $data['id_room']=$id;
       return view('defaultPage/dataroom',$data);
    }
    public function tambahTask(){
        if($this->request->isAjax()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'judul'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'{field} must be filled'
                        
                    ]
                ],
                 'sub_judul'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'{field} must be filled'
                        ]
                ],
                'gambar'=>[
                    'rules'=>'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
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
                        'judul'=>$validation->getError('judul'),
                        'sub_judul'=>$validation->getError('sub_judul'),
                        'gambar'=>$validation->getError('gambar')
                    ]
                ];               
              }else{
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
                 
                $fileFoto=$this->request->getFile('gambar');
                
                if($fileFoto==''){
                    $namaFoto='';
                }else{
                    $namaFoto=$fileFoto->getRandomName();
               
                    $fileFoto->move('images',$namaFoto);
                }
               
                
               
                $data=[
                    'id_room'=>$this->request->getPost('id_room'),
                    'id_guru'=>$data['profilByIdLogin']['id'],
                    'judul'=>$this->request->getPost("judul"),
                    'sub_judul'=>$this->request->getPost("sub_judul"),
                    'gambar'=>$namaFoto,
                ];
                $this->DataRoomGuruModel->save($data);

                $msg=[
                    'success'=>'Task Berhasil Ditambahkan'
                ];
            
              }
              echo json_encode($msg);

        }else{
            exit("request tidak dapat dilakukan");
        }
    }
    public function deleteTask(){
        if($this->request->isAJAX()){
            $this->DataRoomGuruModel->deleteTask($this->request->getPost('id_task'));
            $msg=[
                'success'=>'Menu Berhasil Dihapus'
            ];
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
    
    public function datatask($id_task,$id_room)
    {
       $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
       $data['getDataTask']=$this->DataRoomGuruModel->getDatatask($id_task);
       if(session()->get('role')=='siswa'){
        $data['submitJawaban']=$this->DataRoomSiswaModel->getDataSubmitByIdtaskIdroomSiswa($id_task,$data['profilByIdLogin']['id']);
        $data['kirimJawaban']=$this->KirimModel->getDataKirimSiswa($id_task,$id_room,$data['profilByIdLogin']['id']);
       }else{
        $data['submitJawaban']=$this->DataRoomSiswaModel->getDataSubmitByIdtaskIdroomSiswaAll($id_task);
        $data['kirimJawaban']=$this->KirimModel->getDataKirimSiswaAll($id_task,$id_room);
       }
    
       $data['title']='W-Clashroom | Datatask';
       $data['js']='datatask.js';
       $data['css']='datatask.css';
       $data['id_task']=$id_task;
       $data['id_room']=$id_room;
       return view('defaultPage/datatask',$data);
    }
    public function tambahKomentar(){
        if($this->request->isAjax()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
            $dataKomentar=[
                'id_user'=>$data['profilByIdLogin']['id'],
                'id_dataroom'=>$this->request->getPost('id_task'),
                'role'=>session()->get('role'),
                'comment'=>$this->request->getPost('komentar'),
                'foto'=>$data['profilByIdLogin']['foto']
            ];
            if($this->request->getPost('komentar')==''){

            }else{
                $this->DataCommentRoomModel->save($dataKomentar);
            }
            
            $msg=[
                'success'=>'berhasil'
            ];
            echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
    public function getKomentar(){
        if($this->request->isAjax()){
            $data['getKomentar']=$this->DataCommentRoomModel->getKomentarByidtask($this->request->getGet('id_task'));
            
            $msg=[
               'data'=>view('component/komentar',$data)
            ];
            $msg['token']=csrf_hash();
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
       }
    }
    public function joinRoom(){
        if($this->request->isAjax()){
            $data['cariRoom']=$this->RoomGuruModel->getRoomByKodeRoom($this->request->getPost('kode_room'));
            if($data['cariRoom']){
                $msg=[
                    'success'=>'Room Found',
                    'id_room'=>$data['cariRoom']['id_room']
                ];
            }else{
                $msg=[
                    'error'=>'Room Not Found'
                ];
            }
            echo json_encode($msg);
            
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function konfirmasiJoinRoom(){
        if($this->request->isAjax()){
            $data['getRoom']=$this->RoomGuruModel->getRoomByIdRoom($this->request->getPost('id_room'));
            
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
            $dataRoomSiswa=[
                'id_room'=>$data['getRoom']['id_room'],
                'id_siswa'=>$data['profilByIdLogin']['id'],
                'id_guru'=>$data['getRoom']['id_guru'],
                'status'=>'join'
            ];

            $this->RoomSiswaModel->save($dataRoomSiswa);
           $dataRoomGuru=[
            'id_room'=>$data['getRoom']['id_room'],
            'jumlah_siswa'=>$data['getRoom']['jumlah_siswa']+1
           ];
           $this->RoomGuruModel->save($dataRoomGuru);
           $msg=[
            'success'=>"Congratulations, you have successfully joined"
           ];
            echo json_encode($msg);
            
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function submitTask(){
        if($this->request->isAjax()){
            $validation=\Config\Services::validation();
            $valid=$this->validate([
                'gambar'=>[
                    'rules'=>'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
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
                        'gambar'=>$validation->getError('gambar')
                    ]
                ];               
              }else{
                $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
                 
                $fileFoto=$this->request->getFile('gambar');
                
            
                $namaFoto=$fileFoto->getRandomName();
               
                $fileFoto->move('images',$namaFoto);
                
               
                $dataSubmit=[
                    'id_dataroom'=>$this->request->getPost('id_task'),
                    'id_siswa'=>$data['profilByIdLogin']['id'],
                    'gambar'=>$namaFoto,
                    'status'=>'none'
                ];
                $this->DataRoomSiswaModel->save($dataSubmit);
                $msg=[
                    'success'=>'Berhasil Upload',
                    'id_task'=>$this->request->getPost('id_task'),
                    'id_room'=>$this->request->getPost('id_room')
                ];
                
               
              
            
              }
              echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function getDetailSubmit(){
        if($this->request->isAjax()){
            $dataSubmit=$this->DataRoomSiswaModel->getDetailById($this->request->getGet('id'));
            $mhs=[
                'data'=>$dataSubmit
            ];
            echo json_encode($mhs);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function kirimTask(){
        if($this->request->isAjax()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
            $resultSubmitSiswa=$this->DataRoomSiswaModel->getResultSubmit($this->request->getPost('id_task'),$data['profilByIdLogin']['id']);
        
            $totalSubmitFilter=$this->DataRoomSiswaModel->totalSubmitFilter($this->request->getPost('id_task'),$data['profilByIdLogin']['id']);
            $dataKirim=[
                'id_task'=>$this->request->getPost('id_task'),
                'id_room'=>$this->request->getPost('id_room'),
                'id_siswa'=>$data['profilByIdLogin']['id'],
                'nama'=>$data['profilByIdLogin']['nama'],
                'gambar'=>$data['profilByIdLogin']['foto'],
                'status'=>"kirim"
            ];
            $this->KirimModel->save($dataKirim);
            $dataNewKirim=$this->KirimModel->getDataNewKirim($this->request->getPost('id_task'),$this->request->getPost('id_room'),$data['profilByIdLogin']['id']);
            $dataSubmit=array();
            $dataSubmit2=[];
            foreach($resultSubmitSiswa as $ds){
                array_push($dataSubmit,array(
                    'id'=>$ds['id'],
                    'status'=>'terkirim',
                    'id_kirim'=>$dataNewKirim['id']
                ));
                $dataSubmit2=[
                    'id'=>$ds['id'],
                    'status'=>'terkirim',
                    'id_kirim'=>$dataNewKirim['id']
                ];
            }
            if($totalSubmitFilter==1){
                $this->DataRoomSiswaModel->save($dataSubmit2);
            }else{
                $this->DataRoomSiswaModel->updateBatch($dataSubmit,'id');
            }
          
            $mhs=[
                'success'=>'Success Kirim'
            ];
            echo json_encode($mhs);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function cancelTask(){
        if($this->request->isAjax()){
            $data['profilByIdLogin']=$this->ProfileModel->getProfileByUserLogin(session()->get('id'));
           
            
            $resultSubmitSiswa=$this->DataRoomSiswaModel->getResultSubmit($this->request->getPost('id_task'),$data['profilByIdLogin']['id']);
        
            $totalSubmitFilter=$this->DataRoomSiswaModel->totalSubmitFilter($this->request->getPost('id_task'),$data['profilByIdLogin']['id']);
            $dataSubmit=array();
            $dataSubmit2=[];
            foreach($resultSubmitSiswa as $ds){
                array_push($dataSubmit,array(
                    'id'=>$ds['id'],
                    'status'=>'none',
                    'id_kirim'=>0
                ));
                $dataSubmit2=[
                    'id'=>$ds['id'],
                    'status'=>'none',
                    'id_kirim'=>0
                ];
            }
            if($totalSubmitFilter==1){
                $this->DataRoomSiswaModel->save($dataSubmit2);
            }else{
                $this->DataRoomSiswaModel->updateBatch($dataSubmit,'id');
            }
            $this->KirimModel->deteleKirim($this->request->getPost('id_task'),$this->request->getPost('id_room'),$data['profilByIdLogin']['id']);
            $mhs=[
                'success'=>'Success Cancel'
            ];
            echo json_encode($mhs);
        }else{
            exit('request tidak dapat dilakukan');
        }
    }
    public function getDetailKirim(){
        if($this->request->isAjax()){
            $data['detailTask']=$this->DataRoomSiswaModel->getDataRoomByid($this->request->getGet('id'));
            
            $msg=[
               'data'=>view('component/detailTask',$data)
            ];
            
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
       }
    }
    public function acceptTask(){
        if($this->request->isAjax()){
            $data['dataKirim']=$this->KirimModel->getDataKirimFirst($this->request->getPost('id_kirim'));
            $dataKirim=[
                'id'=>$this->request->getPost('id_kirim'),
                'nilai'=>$this->request->getPost("nilai"),
                'status'=>'selesai'
            ];
            $this->KirimModel->save($dataKirim);
            $resultSubmitSiswa=$this->DataRoomSiswaModel->getResultSubmit($this->request->getPost('id_task'),$data['dataKirim']['id_siswa']);
        
            $totalSubmitFilter=$this->DataRoomSiswaModel->totalSubmitFilter($this->request->getPost('id_task'),$data['dataKirim']['id_siswa']);
            $dataSubmit=array();
            $dataSubmit2=[];
            foreach($resultSubmitSiswa as $ds){
                array_push($dataSubmit,array(
                    'id'=>$ds['id'],
                    'status'=>'selesai',
                    
                ));
                $dataSubmit2=[
                    'id'=>$ds['id'],
                    'status'=>'selesai',
                    
                ];
            }
            if($totalSubmitFilter==1){
                $this->DataRoomSiswaModel->save($dataSubmit2);
            }else{
                $this->DataRoomSiswaModel->updateBatch($dataSubmit,'id');
            }
            $msg=[
                'success'=>'Berhasil Accept',
                'id_task'=>$this->request->getPost('id_task'),
                'id_room'=>$data['dataKirim']['id_room']
            ];
            echo json_encode($msg);
        }else{
            exit('request tidak dapat dilakukan');
       }
    }
    public function hapusDetailTask(){
        if($this->request->isAJAX()){
            $this->DataRoomSiswaModel->deleteTask($this->request->getPost('id'));
            $msg=[
                'success'=>'Detail Task Berhasil Dihapus'
            ];
           
            echo json_encode($msg);
        }else{
             exit('request tidak dapat dilakukan');
        }
    }
}