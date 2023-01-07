<?php
include_once "../db/base.php";

$id=$_GET['id'];
switch ($_GET['table']) {
    case 'survey':
        $table='survey_subjects';
        $do='survey';
        break;
    case 'song':
        $table='songs';
        $do='song_list';
        break;
    
    default:
        # code...
        break;
}
$tmp=find($table,$id);
$tmp['active']=($tmp['active']+1)%2;
update($table,$tmp,$id);
to("../center.php?do=$do");