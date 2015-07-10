<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display();
    }
    private function choose($type){
        //根据参数，实例化不同的表
        switch($type){
            case "0":$table="UserManage";break;
            case "1":$table="TeacherManage";break;
            case "2":$table="AdminManage";break;
        }
        return $table;        
    }
	public function login(){
	    if(IS_AJAX){
            $type=$_POST["type"];
            $username=$_POST["username"];
            $password=$_POST["password"];
            //echo json_encode($_POST);
            
            $table=$this->choose($type);
            $model=D($table);
            $tag=$model->check($username,$password);
            if($tag["status"]){
                session("username",$username);
                session("id",$tag["id"]);
                session("role",$tag["role"]);
                echo json_encode(array(
                    'status'=>1,
                    'url'=>U(substr($table,0,-6)."/index"),
                ));
            }else{
                echo json_encode(array(
                    'status'=>0,
                    'error'=>"用户名或密码错误"
                ));         
            }	        
	    }else{
	        $this->error("非法操作",U("index/index"));
	    }
	}
	public function forget(){
        //忘记密码
		$this->display();
	}
    public function send(){
        //发送邮件
        if(IS_AJAX){
            $username=$_POST["username"];
            $email=$_POST["email"];
            $type=$_POST["type"];
            $table=$this->choose($type);
            $model=D($table);
            $result=$model->checkEmail($username,$email);
            if($result==1){
                $rand=$this->sendMail($type,$username,$email);//发送邮件
                $time=time();
                $model->sendEmail($username,$rand,$time);//将数据记录到数据库中
                echo 1;
            }else{
                echo $result;
            }
        }else{
            $this->error("非法操作",U("index/index"));
        }
    }
    /*
     * type     0学生，1老师，2管理员
     * username 用户名
     * email    邮箱
     */
    private function sendMail($type,$username,$email){
        vendor("Smtp.smtp");
        //邮箱服务器
        $smtpserver = "smtp.qq.com";
        //端口
        $smtpserverport = 25;
        //邮箱账号
        $smtpusermail = "1107745359@qq.com";
        //收件人邮箱
        $smtpemailto = $email;
        //你的邮箱账号
        $smtpuser = $smtpusermail;
        //你的邮箱密码
        $smtppass = "";
        //SMTP服务器的用户密码 
        //邮件主题 
        $mailsubject = "找回密码";
        //邮件内容 
        $rand=md5(rand(1000,9999));
        $mailbody = "请点击以下链接修改密码，".U("index/reset",array("username"=>$username,"rand"=>$rand,"type"=>$type),".html",true)."，有效期三十分钟";
        //邮件格式（HTML/TXT）,TXT为文本邮件 
        $mailtype = "TXT";
        //这里面的一个true是表示使用身份验证,否则不使用身份验证. 
        $smtp = new \smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass,$smtpusermail);
        //是否显示发送的调试信息 
        $smtp->debug = FALSE;
        $smtp->sendmail($smtpemailto, $smtpusermail,"water", $mailsubject, $mailbody, $mailtype);
        return $rand;         
    }
    public function reset(){
        $username=$_GET["username"];
        $rand=$_GET["rand"];
        $type=$_GET["type"];
        
        $table=$this->choose($type);
        $model=D($table);
        $result=$model->validateEmail($username,$rand);
        if($result){
            $this->assign("username",$username);
            $this->assign("rand",$rand);
            $this->assign("type",$type);                
            $this->display();            
        }else{
            $this->error("非法操作或邮件已失效，请重新找回",U("index/forget"));
        }
    }
    public function doReset(){
        //print_r($_POST);
        if($_POST["password"]==$_POST["password2"]){
            $table=$this->choose($_POST["type"]);
            $model=D($table);
            if($result=$model->doReset($_POST)){
                echo 1;                
            }else{
                echo "邮件已失效，请重新找回";
            }
        }else{
            echo "密码不合法，只能由数字和字母组成";
        }
        //$this->display();
    }
}