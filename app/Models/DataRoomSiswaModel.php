<?php

namespace App\Models;

use CodeIgniter\Model;

class DataRoomSiswaModel extends Model
{
    protected $table      = 'tb_dataroomsiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_dataroom','id_siswa','id_kirim','gambar','status'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    public function getDataSubmit($id_task){
        $this->where(['id_dataroom'=>$id_task])->find();
    }
    public function getDataSubmitByIdtaskIdroomSiswa($id_task,$id_siswa){
        return $this->where(['id_dataroom'=>$id_task,'id_siswa'=>$id_siswa])->find();
    }
    public function getDataSubmitByIdtaskIdroomSiswaAll($id_task){
        return $this->where(['id_dataroom'=>$id_task,'status'=>'terkirim'])->find();
    }
    public function getDetailById($id){
        return $this->where(['id'=>$id])->first();

    }
    public function getResultSubmit($id_task,$id_siswa){
        return $this->where(['id_dataroom'=>$id_task,'id_siswa'=>$id_siswa])->find();
    }
    public function totalSubmitFilter($id_task,$id_siswa){
        $query=$this->getWhere(['id_dataroom'=>$id_task,'id_siswa'=>$id_siswa]);
        return $query->getNumRows();
    }
    public function getDataRoomByid($id){
        return $this->where(['id_kirim'=>$id])->find();
    }
    public function getResultSubmitKirim($id_task,$id_kirim){
        return $this->where(['id_dataroom'=>$id_task,'id_kirim'=>$id_kirim])->find();
    }
    public function totalSubmitFilterKirim($id_task,$id_kirim){
        $query=$this->getWhere(['id_dataroom'=>$id_task,'id_kirim'=>$id_kirim]);
        return $query->getNumRows();
    }
    public function deleteTask($id){
        $sql="DELETE FROM tb_dataroomsiswa WHERE id='$id'";
        return $this->query($sql);
    }
    
}