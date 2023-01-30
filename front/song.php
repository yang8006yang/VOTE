<?php
include_once "./db/base.php";
if (isset($_GET['success']) && $_GET['success'] == '1') {
    alert('添加成功');
}
if (isset($_GET['id'])) {
    $song = $Song->find($_GET['id']);
    ?>
<style>
    .song-img {
        background-image: linear-gradient(to top, #242424 0%, #d7b70000 100%),
        url(./upload/<?=$song['cover'];?>);
        height: 350px;
        width: 100vw;
    }
</style>
<?php
    echo "<a href='https://open.spotify.com/track/{$song['yt_link']}' target='blank'><div class='song-img'></div></a>
<div class='ms-5'>
<h1>{$song['song_name']}</h1>
<div>{$song['singer']}</div>
<div>{$song['type']}</div>
<div>{$song['description']}</div></div>";
} else {
    echo '不存在的網頁';
}
?>