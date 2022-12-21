<?php
include "../db/base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];


$chk=find('users',['acc'=>$acc,'pw'=>$pw]);
if(empty($chk)){
    echo '錯誤';
    to("../index.php?do=login&error=login");
}else{
        $_SESSION['login']=$chk;
    to("../center.php");
}
// else if($chk['acc']=='admin' && $chk['pw']=='admin'){
//     $_SESSION['login']=$chk;
//     to("../admin.php");
// }else{
//     $_SESSION['login']=$chk;
//     to("../center.php");

// }

