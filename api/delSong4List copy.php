<?php
include_once "../db/base.php";

del('playlist_songs',['list_id'=>$_GET['list_id'],'song_id'=>$_GET['id']]);
to("../center.php?do=playlist&id={$_GET['list_id']}&name={$_GET['name']}");