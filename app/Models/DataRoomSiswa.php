<?php

namespace App\Models;

use CodeIgniter\Model;

class DataRoomSiswaModel extends Model
{
    protected $table      = 'tb_dataroomsiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_dataroom','image'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    
}