<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/found.js"></script>
<link href="css/found.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>
<body>
<table border="0">
  <tr>
     <td align="center" colspan="2" height="32">
	    ���һ����¼
	 </td>
  </tr>
<form id="found" name="found" action="manager.php?lmbs=���һ�����" method="post" onSubmit="return check_submit()">
  <tr><td height="26">��ѯ���ݣ�</td><td><input class="input_found"name="characters" type="text" /></td></tr>
  <tr>
  <td height="26">�������ͣ�</td>
  <td  align="left">
  <select name="findtype">
    <option value="0"><-��������-></option>
    <option value="1">������</option>
	<option value="2">��������</option>
  </select>
  </td></tr>
  <tr>
  <td height="26" colspan="3" align="center"><input class="found_btn" type="submit" value="" /></td>
  </tr>
 </form>
</table>
</body>
</html>
