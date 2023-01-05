<?php
include_once "../db/base.php";
$user=find('users',$_POST['id']);
$user['level']=0;

update('users',$user,$_POST['id']);
to("../center.php?do=user_list");
?>