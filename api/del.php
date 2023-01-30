<?php
include_once "../db/base.php";

$id=$_GET['id'];
switch ($_GET['table']) {
    case 'survey':
        $table='Subject';
        $do='survey';
        $Option->del(['subject_id'=>$id]);
        break;
    case 'song':
        $table='Song';
        $do='song_list';
        break;
    case 'user':
        $table='User';
        $do='user_list&level=1';
        break;
    case 'playlist':
        $table='Playlist';
        $do="";
        break;
    
    default:
        # code...
        break;
}

$$table->del($id);
to("../center.php?do=$do&success=1");
