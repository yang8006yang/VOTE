<?php
include_once "../db/base.php";

$chk=q("select count(*) from `playlist_songs` where `list_id`={$_GET['list_id']} && `song_id`={$_GET['id']}");
var_dump($chk);
if($chk[0][0]==1){
    to("../center.php?do=songs&list_id={$_GET['list_id']}&success=2");
}else{
    insert('playlist_songs',['list_id'=>$_GET['list_id'],'song_id'=>$_GET['id']]);
    to("../center.php?do=songs&list_id={$_GET['list_id']}&success=1");
};