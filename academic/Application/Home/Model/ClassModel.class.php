<?php
    namespace Home\Model;
    use Think\Model;
    class ClassModel extends Model{
        //班级
        protected $trueTableName="class";
        public function getCountClass($id){
            $count=$this->where("depart_id=$id")->count();
            return $count;
        }
        public function getAllClass($id,$begin,$end){
            $data=$this->where("depart_id=$id")->limit($begin.",".$end)->select();
            return $data;
        }
        public function addClass($array){
            $this->add($array);
            return true;
        }
    }
