<?php

namespace App\Models;

use CodeIgniter\Model;

class DataCommentRoomModel extends Model
{
    protected $table      = 'tb_datacommentroom';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_user','id_dataroom','role','comment'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    
}