<?php
//session_start();
//fixed:A session had already been started - ignoring session_start()
if(!isset($_SESSION)){
    session_start();
}
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/viewmeeting.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<h3>������Ϣ���</h3>

<?php
$sqlview="select * from tb_meeting_info";
$num=2;                                                 //ÿҳ��ʾ����¼��
  if(isset($_GET['n_page'])){	                        //�жϵ�ǰҳ��
   $c_page = $_GET['n_page'];					            //��$n_page��������$c_apge
  }else{
		$c_page = 1;								    //��ʼ������$c_page
	    }
 $l_rst = $conn -> PageExecute($sqlview,$num,$c_page);	//ִ��pageExecute����
$rst_view = $conn->execute($sqlview);
$record=count($rst_view->GetRows());                    //��ȡ�ܼ�¼��
if($record==0){
echo "<span class=\"norecord\">��ǰû���κμ�¼</span>";
}else{
?>

<table width="728" border="0" cellspacing="0" cellpadding="0" bordercolor="#66CC00">
  <tr class="tableheader">
    <td width="55" align="center" height="25">������</td>
    <td width="60" align="center">��������</td>
    <td width="60" align="center">��������</td>
    <td width="80" align="center">����ص�</td>
    <td width="80" align="center">��������</td>
    <td width="45" align="center">������</td>
    <td width="60" align="center">��ϯ��Ա</td>
    <td width="45" align="center">��¼��</td>
    <td width="120" align="center">����ժҪ</td>
	<td width="60" align="center">�鿴����</td>
  </tr>
<?php
while(!$l_rst->EOF){
?>

  <tr>
    <td height="30"><?php echo $l_rst->fields[0]; ?></td>
    <td height="30"><?php echo $l_rst->fields[1]; ?></td>
    <td height="30"><?php echo $l_rst->fields[2]; ?></td>
    <td height="30"><?php echo $l_rst->fields[3]; ?></td>
    <td height="30"><?php echo $l_rst->fields[4]; ?></td>
    <td height="30"><?php echo $l_rst->fields[5]; ?></td>
    <td height="30"><?php echo $l_rst->fields[6]; ?></td>
    <td height="30"><?php echo $l_rst->fields[7]; ?></td>
    <td height="30"><?php echo $l_rst->fields[8]; ?></td>
	<td height="30" align="center"><a href="#" onclick="javascript:Wopen=open('showinfo.php?id=<?php echo $l_rst->fields[0]; ?>','','height=720,width=1004,scrollbars=no');"><img src="images/xiazai.gif" width="26" height="18" border="0" alt="����"></a></td>
  </tr>
<?php
   $l_rst->movenext();
   }

 ?>
</table>
<div class="sepa_page">
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
?><?php
}
?>
      </td>
	  <td width="100" align="right"><span style="color:#FF0000">��˵�������>>></span></td>
	  <td width="60">
		   <a href="createform.php"><img align="bottom"src="images/out_15.jpg" width="48" height="20" border="0" /></a>
		</td>
	 </tr>
  </table>
</div>
</body>
</html>
