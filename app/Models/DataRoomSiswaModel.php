<?php

namespace App\Models;

use CodeIgniter\Model;

class DataRoomSiswaModel extends Model
{
    protected $table      = 'tb_dataroomsiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_dataroom','id_siswa','image'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    public function getDataSubmit($id_task){
        $this->where(['id_dataroom'=>$id_task])->find();
    }
    
}