<?php

namespace App\Models;

use CodeIgniter\Model;

class DataCommentRoomModel extends Model
{
    protected $table      = 'tb_datacommentroom';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_user','id_dataroom','role','comment','foto'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    public function getKomentarByidtask($id_task){
        return $this->join('tb_profile','tb_profile.id=tb_datacommentroom.id_user')->where(['id_dataroom'=>$id_task])->find();  
    }
    
}