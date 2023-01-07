<h1>音樂倉庫</h1>
<?php
include_once "./db/base.php";

$songs=all('songs','ORDER BY `update_at` DESC LIMIT 5');
echo "<p>最新歌曲</p>";
foreach ($songs as $song) {
?>
    <div class=" text-white mt-5">
            <div class="" style="">
            <img class="" src="./upload/<?= $song['cover'] ?>" alt="Card image" style="width: 50px;">
                <h4 class=""><?= $song['song_name'] ?></h4>
                <p class=""><?= $song['singer'] ?></p>
            </div>
        </div>
    <p>全部歌曲</p>
<?php
}

$sql_total = "SELECT count(`id`) FROM `songs`;";
$total = $pdo->query($sql_total)->fetchColumn();
$div=5;
$pages=ceil($total / $div); 
$now = $_GET['page'] ?? 1;
$start = ($now - 1) * $div;
$songs=all('songs',"LIMIT $start,$div");

foreach ($songs as $song) {
?>
<div class="text-white">
            <div >
            <img  src="./upload/<?= $song['cover'] ?>" alt="Card image" style="width: 50px;">
                <h4 ><?= $song['song_name'] ?></h4>
                <p ><?= $song['singer'] ?></p>
            </div>
        </div>
<?php
}
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=songs&page={$next}'>NEXT</a>";
}elseif($pages==1){
    $next=$now+1;
    echo "<a href='./center.php?do=songs&page={$next}'>NEXT</a>";
}

if(($now-1)>0){
    $prev=$now-1;
        echo "<a href='?do=songs&page=$prev'>PREV</a>";
}
?>
