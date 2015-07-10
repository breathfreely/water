<?php
    namespace Home\Model;
    use Think\Model;
    class DepartModel extends Model{
        protected $trueTableName="department";
        public function getCountDepart(){
            $count=$this->count();
            return $count;
        }
        public function getDepart($begin,$end){
            $result=$this->limit($begin.",".$end)->select();
            return $result;
        }
        public function addDepart($array){
            $this->add($array);
            return true;
        }
        public function modify_depart($array){
            $id=$array["id"];
            $data["name"]=$array["name"];
            $this->where("id=$id")->save($data);
            return true;
        }
        public function getConcreteDepart($id){
            $data=$this->where("id=$id")->find();
            return $data;
        }
        public function deleteDepart($id){
            $this->where("id=$id")->delete();
            return true;
        }
    }
