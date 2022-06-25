<?php

namespace App\Models;

use CodeIgniter\Model;

class DataRoomGuruModel extends Model
{
    protected $table      = 'tb_dataroomguru';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_room','id_guru','judul','sub_judul','gambar'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    public function getDataRoomByidguruIdroom($id_guru,$id_room){
        return $this->where(['id_guru'=>$id_guru,'id_room'=>$id_room])->find();
    }
    
}