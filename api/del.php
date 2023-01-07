<?php
include_once "../db/base.php";

$id=$_GET['id'];
switch ($_GET['table']) {
    case 'survey':
        $table='survey_subjects';
        $do='survey';
        del("survey_options",['subject_id'=>$id]);
        break;
    case 'song':
        $table='songs';
        $do='song_list';
        break;
    case 'user':
        $table='users';
        $do='user_list';
        break;
    
    default:
        # code...
        break;
}

del($table,$id);
to("../center.php?do=$do");
