<?php
session_start();
include_once("conn/conn.php");
if($_SESSION["rights"]!=1){
echo "<script>alert('�Ƿ���������');history.go(-1);</script>";
}else{
$sqlstrx="select * from tb_meeting_user";
  $num=2;                                                 //ÿҳ��ʾ����¼��
  if(isset($_GET['n_page'])){	                        //�жϵ�ǰҳ��
   $c_page = $_GET[n_page];					            //��$n_page��������$c_apge
  }else{
		$c_page = 1;								    //��ʼ������$c_page
	    }
$l_rst = $conn -> PageExecute($sqlstrx,$num,$c_page);	//ִ��pageExecute����
$acc_rst=$conn->Execute($sqlstrx);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/acc_manager.css" type="text/css"  rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0">
  <tr>
     <td align="center" bgcolor="#CCCCCC" width="30" height="16">ID��</td>
	 <td align="center" bgcolor="#CCCCCC" width="70" height="16">�û�����</td>
	 <td align="center" bgcolor="#CCCCCC" width="80" height="16">�û����룺</td>
	 <td align="center" bgcolor="#CCCCCC" width="80" height="16">�������ţ�</td>
	 <td align="center" bgcolor="#CCCCCC" width="80" height="16">�޸�Ȩ�ޣ�</td>
	 <td align="center" bgcolor="#CCCCCC" width="80" height="16">�����ʻ���</td>
	 <td align="center" bgcolor="#CCCCCC" width="80" height="16">ɾ��</td>
  </tr>
<?php 
 while(!$l_rst->EOF){
 ?>
<form action="acc_manager_chk.php" method="post">
  <tr>
     <td height="26"><?php echo $l_rst->fields[0]; ?> </td>
	 <td><?php echo $l_rst->fields[1]; ?></td>
	 <td><?php echo $l_rst->fields[2]; ?></td>
	 <td><?php echo $l_rst->fields[7]; ?></td>
	 <td><input type="submit" name="select_action" value="<?php if($l_rst->fields[5]==0){echo "����Ȩ��";}else {echo "ȡ��Ȩ��";}?>" /></td>
	 <td><input type="submit" name="select_action" value="<?php if($l_rst->fields[6]==0){echo "�����ʻ�";}else {echo "�ⶳ�ʻ�";}?>" /></td>
	 <td><input type="submit" name="select_action" value="ɾ���ʻ�" /></td>
 </tr>
<input type="hidden"  name="select_id" value="<?php echo $l_rst->fields[0] ?>" />
</form>
<?php
   $l_rst->movenext();
   }  
?>
</table>
<div>
 <table>
   <tr>
     <td>
        <font color='#999999'>��ǰ�ǵ�<?php echo $l_rst -> absolutePage(); ?>ҳ/һ��<?php echo $l_rst -> LastPageNo(); ?>ҳ</font>
<?php


		if(!$l_rst -> AtfirstPage()){					//�����ǰҳ������ҳ
?>
<!--  ������Ϸ�ҳ������  -->
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=1" ?>"> ��ҳ </a>
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() - 1); ?>"> ��һҳ </a>
<!--  ----------------------------  -->
<?php
		}
		if(!$l_rst -> AtlastPage()){					//�����ǰҳ����βҳ
?>
<!--  ������·�ҳ������  -->
		<a href = "<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() + 1); ?>"> ��һҳ </a>
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> LastPageNo());?>"> βҳ </a>	
<!--  -----------------------------  -->

<?php
		}

?>&nbsp;&nbsp;
    </td>
    <td width="120"><span style="color:#FF0000">���������û�>>></span></td>
    <td>
   <a href="#" onclick="javascript:Wopen=open('addaccount.php','','height=420,width=550,scrollbars=no');"><img src="images/append_15.jpg" width="48" height="20" border="0" /></a></td>
   </tr>
 </table>
</div>
</body>
<?php
 }
?>
</html>
