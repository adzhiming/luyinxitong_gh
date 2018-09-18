<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
use Think\Upload;
use Home\Controller\AppResult;
class AccountController extends AuthController {
    public function _initialize() {
        $this->assign("AccountSub",1);
    }
    public function index(){
        $this->getParam();
        
        $this->display();
    }
    
    public function userManage(){
        
        $sEcho = $_REQUEST['sEcho']; // DataTables 用来生成的信息
        $output['sEcho'] = $sEcho;
        $start = isset($_REQUEST['start'])?$_REQUEST['start']:0;
        $length = isset($_REQUEST['length'])?$_REQUEST['length']:10;
        if(IS_AJAX){ 
            $field="v_accountid,v_accountname,v_password,n_afairtype,n_privilege,n_status,n_monitor,v_remark,v_ext,v_sid";
            $where="  n_status != 0 and V_AccountName <> 'op' and  V_AccountName <> 'neuron' ";
            $M = M('sys_accountinfo');
            $cnt = $M->field($field)->where($where)->select();
            //echo M()->getLastSql();
            $total = count($cnt);
            $rs = $M->field($field)->where($where)->limit($start,$length)->select();
            if($rs){
                foreach ($rs as $k=>$v){
                    $Managestr = "";
                    $accountstr = "";
                    $accountidstr = "";
                    $u=$v["v_accountname"];
                    $uid=$v["v_accountid"];
                    $rs[$k]['outcando'] = "<font color='red'>".OutCanDo($v['n_afairtype'])."</font>";
                    $rs[$k]['out_ext'] = Out_ext($v["v_ext"]);
                    $rs[$k]['out_site'] =  station($v["v_sid"]);;
                    $canMng  = substr($_SESSION['uRights'],4,1);//管理权
                    if($canMng==1){
                        $accountidstr = "<a href='userEdit?ACID=$uid'>$uid</a>";
                        $accountstr ="<a href='userEdit?ACID=$uid'>$u</a>";
                        $Managestr .= " <a href='userEdit?ACID=$uid'>编辑</a>　|　";
                        if($u !="admin"){
                            $Managestr .= "<a href=\"javascript:del($uid,'{$u}')\">删除</a>";
                        }else{
                            $Managestr .= "<span style=\"text-decoration:line-through;\">删除</span>";
                        }
                    }else{
                        $accountidstr = $uid;
                        $accountstr = $u;
                        $Managestr .= " <span style=\"text-decoration:line-through;\">编辑</span>　|　";
                        $Managestr .= "<span style=\"text-decoration:line-through;\">删除</span>";
                    }
                    $rs[$k]['out_accountid'] = $accountidstr;
                    $rs[$k]['out_accountname'] = $accountstr;
                    $rs[$k]['out_manage'] = $Managestr;
                    
                }
            }
           
            $output['aaData'] = $rs;
            $output['iTotalDisplayRecords'] = $total;    //如果有全局搜索，搜索出来的个数
            $output['iTotalRecords'] = $total; //总共有几条数据
            echo json_encode($output); //最后把数据以json格式返回
            die;
        }
        
        $this->assign("CurrentPage",'userManage');
        $this->display();
    }
    
