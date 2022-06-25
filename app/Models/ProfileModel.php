<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'tb_profile';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_login','nama','foto','alamat'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function  getProfileByUserLogin($id_login){
    return $this->where(['id_login'=>$id_login])->first();
    } 

    
}