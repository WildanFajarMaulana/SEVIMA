<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomSiswaModel extends Model
{
    protected $table      = 'tb_roomsiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_room','id_siswa','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public function getDaftarSiswaByidroom($id){
        return $this->join('tb_profile','tb_profile.id=tb_roomsiswa.id_siswa')->where(['id_room'=>$id])->find();
    }
}