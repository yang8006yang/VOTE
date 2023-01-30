<?php
include_once "../db/base.php";

$list=['list_name'=>$_POST['name'],
    'description'=>$_POST['description'],
    'user_id'=>$_SESSION['login']['id']];

if(!empty($list['list_name'])){
    $Playlist->save($list);
};
    
to("../center.php");
?>