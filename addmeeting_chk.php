<?php
session_start();
include_once("conn/conn.php");
function f_postfix($f_type,$f_upfiles){
	$is_pass = false;
	$tmp_upfiles = split("\.",$f_upfiles);
	$tmp_num = count($tmp_upfiles);
	for($num = 0; $num < count($f_type);$num++){
		if(strtolower($tmp_upfiles[$tmp_num - 1]) == $f_type["$num"])
			$is_pass = $f_type["$num"];
	}
	return $is_pass;
}

if($_FILES["meeting_documents"]["size"]<=0){                                                                //判断是否上传了文件
   echo "<script>alert('请上传文件');history.go(-1);</script>";
}else{
   $f_type = array("txt");                                                                                  //定义上传文件的格式
   $record_path="upfile";                                                                                   //定义上传路径
   if(($postf = f_postfix($f_type,$_FILES["meeting_documents"]["name"])) != false){ 
      $new_path = time().".txt";   
	  if($_FILES["meeting_documents"]["size"] > 0 and $_FILES["meeting_documents"]["size"] < 1000000){      //****************************************************/
	  $date=$_POST[b_y]."-".$_POST[b_m]."-".$_POST[b_d];   
	  $filepath=$record_path."\\".$new_path;                                                
$sqlstrii="insert into tb_meeting_info(meeting_name,meeting_department,meeting_place,meeting_date,meeting_host,meeting_saver,meeting_present,meeting_abstruct,meeting_address) values('$_POST[meeting_name]','$_POST[department]','$_POST[meeting_place]','$date','$_POST[meeting_host]','$_POST[meeting_saver]','$_POST[meeting_present]','$_POST[textarea]','$filepath')";
 $a_rst = $conn->execute($sqlstrii);
        if(!($a_rst==false)){
	    move_uploaded_file($_FILES["meeting_documents"]["tmp_name"],$record_path."\\".$new_path);         //上传文件操作
		echo "<script>alert('添加成功');history.go(-1);</script>";
	    }else{
		echo "<script>alert('添加失败');history.go(-1);</script>";
		}
          /*if(!($a_rst == false)){
	        /* move_uploaded_file($_FILES["meeting_documents"]["tmp_name"],$record_path."\\".$new_path);         //上传文件操作
             echo "<script>alert('添加成功');window.location.href='manager.php?lmbs=添加会议记录';</script>";
		    exit();
	       }else{
		     echo "<script>alert('添加失败');history.go(-1);</script>";
		     exit();*/
	  //****************************************************/  
	 }else{
	     echo "<script>alert('上传文件大小超过1M');history.go(-1);</script>";
	  }                                                                         //定义新文件名称 
   }else{
   echo "<script>alert('上传只支持 \".txt\"格式的文件');history.go(-1);</script>";
   }
}

?>