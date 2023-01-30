<?php
include "../db/base.php";

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$email = $_POST['acc'];

$chkA = $User->find(['acc' => $acc, 'pw' => $pw]);
$chkE = $User->find(['email' => $acc, 'pw' => $pw]);
$chkN = $User->find(['name' => $acc, 'pw' => $pw]);

// if(!empty($chkA)){
//     $chk=$chkA;
// }elseif(!empty($chkE)){
//     $chk=$chkE;
// }else{
//     $chk=$chkN;
// }
$chk = !empty($chkA) ? $chkA : (!empty($chkE) ? $chkE : $chkN);

if (empty($chk)) {
    echo '錯誤';
    to("../index.php?do=login&error=login");
} else {
    $_SESSION['login'] = $chk;
    to("../center.php");
}
