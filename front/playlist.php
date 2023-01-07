<?php
include_once "./db/base.php";


$songs=find('playlist_songs',['list_id'=>$_GET['id']]);
echo '<h1>'.$_GET['name']."</h1>";
if(empty($songs)){
    echo "<a href='?do=songs'>你的清單目前空空的呢，來去增加一些吧!</a>";
}else{
    foreach ($songs as $song) {
?>

<?php
    }
}
?>