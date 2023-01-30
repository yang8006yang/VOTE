<?php
include_once "../db/base.php";

$Playlist_song->save(['list_id'=>$_GET['list_id'],'song_id'=>$_GET['id']]);
to("../center.php?do=songs&list_id={$_GET['list_id']}&success=1");