<?php
include_once "../db/base.php";

$user=['acc'=>$_POST['acc'],
    'pw'=>$_POST['pw'],
    'email'=>$_POST['email'],
    'name'=>$_POST['name']];

$chk=q("SELECT * FROM `users` WHERE `acc`='{$_POST['acc']}' OR `email`='{$_POST['email']}'OR `name`='{$_POST['name']}'");
if(empty($chk)){
    insert('users',$user);
    to("../index.php?do=login");
}else{
    to("../index.php?do=reg&error=1");
}; 
?>