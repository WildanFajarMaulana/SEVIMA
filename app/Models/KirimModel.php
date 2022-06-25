<?php

namespace App\Models;

use CodeIgniter\Model;

class KirimModel extends Model
{
    protected $table      = 'tb_kirim';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_task','id_room','id_siswa','nilai','status','nama','gambar'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKirimSiswa($id_task,$id_room,$id_siswa){
        return $this->where(['id_task'=>$id_task,"id_room"=>$id_room,"id_siswa"=>$id_siswa])->first();
    }
    public function getDataKirimSiswaAll($id_task,$id_room){
        return $this->where(['id_task'=>$id_task,"id_room"=>$id_room])->find();
    }
    public function deteleKirim($id_task,$id_room,$id_siswa){
        $sql="DELETE FROM tb_kirim WHERE id_task='$id_task' AND id_room='$id_room' AND id_siswa='$id_siswa'";
        return $this->query($sql);
    }
    public function getDataNewKirim($id_task,$id_room,$id_siswa){
        return $this->where(['id_task'=>$id_task,"id_room"=>$id_room,"id_siswa"=>$id_siswa])->orderBy('id','DESC')->first();
    }
    
}