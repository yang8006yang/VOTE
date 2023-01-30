<?php
include_once "../db/base.php";
$user=$User->find($_POST['id']);
$user['level']=0;

$User->save($user);
to("../center.php?do=user_list");
?>