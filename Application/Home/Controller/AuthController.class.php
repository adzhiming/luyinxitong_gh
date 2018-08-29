<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Home\Controller\AppResult;
class AuthController extends Controller {
    public function __construct(){
        parent::__construct();
        header("Content-type: text/html; charset=utf-8");
        $action = ACTION_NAME; 
        $arr = array('recordPlayer','videoPlayer','recordPlayer');
        if(in_array($action, $arr)){
             return true;
        }
         
        $checkLogin = $this->checkLogin();
        if(!$checkLogin){
            $redirect ="/home/login/index";
            $this->error('未登陆，请登陆！', $redirect);
            die;
        }
        if($this->testIP()==0){ 
            $msg.=$_SERVER['REMOTE_ADDR']."无权访问本系统，请与管理员联系！"; 
            $redirect ="/home/login/index";
            $this->error($msg, $redirect);
            die;
        }
        //系统信息
        $sys_V = M('sys_paramssystem')->where("V_ParamsName = 'Sys_Version'")->find();
        $this->assign("sys_Vinfo",$sys_V);
        $this->assign("admininfo",session("admininfo"));
         
    }
    public function index(){
        
    }
    public function checkLogin()
    {
        $admin = session("admininfo");
        if(empty($admin)){
            return false;
        }
        return true;
    }
    
    public function getParamEmptyDieTip($name, $dieReason = "") {
        $value = $this->trimEmptyStr($this->params[$name]);
        if ($value === null || $value === "") {
            $value = $this->trimEmptyStr($_GET[$name]);
        }
        if ($value === null || $value === "") {
            $value = $this->trimEmptyStr($_POST[$name]);
        }
        if ($value === null || $value === "") {
            $appResult = new AppResult();
            $appResult->code = 1;
            if (empty($dieReason)) {
                $dieReason = '参数' . $name . '不能为空！';
            }
            $appResult->message = $dieReason;
            $appResult->returnJSON();
        }
        
        return $value;
    }
   
    /**
     * 返回json结果
     *
     * @param
     *            $code
     * @param
     *            $message
     * @param string $data
     */
    public function returnJSON($code = 1, $message = '操作出错!', $data = '') {
        $appResult = new AppResult();
        $appResult->code = $code;
        $appResult->message = $message;
        $appResult->data = $data;
        $appResult->returnJSON();
    }
    /*
     * @autohr lzm
     * @intro 获取对应键值参数，若空设为默认值
     */
    public function getParam($name, $value_while_empty = "") {
        $value = $this->trimEmptyStr($this->params[$name]);
        if ('goods' == $name) {
            $value = $_GET[$name];
            if ($value === null || $value === "")
                $value = $_POST[$name];
        }
        if ($value === null || $value === "") {
            $value = $this->trimEmptyStr($_GET[$name]);
            if ($value === null || $value === "") {
                $value = $this->trimEmptyStr($_POST[$name]);
            }
            if ($value === null || $value === "") {
                $value = $value_while_empty;
            }
        }
        return $value;
    }
    /**
     * 过滤参数
     *
     * @param unknown $val
     * @return return_type
     * @author lzm
     * @date 2018年2月22日
     */
    public function trimEmptyStr($val) {
        $cleanVal = '';
        if (is_array($val)) {
            $cleanVal = array_map('trim', $val);
            $cleanVal = array_map('htmlspecialchars', $cleanVal);
        }
        else if (is_string($val)) {
            $cleanVal = trim($val);
            $cleanVal = htmlspecialchars($cleanVal);
        }
        else {
            $cleanVal = $val;
        }
        return $cleanVal;
    }


    //验证来访IP权限
//规则：先判断无权IP，如同时设置某IP为无权IP和有权IP，系统将认为该IP无权访问；
//关于通配符，一级通配符优先。
// 如192.168.*.* 为无效，则192.168.0.* 为有效，则所有匹配192.168.0.*的IP有权访问系统
public function testIP(){
    $ip= get_ip();
    if($ip=="127.0.0.1"){//本机访问，不做判断
        return 1;   
    }else{
        //先判断来访IP是否在限制IP内
        $cnt= M("sys_allowip")->where("ip='$ip' and flag=0")->count(); 
        if($cnt>0){
            //echo $cnt;
            return 0;   //禁止访问(无通配符)
        }else{
            //echo $cnt;
            $cnt= M("sys_allowip")->where("ip='$ip' and flag=1")->count(); 
            if($cnt>0){
                return 1;   //有效IP(无通配符)，允许访问；
            }
            //截取IP最后一段，替换成通配符*;
            $IPary=explode(".",$ip);
            $ip1="";
            $ip2="";
            for($i=0;$i<count($IPary)-1;$i++){
                $ip1.=$IPary[$i].".";
                if($i<count($IPary)-2){
                    $ip2.=$IPary[$i].".";
                }
            }
            $ip1.="*";
            $ip2.="*.*";
            //一级通配符无权IP
            $cnt= M("sys_allowip")->where("ip='$ip1' and flag=0")->count(); 
            if($cnt>0){return 0;}
            //一级通配符有权IP
            $cnt= M("sys_allowip")->where("ip='$ip1' and flag=1")->count(); 
            if($cnt>0){return 1;}
            //二级通配符无权IP
            $cnt= M("sys_allowip")->where("ip='$ip2' and flag=0")->count(); 
            if($cnt>0){return 0;}
            //二级通配符有权IP
            $cnt= M("sys_allowip")->where("ip='$ip2' and flag=1")->count(); 
            if($cnt>0){return 1;}
        }
    }
}
}