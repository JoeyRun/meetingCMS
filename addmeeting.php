<?php
// session_start();
//fixed:A session had already been started - ignoring session_start()
if(!isset($_SESSION)){
    session_start();
}
include_once("conn/conn.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/add_meeting.js"></script>
<link href="css/addmeeting.css" type="text/css" rel="stylesheet" />

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="add_m_info">
<table cellpadding="0" cellspacing="0" border="0">
<form  id="theForm" name="theForm" action="addmeeting_chk.php" method="post" onSubmit="return check_submit();" enctype="multipart/form-data">
 <tr><td colspan="3" height="32"><h1 align="center">��ӻ����¼</h1></td></tr>
 <tr>
   <td width="120" height="28"><div align="center">��������:</div></td>
   <td><input class="input2"  type="text" name="meeting_name" /></td>
   <td align="left" width="180" ><span class="sp1">*��д�����¼����</span></td> 
 </tr>
   
 <tr>
   <td height="28"><div align="center">��������:</div></td>
   <td>
     <div align="left">
       <select class="upload" name="department">
	   <option>��ѡ����</option>
           <?php 
   $sqlstr="select department_name from tb_meeting_depart";
   $l_rst = $conn->execute($sqlstr);
   while(!$l_rst->EOF){
   ?>
           <option value="<?php echo $l_rst->fields[0]; ?>"><?php echo  $l_rst->fields[0]; ?></option>
            <?php
   $l_rst->movenext();
   }
   ?>
              </select>
       </div></td>
	   <td  align="left" width="180"><span class="sp1">*ѡ����л��鲿��</span></td> 
 </tr>
 <tr>
   <td height="28"><div align="center">����ص�:</div></td>
   <td><input class="input2" type="text" name="meeting_place" /></td>
   <td align="left" width="180"><span class="sp1">*��д����ص�����</span></td> 
 </tr>
 <tr>
   <td height="28"><div align="center">��������:</div></td>
   <td>
   <select  class="upload" name="b_y">
   <?php 
   for($i=2010;$i<2020;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��
   <select name="b_m">
   <?php 
   for($i=1;$i<13;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��
   <select name="b_d">
   <?php 
   for($i=1;$i<32;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��   </td>
   <td align="left" width="180"><span class="sp1">*ѡ������ٿ�����</span></td> 
 </tr>
 <tr>
   <td height="28"><div align="center">����������:</div></td>
   <td><input class="input2" type="text" name="meeting_host" /></td>
   <td align="left" width="180"><span class="sp1">*��д����������&nbsp;&nbsp;</span></td> 
 </tr>
 <tr>
   <td height="28" ><div align="center">�����¼��:</div></td>
   <td><input class="input2" type="text" name="meeting_saver" /></td>
   <td align="left" width="180"><span class="sp1">*��д�����¼��</span></td> 
 </tr>
 <tr>
   <td height="28"><div align="center">��ϯ��Ա:</div></td>
   <td><input class="input2" type="text" name="meeting_present" /></td>
   <td align="left" width="180"><span class="sp1">*��д�����ϯ��Ա</span></td> 
 </tr>
  <tr>
   <td height="28">�ϴ���������</td><td><input class="upload" name="meeting_documents" type="file" size="16"></td>
   <td align="left" width="180"><span class="sp1">*�ϴ�txt��ʽ�����ĸ�</span></td> 
 </tr>
 
 <tr>
   <td ><div align="center">����ժҪ:</div></td>
   <td height="70"><textarea  style="width:170px; border:1px solid #CCCCCC"name="textarea" rows="4"></textarea></td>
   <td align="left" width="180"><span class="sp1">*��д�����¼ժҪ</span></td> 
 </tr>
 <tr>
 <td height="12"colspan="3"></td>
 </tr>
 <tr>
 <td  height="30" colspan="2"><center><input class="add_mbtn1" type="submit" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;<input class="add_mbtn2" type="reset" value="" /></center></td><td></td>
 </tr>
</form>
</table>
</div>
</body>
</html>
