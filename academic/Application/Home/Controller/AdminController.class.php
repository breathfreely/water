<?php
    namespace Home\Controller;
    use Think\Controller;
    class AdminController extends Controller{
        private $id;
        public function __construct(){
            parent::__construct();
            $role=session("role");
            $id=session("id");
            $this->id=$id;
            if(isset($role)&&$role===2){
                
            }else{
                $this->error("请以学生身份登录",U("index/index"));
            }
        } 
        
        //form表单提交操作成功之后的跳转
        private function success_jump($msg,$url){
            echo "<script>alert('$msg');window.location.href='".$url."'</script>" ;  
        }
        public function index(){
            //print_r(session());
            $this->display();
        }
        public function logout(){
            session(null);
            $this->redirect("index/index");
        }
        public function modify_pass(){
            //修改密码
            $this->display();
        }
        public function do_modify_pass(){
            if(IS_POST){
                $model=D("AdminManage");
                $password=$_POST["password"];
                $model->doModify($this->id,$password);
                echo "<script>alert('修改成功，请重新登录');window.top.location.href='".U("admin/logout","","",true)."'</script>" ;                              
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        public function class_list(){
            vendor("Page.page");
            $model=D("Course");
            $count=$model->getCountCourse();
            
            $Page       = new \Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            
            $result=$model->getCourse($Page->firstRow,$Page->listRows);
            $this->assign("result",$result);
            $this->display(); // 输出模板                              
        }
        public function class_add(){
            $this->display();
        }
        public function do_class_add(){
            if(IS_POST){
                $name=$_POST["name"];
                $model=D("Course");
                $model->addCourse($name);
                echo "<script>alert('添加成功');window.location.href='".U("admin/class_add","","",true)."'</script>" ;                              
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        public function delete_course(){
            //print_r($_GET);
            $id=$_GET["id"];
            if(isset($id)){
                $model=D("Course");
                $model->deleteCourse($id);
                //echo "<script>alert('删除成功');window.location.href='".U("admin/class_list","","",true)."'<script>";
                echo "<script>alert('删除成功');window.location.href='".U("admin/class_list","","",true)."'</script>" ;                                 
            }else{
                $this->error("非法操作",U("admin/index"));
            }
       }
        public function modify_course(){
            $id=$_GET["id"];
            if(isset($_GET["id"])){
                $model=D("Course");
                $result=$model->getConcreteCourse($id);
                $this->assign("result",$result);
                //print_r($result);
                $this->display();
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        } 
        public function do_modify_course(){
            $array=array();
            $array["name"]=$_POST["name"];
            $array["id"]=$_POST["id"];
            if(IS_POST){
                $model=D("Course");
                $model->modifyCourse($array);
                echo "<script>alert('修改成功');window.location.href='".U("admin/class_list","","",true)."'</script>" ;  
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        public function depart_list(){
            //查看所有学院
            $model=D("Depart");
            vendor("Page.page");
            $count=$model->getCountDepart();
            
            $Page       = new \Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            
            $result=$model->getDepart($Page->firstRow,$Page->listRows);
            $this->assign("result",$result);
            $this->display();
        } 
        public function depart_add(){
            //学院添加页面                
            $this->display();
        } 
        //学院添加操作
        public function do_depart_add(){
            $array=$_POST;
            if(IS_POST){
                $model=D("Depart");
                if($model->addDepart($array)){
                    $this->success_jump("添加成功", U("admin/depart_add"));                    
                }
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        //学院修改页面
        public function modify_depart(){
            $id=$_GET["id"];
            $model=D("Depart");
            $result=$model->getConcreteDepart($id);
            $this->assign("result",$result);
            $this->display();
        }
        //学院修改
        public function do_modify_depart(){
            $array=$_POST;
            if(IS_POST){
                $model=D("Depart");
                if($model->modify_depart($array)){
                    $this->success_jump("修改成功", U("admin/depart_list"));                    
                }
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        //删除学院
        public function delete_depart(){
            $id=$_GET["id"];
            if(isset($id)){
                $model=D("Depart");
                if($model->deleteDepart($id)){
                    $this->success_jump("删除成功", U("admin/depart_list"));                                        
                }
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        //查看学院的班级
        public function d_class_list(){
            $id=$_GET["id"];
            if(isset($id)){
                    //学院信息
                $model=D("Depart");
                $data=$model->getConcreteDepart($id);
                $this->assign("data",$data);
                
                //班级信息
                $model=D("Class");
                vendor("Page.page");
                $count=$model->getCountClass($id);
                
                $Page       = new \Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
                $show       = $Page->show();// 分页显示输出
                $this->assign('page',$show);// 赋值分页输出
                
                $result=$model->getAllClass($id,$Page->firstRow,$Page->listRows);
                $this->assign("result",$result);
                $this->display();             
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }
        //添加班级页面
        public function d_class_add(){
            $id=$_GET["id"];
            if(isset($id)){
                //学院信息
                $model=D("Depart");
                $data=$model->getConcreteDepart($id);
                $this->assign("data",$data);
                $this->display();
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        } 
        //添加班级操作
        public function do_d_class_add(){
            if(IS_POST){
                $array=$_POST;
                //学院信息
                $model=D("Class");
                if($model->addClass($array)){
                    $this->success_jump("添加成功",U("admin/d_class_add?id=$array[depart_id]"));
                }
            }else{
                $this->error("非法操作",U("admin/index"));
            }
        }        
    }
