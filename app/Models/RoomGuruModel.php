<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomGuruModel extends Model
{
    protected $table      = 'tb_roomguru';
    protected $primaryKey = 'id_room';

    protected $allowedFields = ['id_guru','nama_pembelajaran','kelas','kode_room','jumlah_siswa','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public function getRoomGuruByIdGuru($id_guru){
        return $this->join('tb_profile','tb_profile.id=tb_roomguru.id_guru')->where(['id_guru'=>$id_guru])->find();  
    }

}