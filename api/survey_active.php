<?php
include_once "../db/base.php";

$id=$_GET['id'];
$subject=$Subject->find($id);
$subject['active']=($subject['active']+1)%2;
$Subject->save($subject);
to('../center.php?do=survey');