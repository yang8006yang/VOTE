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
        $do='user_list&level=1';
        break;
    case 'playlist':
        $table='playlists';
        $do="";
        break;
    case 'playlist_song':
        $table='playlist_songs';
        $id=['list_id'=>$_GET['list_id'],'song_id'=>$_GET['id']];
        $do="playlist&id={$_GET['list_id']}&name={$_GET['name']}";
        break;
    
    default:
        # code...
        break;
}

del($table,$id);
to("../center.php?do=$do&success=1");
