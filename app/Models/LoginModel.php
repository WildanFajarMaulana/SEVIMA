<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'tb_login';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username','password','role'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUser($username){
        $where = "username='$username'";
        return $this->where($where)->first();
      }
   

    
}