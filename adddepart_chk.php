<?php
session_start();
include_once("conn/conn.php");
if(empty($_POST["departname"])){                                                                //�ж�����Ĳ��������Ƿ�Ϊ��
   echo "<script>alert('�����벿�����ƣ���');history.go(-1);</script>";
}else{
   $sqlchk="select * from tb_meeting_depart where department_name='$_POST[departname]'";
   $sqlchk=$conn->Execute($sqlchk);
    if(!$sqlchk->EOF){                                                                          //�жϸò����Ƿ��Ѵ���
	   echo "<script>alert('�ò����Ѵ��ڣ������������');history.go(-1);</script>";
	}else{
        $newdepart=$_POST["departname"];
        $sqlstrnd="insert into tb_meeting_depart(department_name)values('$newdepart')";         //ִ�����ݿ�������
        $nd_rst=$conn->Execute($sqlstrnd);
        if($nd_rst==true){                                                                      //�ж��Ƿ���ӳɹ�
	        echo "<script>alert('��ӳɹ�����');window.close();</script>";
	    }else{
	        echo "<script>alert('���ʧ�ܣ������������');history.go(-1);</script>";
	    }
	}
}
?>
