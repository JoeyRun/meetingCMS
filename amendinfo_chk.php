<?php 
session_start();
include_once("conn/conn.php");
$pwd=$_POST["olderpwd"];
if(!empty($pwd)){
$sqlchk="select userPassword from tb_meeting_user where userId =$_SESSION[id]";
$amend_rst=$conn->Execute($sqlchk);
  if($pwd==$amend_rst->fields[0]){
     echo "<meta http-equiv=\"refresh\" content=\"0;url=manager.php?lmbs=�޸�����\" />";
    ?>
	<form action="amendpwd.php">
	<input type="hidden" name="amendpwd">
	</form>
	<?php
  }else{
     echo "<script>alert('ԭ�������������������ȷ�����룡��');history.go(-1);</script>";
  }
}else{
echo "<script>alert('������ԭ���룡��');history.go(-1);</script>";
} 
?>