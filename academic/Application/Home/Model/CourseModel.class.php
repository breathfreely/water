<?php
    namespace Home\Model;
    use Think\Model;
    class CourseModel extends Model{
        protected $trueTableName="course";
        public function getCountCourse(){
            $sum=$this->field("count(id) as sum_id")->find();
            return $sum["sum_id"]; 
        }
        public function getCourse($begin,$end){
            $data=$this->limit($begin.",".$end)->select();
            return $data;     
        }
        public function addCourse($name){
            $data["name"]=$name;
            $this->add($data);
        }
        public function deleteCourse($id){
            $this->where("id=$id")->delete();
        }
        public function  getConcreteCourse($id){
            //根据id查找具体课程
            $data=$this->where("id=$id")->find();
            return $data;
        }
        public function modifyCourse($array){
            //修改课程
            $id=$array["id"];
            $data["name"]=$array["name"];
            $this->where("id=$id")->save($data);
        }
    }
