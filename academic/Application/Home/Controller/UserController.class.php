<?php
	namespace Home\Controller;
	use Think\Controller;
	class UserController extends Controller{
        private $id;
	    public function __construct(){
	        parent::__construct();
	        $role=session("role");
            $id=session("id");
            $this->id=$id;
            if(isset($role)&&$role===0){
                
            }else{
                $this->error("请以学生身份登录",U("index/index"));
            }
	    } 
		public function index(){
		    //print_r(session());
			$this->display();
		}
        public function logout(){
            session(null);
            $this->redirect("index/index");
        }
        public function detail(){
            //基本信息
            $model=D("UserManage");
            $info=$model->getInfo($this->id);
            $this->assign("info",$info);                          
            $this->display();            
        }
        public function info(){
            //个人信息，提供修改个人信息
            $model=D("UserManage");
            $info=$model->getInfo($this->id);
            $this->assign("info",$info);              
            $this->display();
        }
        public function modify_pass(){
            //修改密码
            $this->display();
        }
        public function do_modify_pass(){
            if(IS_POST){
                $model=D("UserManage");
                $password=$_POST["password"];
                $model->doModify($this->id,$password);
                echo "<script>alert('修改成功，请重新登录');window.top.location.href='".U("user/logout","","",true)."'</script>" ;                              
            }else{
                $this->error("非法操作",U("user/index"));
            }
        }
	}
