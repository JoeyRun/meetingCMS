<?php
session_start();
include_once("conn/conn.php");
$selectType=$_POST["select_action"];
if($selectType=="ɾ���ʻ�"){
  $sqlstract="delete from tb_meeting_user where userId=$_POST[select_id]";
     if($_POST["select_id"]!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
           if($del_rst){
              echo "<script>alert('ɾ���ɹ�����');history.go(-1);</script>";
           }else{
              echo "<script>alert('ɾ��ʧ�ܣ���');history.go(-1);</script>";
           }
      }else{
    echo "<script>alert('���ʻ���ֹ����������');history.go(-1);</script>";
    }
}
if($selectType=="�����ʻ�"){
  $sqlstract="update tb_meeting_user set userWhether=1 where userId=$_POST[select_id]";
     if($_POST[select_id]!=1){
        $del_rst=$conn->Execute($sqlstract);
           if($del_rst){
              echo "<script>alert('���û��Ѷ��ᣡ��');history.go(-1);</script>";
           }else{
              echo "<script>alert('����ʧ�ܣ���');history.go(-1);</script>";
           }
      }else{
    echo "<script>alert('���ʻ���ֹ����������');history.go(-1);</script>";
    }
}
if($selectType=="�ⶳ�ʻ�"){
  $sqlstract="update tb_meeting_user set userWhether=0 where userId=$_POST[select_id]";
     if($_POST[select_id]!=1){
        $del_rst=$conn->Execute($sqlstract);
           if($del_rst){
              echo "<script>alert('���û��ѽⶳ����');history.go(-1);</script>";
           }else{
              echo "<script>alert('����ʧ�ܣ���');history.go(-1);</script>";
           }
      }else{
    echo "<script>alert('���ʻ���ֹ����������');history.go(-1);</script>";
    }
}

if($selectType=="����Ȩ��"){
  $sqlstract="update tb_meeting_user set userRights=1 where userId=$_POST[select_id]";
     if($_POST[select_id]!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
           if($del_rst){
              echo "<script>alert('���óɹ������û��ѳ�Ϊ����Ա��');history.go(-1);</script>";
           }else{
              echo "<script>alert('����ʧ�ܣ���');history.go(-1);</script>";
           }
      }else{
    echo "<script>alert('���ʻ���ֹ����������');history.go(-1);</script>";
    }
}
if($selectType=="ȡ��Ȩ��"){
  $sqlstract="update tb_meeting_user set userRights=0 where userId=$_POST[select_id]";
     if($_POST[select_id]!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
           if($del_rst){
              echo "<script>alert('ȡ���ɹ������û��ѱ�ȡ������Ա��');history.go(-1);</script>";
           }else{
              echo "<script>alert('����ʧ�ܣ���');history.go(-1);</script>";
           }
      }else{
    echo "<script>alert('���ʻ���ֹ����������');history.go(-1);</script>";
    }
}

?>