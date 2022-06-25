<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomSiswaModel extends Model
{
    protected $table      = 'tb_roomsiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_room','id_siswa','id_guru','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public function getDaftarSiswaByidroom($id){
        return $this->join('tb_profile','tb_profile.id=tb_roomsiswa.id_siswa')->where(['id_room'=>$id])->find();
    }
    public function getRoomByIdSiswa($id_siswa){
        return $this->join('tb_roomguru','tb_roomguru.id_room=tb_roomsiswa.id_room')->join('tb_profile','tb_profile.id=tb_roomsiswa.id_guru')->where(['id_siswa'=>$id_siswa])->find();
    }
    public function cekDaftarSiswaRoom($id_siswa,$id_room){
        return $this->where(['id_siswa'=>$id_siswa,'id_room'=>$id_room])->first();
    }
    
}