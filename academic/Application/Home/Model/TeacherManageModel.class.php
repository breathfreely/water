<?php
	namespace Home\Model;
	use Think\Model;
	class TeacherManageModel extends Model{
		protected $truetablename="teacher_manage";
		public function check($username,$password){
			$result=$this->where("username='$username' and password='$password'")->find();
			if($result){
				return array("status"=>1,"id"=>$result["id"],"role"=>1);
			}else{
				return array("status"=>0);
			}
		}
        public function checkEmail($username,$email){
            if($this->where("username='$username'")->find()){
                if($this->where("username='$username' and email='$email'")->find()){
                    return 1;
                }else{
                    return "邮箱错误或还未绑定邮箱，请联系管理员";
                }
            }else{
                return "用户名不存在";
            }
        }
        public  function sendEmail($username,$rand,$time){
            //将发送的随机数和当前时间保存到数据库中
            $data["rand"]=$rand;
            $data["time"]=$time;
            $this->where("username='$username'")->save($data);
        }
        public function validateEmail($username,$rand){
            //修改密码之前的验证,返回时间
            if($result=$this->where("username='$username' and rand='$rand' and NOW()-30*60>time")->find()){
                return true;
            }else{
                return false;
            }
        }
        public function doReset($array){
            $username=$array["username"];
            $rand=$array["rand"];
            $data["password"]=$array["password"];
            if($result=$this->where("username='$username' and rand='$rand' and NOW()-30*60>time")->save($data)){
                return true;
            }else{
                return false;
            }
        }        		
	}