    public function phoneBook(){
        header("Content-Type: text/html;charset=utf-8");

        if(IS_AJAX){
            $start = isset($_REQUEST['start'])?$_REQUEST['start']:0;
            $length = isset($_REQUEST['length'])?$_REQUEST['length']:10;
            $sName = $this->getParam("sName"); 
            $sNum = $this->getParam("sNum");
            $keyword = $this->getParam("keyword");
            $sName = MySQLFixup($sName);
            $sNum = MySQLFixup($sNum); 
            $where="1=1 ";
            if($sName !=""){
                //$where.=" and from_base64(a.contactname) like '%".$sName."%' ";
            }
            if($keyword !=""){
                 // M('dept')->where("from_base64(a.category) like '%".$keyword."%'")->select();
                 // $where.=" and (from_base64(a.district) like '%".$keyword."%' or from_base64(a.category) like '%".$keyword."%') ";
            }
            if($sNum !=""){
                $where.=" and (a.Mobile like '%".$sNum."%' or a.OfficeNum like '%".$sNum."%'
                 or a.phone1 like '%".$sNum."%' or a.phone2 like '%".$sNum."%' or a.phone3 like '%".$sNum."%' or a.phone4 like '%".$sNum."%'
                 or a.phone5 like '%".$sNum."%' or a.phone6 like '%".$sNum."%' or a.phone7 like '%".$sNum."%' or a.phone8 like '%".$sNum."%'
                 or a.phone9 like '%".$sNum."%' or a.phone10 like '%".$sNum."%'
                )";
            }
            
            $field="a.*,concat(a.phone1,',',a.phone2,',',a.phone3,',',a.phone4,',',a.phone5,',',a.phone6,',',a.phone7,',',a.phone8,',',a.phone9,',',a.phone10) as  phones ,b.deptName";
            $cnt = M('phonebook a')->field("count(*) cnt ")->where($where)->find();
            $total = $cnt['cnt'];
            $rs = M('phonebook a')->join("tab_dept b on a.deptid=b.deptid","left")->field($field)->where($where)->limit($start,$length)->select();
            //echo M()->getLastSql();
            if($rs){ 
                foreach ($rs as $k=>$v){
                    if(!empty($v['contactname'])){ 
                         $contactname = iconv("gb2312//IGNORE","utf-8",base64_decode($v['contactname'],'gb2312'));
                         $rs[$k]['contactname'] = empty($contactname)?$v['contactname']:$contactname;
                    }
                    if(!empty($v['district'])){ 
                         $rs[$k]['district'] = iconv("gb2312//IGNORE","utf-8",base64_decode($v['district'],'gb2312'));
                    }
                    if(!empty($v['deptname'])){ 
                          $rs[$k]['deptname'] = iconv("gb2312//IGNORE","utf-8",base64_decode($v['deptname'],'gb2312'));
                    }
                    if($v['sex'] == 1){
                        $rs[$k]['xingbie'] = '男';
                    }
                    elseif($v['sex'] == 2){
                        $rs[$k]['xingbie'] = '女';
                    }
                    else{
                        $rs[$k]['xingbie'] = '未知';
                    }
                }
            }
            //var_dump($rs);
            $output['aaData'] = $rs;
            $output['iTotalDisplayRecords'] = $total;    //如果有全局搜索，搜索出来的个数
            $output['iTotalRecords'] = $total; //总共有几条数据
            echo json_encode($output); //最后把数据以json格式返回
            die;
        }
        
