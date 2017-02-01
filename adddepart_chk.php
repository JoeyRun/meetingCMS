<?php
session_start();
include_once("conn/conn.php");
if(empty($_POST["departname"])){                                                                //判断输入的部门名称是否为空
   echo "<script>alert('请输入部门名称！！');history.go(-1);</script>";
}else{
   $sqlchk="select * from tb_meeting_depart where department_name='$_POST[departname]'";
   $sqlchk=$conn->Execute($sqlchk);
    if(!$sqlchk->EOF){                                                                          //判断该部门是否已存在
	   echo "<script>alert('该部门已存在！！请重新添加');history.go(-1);</script>";
	}else{
        $newdepart=$_POST["departname"];
        $sqlstrnd="insert into tb_meeting_depart(department_name)values('$newdepart')";         //执行数据库插入操作
        $nd_rst=$conn->Execute($sqlstrnd);
        if($nd_rst==true){                                                                      //判断是否添加成功
	        echo "<script>alert('添加成功！！');window.close();</script>";
	    }else{
	        echo "<script>alert('添加失败！！请重新添加');history.go(-1);</script>";
	    }
	}
}
?>
