<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/recordmanager.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
</head>

<body>
<h3>������Ϣ����</h3>

<?php
$sqlview="select * from tb_meeting_info";
$num=2;                                                 //ÿҳ��ʾ����¼��
  if(isset($_GET['n_page'])){	                        //�жϵ�ǰҳ��
   $c_page = $_GET[n_page];					            //��$n_page��������$c_apge
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

<table width="740" border="0" cellspacing="0" cellpadding="0">
  <tr class="tableheader">
    <td width="50">������</td>
    <td width="60">��������</td>
    <td width="60">��������</td>
    <td width="80">����ص�</td>
    <td width="80">��������</td>
    <td width="45">������</td>
    <td width="60">��ϯ��Ա</td>
    <td width="45">��¼��</td>
    <td width="120">�޸ļ�¼</td>
	<td width="60">ɾ������</td>
  </tr>
<?php
while(!$l_rst->EOF){
?>

  <tr>
  <form action="deletemeeting.php?id=<?php echo $l_rst->fields[0]; ?>" method="post">
    <td height="26"><?php echo $l_rst->fields[0]; ?></td>
    <td><?php echo $l_rst->fields[1]; ?></td>
    <td><?php echo $l_rst->fields[2]; ?></td>
    <td><?php echo $l_rst->fields[3]; ?></td>
    <td><?php echo $l_rst->fields[4]; ?></td>
    <td><?php echo $l_rst->fields[5]; ?></td>
    <td><?php echo $l_rst->fields[6]; ?></td>
    <td><?php echo $l_rst->fields[7]; ?></td>
    <td><a href="#" onclick="javascript:Wopen=open('amendmeeting.php?id=<?php echo $l_rst->fields[0]; ?>','','height=420,width=604,scrollbars=no');"><img src="images/amend.ico" width="16" height="16" border="0" alt="�޸�"></a></td>
	<td height="22" align="center"><input class="btn2" type="submit" value="" name="deletemeeting" /></td>
	</form>
  </tr>
<?php
   $l_rst->movenext();
   }

 ?>
</table>
<div>
 
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
}
?>
</div>
</body>
</html>