        $this->assign("CurrentPage",'phoneBook');
        $this->display();
    }
    public function valuedesc64($val,$type='utf-8'){ 
        header("Content-Type: text/html;charset={$type}");
        return base64_decode($val,$type);
    } 
    //同步号簿
    public function synPhoneBook(){ 
        if(IS_POST){
             
            $AppResult = new AppResult();
            $rs = M("new_phonebook")->where('is_update = 0')->order('name')->select();
            if($rs){
                foreach ($rs as $k => $v) { 

                    $upd = array();
                    $arr = explode(",",$v['number']);
                    $arr = array_unique($arr);
                    foreach ($arr as $key => $val) {
                        $i = $key+1;
                        $index = "phone".$i;
                        $upd[$index] = $val;

                    }
                    $upd['contactName'] = $v['name'];
                    $upd['district'] = $v['district'];
                    $upd['category'] = $v['category'];
                     //先判断部门
                    $dep = $v['unit'];
                    if($dep){
                        $find = M("dept")->where("DeptName = '{$dep}'")->find();
                        if($find)
                        {
                            $fp = M('phonebook')->where("deptid ='{$find['deptid']}' and contactName ='{$v['name']}'")->find();
                            if($fp)
                            {
                                $rs = M('phonebook')->where("deptid ='{$find['deptid']}' and contactName ='{$v['name']}'")->save($upd);
                            }
                            else
                            {
                               $upd['sex'] = 1; 
                               $upd['deptid'] = $find['deptid'];
                               $upd['contactName'] = $v['name'];
                               $rs = M('phonebook')->add($upd); 
                            }    
                        }
                        else
                        {
                           $add = M("dept")->add(array('DeptName'=>$dep));
                           if($add){
                              $upd['sex'] = 1;
                              $upd['deptid'] = $add;
                              $upd['contactName'] = $v['name'];
                              $rs = M('phonebook')->add($upd);
                           }
                        }
                    }
                    else
                    { 
                        $upd['sex'] = 1; 
                        $upd['deptid'] = 0;
                        $upd['contactName'] = $v['name'];
                        $rs = M('phonebook')->add($upd);
                    }

                }
            }
            
            $AppResult->code = 1;
            $AppResult->message = "号簿同步成功";
            $AppResult->data = "";
            $AppResult->returnJSON();
        }
        die;
    }
    
    public function userAdd(){
        if(IS_POST){
            $AppResult = new AppResult();
            $username = $this->getParam("username");
            $password = $this->getParam("password");
            $canItems = $this->getParam("canItems");
            $privilege = $this->getParam("privilege");
            $stationid = $this->getParam("stationid");
            $remark = $this->getParam("remark");
            $has = M('sys_accountinfo')->where("n_status != 0 and V_AccountName = '".MySQLFixup($username)."'")->find();
            
            if($has){
                $AppResult->code = 0;
                $AppResult->message = "新增用户失败,系统已存在用户".$username."！";
                $AppResult->data = "";
                
            }else{
                $data = array();
                $data['V_AccountName'] = $username;
                $data['V_Password'] = $password;
                $data['N_AfairType'] = str_replace(",", "", $canItems);
                $data['N_Privilege'] = 9;
                $data['N_Status'] = 1;
                $data['V_Remark'] = $remark;
                $data['V_Ext'] = formatSTR($privilege);
                $data['V_SID'] = $stationid;
                
                $rs = M('sys_accountinfo')->add($data);
                if($rs){
                    addSysLog("通过浏览器新增用户:".MySQLFixup($username));
                    $AppResult->code = 1;
                    $AppResult->message = "成功添加新用户:".$username;
                    $AppResult->data = "";
                }
                else{
                    $AppResult->code = 0;
                    $AppResult->message = "新增用户失败,数据库操作失败";
                    $AppResult->data = "";
                }
            }
            $AppResult->returnJSON();
        }
        $rs = M('station')->field("N_SID,V_SNAME,V_RNUM,V_MEMO")->order('V_SNAME')->select();
         
        $this->assign("station",$rs);
        $this->assign("CurrentPage",'userManage');
        $this->display();
    }
    public function userEdit(){
        if(IS_POST){
            $AppResult = new AppResult();
            $accountid = $this->getParam("accountid");
            $username = $this->getParam("username");
            $password = $this->getParam("password");
            $canItems = $this->getParam("canItems");
            $privilege = $this->getParam("privilege");
            $stationid = $this->getParam("stationid");
            $remark = $this->getParam("remark");
            
            $data = array();
            $data['V_AccountName'] = $username;
            $data['V_Password'] = $password;
            $data['N_AfairType'] = str_replace(",","",str_replace("，",",", $canItems));;
            $data['N_Privilege'] = 9;
            $data['N_Status'] = 1;
            $data['V_Remark'] = $remark;
            $data['V_Ext'] = formatSTR($privilege);
            $data['V_SID'] = $stationid;
            if(empty($accountid)){
                $AppResult->code = 0;
                $AppResult->message = "请选择用户更新";
                $AppResult->data = "";
                $AppResult->returnJSON();
            }
           
            $rs = M('sys_accountinfo')->where("v_accountid = '{$accountid}'")->save($data);
            if(false !== $rs){
                addSysLog("通过浏览器修改用户:".MySQLFixup($username));
                $AppResult->code = 1;
                $AppResult->message = "成功修改用户:".$username;
                $AppResult->data = "";
            }
            else{
                $AppResult->code = 0;
                $AppResult->message = "修改用户失败,数据库操作失败";
                $AppResult->data = "";
            }
            $AppResult->returnJSON();
        }
        $accountid = $this->getParam('ACID');
        $rs = M('sys_accountinfo')->where(" v_accountid = '".$accountid."'")->find();
        if(!$rs){
            JS_alert("非法操作");
        }
        $stationArr = explode(',', $rs['v_sid']);
        $rs['chaxun'] = substr($rs['n_afairtype'],0,1);
        $rs['shanchu'] = substr($rs['n_afairtype'],1,1);
        $rs['guanli'] = substr($rs['n_afairtype'],2,1);
        $rs['suoding'] = substr($rs['n_afairtype'],3,1);
       
        $rs_station = M('station')->field("N_SID,V_SNAME,V_RNUM,V_MEMO")->order('V_SNAME')->select();
        foreach ($rs_station as $k=>$v){
            $rs_station[$k]['selected'] = 0;
            if(in_array($v['n_sid'], $stationArr)){
                $rs_station[$k]['selected'] = 1;
            }
            
        }
        $this->assign("station",$rs_station);
        $this->assign("accountInfo",$rs);
        $this->assign("CurrentPage",'userManage');
        $this->display();
    }
    
    public function userDel(){
        if(IS_POST){
            $AppResult = new AppResult();
            $userID = $this->getParam("uid");
            $username = $this->getParam("username");
            
            if(empty($userID)){
                $AppResult->code = 0;
                $AppResult->message = "请选中要删除的用户";
                $AppResult->data = "";
            }
            $data = array();
            $data['N_Status'] = 0;
            $rs = M('sys_accountinfo')->where("V_AccountId= '{$userID}'")->save($data);
            if(false !== $rs){
                $msg="成功删除用户:".$username;
                addSysLog($msg);
                $AppResult->code = 1;
                $AppResult->message = "删除成功";
                $AppResult->data = "";
            }
            $AppResult->returnJSON();
        }
    }
    
    public function phoneBookAdd(){
        if(IS_POST)
        {
            $AppResult = new AppResult();
            $name = $this->getParam("name");
           // $sex = $this->getParam("sex");
            $departMent = $this->getParam("departMent");
            $phone = $this->getParam("phone");
            $officePhone = $this->getParam("officePhone");
            $otherPhone = $this->getParam("otherPhone");
            $homenum = $this->getParam("homenum");
            $remark = $this->getParam("remark");
            $data = array();
            $data['contactName'] = $name;
            //$data['sex'] = $sex;
            $data['deptid'] = $departMent;
            $data['Mobile'] = $phone;
            $data['OfficeNum'] = $officePhone;
            $data['HomeNum'] = $homenum;
            $data['OtherNum'] = $otherPhone;
            $data['remark'] = $remark;
            
            $rs = M("phonebook")->add($data);
            if($rs){
                $AppResult->code = 1;
                $AppResult->message = "添加成功";
                $AppResult->data = "";
            }
            else{
                $AppResult->code = 0;
                $AppResult->message = "添加失败";
                $AppResult->data = "";
            }
            $AppResult->returnJSON();
        }
        $rs = M('dept')->order("DeptID")->select();
        $this->assign("rs",$rs);
        $this->assign("CurrentPage",'phoneBook');
        $this->display();
    }
    
    public function phoneBookEdit(){
        $phoneBookID = $this->getParam("id");
        if(empty($phoneBookID)){
           $this->error("请选中要编辑的号簿");exit;
        }
        $rs = M('phonebook')->field("*,concat(phone1,',',phone2,',',phone3,',',phone4,',',phone5,',',phone6,',',phone7,',',phone8,',',phone9,',',phone10) as  phones")
            ->where("pid = '{$phoneBookID}' ")->find();
        if(empty($rs)){
           $this->error("非法操作");exit;
        }
       $rs['contactname'] = iconv("gb2312//IGNORE","utf-8",base64_decode($rs['contactname'],'gb2312'));
        if(IS_POST || IS_AJAX){ 
           $contactname = $this->getParam("contactname");
           $pid = $this->getParam("pid");
           $deptid = $this->getParam("deptid");
           $mobile = $this->getParam("mobile");
           $officenum = $this->getParam("officenum");
           $homenum = $this->getParam("homenum"); 
           $othernum = $this->getParam("othernum");
           $remark = $this->getParam("remark");
           $upd['contactName'] = trim($contactname);
           $upd['deptid'] = trim($deptid);
           $upd['Mobile'] = trim($mobile);
           $upd['OfficeNum'] = trim($officenum);
           $upd['HomeNum'] = trim($homenum);
           $upd['OtherNum'] = trim($othernum);
           $upd['remark'] = trim($remark);
           $rs = M("phonebook")->where("pid = '{$pid}'")->save($upd);
           if(false !== $rs){
               $this->success("更新成功",'/home/Account/phoneBook');
           }
           else
           {
               $this->success("更新失败");
           }
           exit;
        }
        $dept = M("dept")->order('DeptID')->select();
        foreach ($dept as $key => $value) {
            $dept[$key]['deptname'] = iconv("gb2312//IGNORE","utf-8",base64_decode($value['deptname'],'gb2312'));
        }
        $this->assign("dept",$dept);
        $this->assign("rs",$rs);
        $this->assign("CurrentPage",'phoneBook');
        $this->display();
    }
    
    public function phoneBookDel(){
        $phoneBookID = $this->getParam("phoneBookID");
        $AppResult = new AppResult();
        if(empty($phoneBookID)){
            $AppResult->code = 0;
            $AppResult->data ="";
            $AppResult->message = "请选中要删除的记录";
            $AppResult->returnJSON();
        }
        if(IS_POST){
            $rs = M('phonebook')->where("pid in ({$phoneBookID})")->select();
            if($rs)
            {
                $delName = '';
                foreach ($rs as $v){
                    if($delName == ""){
                        $delName = $v['contactname'];
                    }
                    else{
                        $delName = $delName .",".$v['contactname'];
                    }
                }
                $delrs = M('phonebook')->where("pid in({$phoneBookID})")->delete();
                if($delrs){
                    $msg="成功删除号簿记录:".$delName;
                    addSysLog($msg);
                    $AppResult->code = 1;
                    $AppResult->data ="";
                    $AppResult->message = $msg;
                }
                else{
                    $AppResult->code = 0;
                    $AppResult->data ="";
                    $AppResult->message = "删除失败";
                }
            }
            $AppResult->returnJSON();
        }
    }
    
    public function departMent(){
        if(IS_AJAX){
            $start = isset($_REQUEST['start'])?$_REQUEST['start']:0;
            $length = isset($_REQUEST['length'])?$_REQUEST['length']:10;
            $sName = $this->getParam("sName");
            $sName = MySQLFixup($sName);
            $where=" 1=1 ";
            if($sName!=""){
                $where .=" and DeptName like '%".MySQLFixup($sName)."%' ";
            }
            
            $field="DeptID,DeptName";  
            $cnt = M('dept')->where($where)->select();
            $total = count($cnt);
            
            $rs = M('dept')->field($field)->where($where)->limit($start,$length)->select();
            if($rs){
                foreach ($rs as $k=>$v){
                    $rs[$k]['deptname'] = iconv("gb2312//IGNORE","utf-8",base64_decode($v['deptname'],'gb2312'));
                    $Managestr = "";
                    $Managestr .= " <a href='departMentEdit?depID={$v['deptid']}'>编辑</a>　|　";
                    $Managestr .=  "<a href=\"javascript:del('{$v['deptid']}','{$v['deptname']}')\">删除</a>";
                    $rs[$k]['outManage'] = $Managestr;
                }
            }    
            $output['aaData'] = $rs;
            $output['iTotalDisplayRecords'] = $total;    //如果有全局搜索，搜索出来的个数
            $output['iTotalRecords'] = $total; //总共有几条数据
            echo json_encode($output); //最后把数据以json格式返回
            die;
        }
        $this->assign("CurrentPage",'departMent');
        $this->display();
    }
    
    public function departMentAdd(){
        if(IS_POST){
            $AppResult = new AppResult();
            $departName = $this->getParam("departName");
            $departName = iconv("utf-8//IGNORE","gb2312",$departName); 
            $departName =  base64_encode($departName);
            $rs = M('dept')->where("DeptName='".MySQLFixup($departName)."'")->find();
            if(!$rs){
                $data = array();
                $data['DeptName'] = $departName;
                $rs = M('dept')->add($data);
                if($rs){
                    $AppResult->code = 1;
                    $AppResult->data ="";
                    $AppResult->message = "分组添加成功";
                }
                else
                {
                    $AppResult->code = 0;
                    $AppResult->data ="";
                    $AppResult->message = "分组添加失败";
                }
            }
            else
            {
                $AppResult->code = 0;
                $AppResult->data ="";
                $AppResult->message = "已存在同名分组:$departName";
            }
            $AppResult->returnJSON();
        } 
        $this->assign("CurrentPage",'departMent');
        $this->display();
    }
    
    public function departMentEdit(){
        $depID = $this->getParam("depID");
        if(empty($depID)){
            JS_alert("请选中要编辑的部门");
        }
        if(IS_POST){
            $depName = $this->getParam("depName");
            $depName = trim($depName);
            if(empty($depName)){
                JS_alert("请部门名称");
            }
            $data = array();
            $depName = iconv("utf-8//IGNORE","gb2312",$depName); 
            $data['DeptName'] = base64_encode($depName);
            $rs = M('dept')->where("DeptID = '{$depID}'")->save($data);
            if(false !== $rs){
                $this->success("更新成功");
                die;
            }
        }
        $rs = M('dept')->where("DeptID = '{$depID}'")->find();
        $rs['deptname'] = iconv("gb2312//IGNORE","utf-8",base64_decode($rs['deptname'],'gb2312'));
        $this->assign("rs",$rs);
        $this->assign("CurrentPage",'departMent');
        $this->display();
    }
    
    public function departMentDel(){
        $depID = $this->getParam("depID");
        $AppResult = new AppResult();
        if(empty($depID)){
            $AppResult->code = 0;
            $AppResult->data ="";
            $AppResult->message = "请选中要编辑的部门";
            $AppResult->returnJSON();
        }
        if(IS_POST){
            $depName = $this->getParam("depName");
            $rs = M('phonebook')->where("deptid = '{$depID}'")->find();
            if(!$rs)
            {
                $delrs = M('dept')->where("deptid = '{$depID}'")->delete();
                if($delrs){
                    $msg="成功删除分组记录".$depName;
                    addSysLog($msg);
                    $AppResult->code = 1;
                    $AppResult->data ="";
                    $AppResult->message = $msg;
                }
                else{
                    $AppResult->code = 0;
                    $AppResult->data ="";
                    $AppResult->message = "删除失败";
                }
            }else{
                $AppResult->code = 0;
                $AppResult->data ="";
                $AppResult->message = "删除失败：分组数据非空";
            }
            $AppResult->returnJSON();
        }
    }
    
    //导出excel
    public function downloadPhoneExcel(){
        header("Content-type: text/html; charset=utf-8");
        Vendor("PHPExcel.PHPExcel");
        Vendor("PHPExcel.PHPExcel.Reader.Excel2007.php");
        Vendor("PHPExcel.PHPExcel.Reader.Excel5");
        Vendor("PHPExcel.PHPExcel.IOFactory");
         
        $excel = new \PHPExcel();
        
        //指定工作簿
        $excel->setActiveSheetIndex(0); 
        //设置列宽
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth('15');
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth('15');
        
        
        $excel->getActiveSheet()->setTitle('电话号簿'); //excel标题
        //设置行标题
        $excel->getActiveSheet()->setCellValue("A1", "名称");         
        $excel->getActiveSheet()->setCellValue("B1", "地区");
        $excel->getActiveSheet()->setCellValue("C1", "单位");
        $excel->getActiveSheet()->setCellValue("D1", "本地电话1");
        $excel->getActiveSheet()->setCellValue("E1", "本地电话2");
        $excel->getActiveSheet()->setCellValue("F1", "本地电话3");
        $excel->getActiveSheet()->setCellValue("G1", "本地电话4");
        $excel->getActiveSheet()->setCellValue("H1", "备注");
         
         
        //获取并填充数据
        $rs = M('phonebook p')->join("tab_dept d on p.deptid = d.deptid","left")->field("p.*,d.deptname")->order('p.contactname')->select();
        

        
        if($rs){
            $i=1;
            foreach ($rs as $key => $value) {
                $i++;
                $contactname = iconv("gb2312//IGNORE","utf-8",base64_decode($value['contactname'],'gb2312'));
                $contactname = $contactname==true?$contactname:'';
                $district = iconv("gb2312//IGNORE","utf-8",base64_decode($value['district'],'gb2312'));
                $district = $district==true?$district:'';
                $deptname = iconv("gb2312//IGNORE","utf-8",base64_decode($value['deptname'],'gb2312'));
                $deptname = $deptname==true?$deptname:'';
                $excel->getActiveSheet()->setCellValue("A".$i,$contactname);
                $excel->getActiveSheet()->setCellValue("B".$i,$district);
                $excel->getActiveSheet()->setCellValue("C".$i,$deptname);
                $excel->getActiveSheet()->setCellValue("D".$i,$value["mobile"]);
                $excel->getActiveSheet()->setCellValue("E".$i,$value["officenum"]);
                $excel->getActiveSheet()->setCellValue("F".$i,$value["othernum"]);
                $excel->getActiveSheet()->setCellValue("G".$i,$value["homenum"]);
                $excel->getActiveSheet()->setCellValue("H".$i,$value["remark"]);
            }
        } 
        
      
        $title ='phonebook';
        $date = date('Y-m-d',time());
        
        $data = array(); 

        $dir = iconv("UTF-8", "GBK", "Uploads/phoneBook");
        if (!file_exists($dir)){
            mkdir ($dir,0777,true); 
        }
 
        $fileurl = $dir."/". $title."_".$date.".xls";
       
        $filename = iconv('utf-8', "gb2312", $fileurl);
        
        $objwriter = \PHPExcel_IOFactory::createWriter($excel,'Excel5');
        $objwriter->save($filename);
        $this->returnJSON(1,'导出成功',"/".$fileurl);

     }

 
} 