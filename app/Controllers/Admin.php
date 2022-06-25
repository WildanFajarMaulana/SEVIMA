<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\RoomGuruModel;
use App\Models\DataRoomGuruModel;
use App\Models\RoomSiswaModel;
use App\Models\DataCommentRoomModel;
use App\Models\DataRoomSiswaModel;
use App\Models\KirimModel;
use App\Models\LoginModel;
class Admin extends BaseController
{
    protected $ProfileModel;
    protected $RoomGuruModel;
    protected $DataRoomGuruModel;
    protected $RoomSiswaModel;
    protected $DataCommentRoomModel;
    protected $DataRoomSiswaModel;
    protected $KirimModel;
    protected $LoginModel;
    public function __construct(){
        $this->RoomGuruModel = new RoomGuruModel();
        $this->ProfileModel = new ProfileModel();
        $this->RoomSiswaModel = new RoomSiswaModel();
        $this->DataRoomGuruModel = new DataRoomGuruModel();
        $this->DataCommentRoomModel = new DataCommentRoomModel();
        $this->DataRoomSiswaModel = new DataRoomSiswaModel();
        $this->KirimModel = new KirimModel();
        $this->LoginModel = new LoginModel();

    }
    public function index()
    {
        $data['title']='Admin | Welcome';
        return view('admin/welcome',$data);
    }
    public function account()
    {
        $data['title']='Admin | Account';
        $data['account']=$this->LoginModel->find();
        return view('admin/dataakun',$data);
    }
    public function roomguru()
    {
        $data['title']='Admin | Room Guru';
        $data['roomguru']=$this->RoomGuruModel->find();
        return view('admin/roomguru',$data);
    }
    public function roomsiswa()
    {
        $data['title']='Admin | Room Siswa';
        $data['roomsiswa']=$this->RoomSiswaModel->find();
        return view('admin/roomsiswa',$data);
    }
    public function roomcomment()
    {
        $data['comment']=$this->DataCommentRoomModel->find();
        $data['title']='Admin | Comment Room';
        return view('admin/commentroom',$data);
    }
    public function dataroomguru()
    {
        $data['dataroomguru']=$this->DataRoomGuruModel->find();
        $data['title']='Admin | Data Room Guru';
        return view('admin/dataroomguru',$data);
    }
    public function dataroomsiswa()
    {
        $data['dataroomsiswa']=$this->DataRoomSiswaModel->find();
        $data['title']='Admin | Data Room Siswa';
        return view('admin/dataroomsiswa',$data);
    }
    public function logout()
    {
        session()->destroy();
        
        return redirect()->to('/'); 

    }
  

  
}