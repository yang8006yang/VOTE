<?php
include_once "./db/base.php";


$chk = $Playlist_song->find(['list_id' => $_GET['id']]);
$list = $Playlist->find(['id' => $_GET['id']]);
echo "<div class='p-5 '><h1>" . $_GET['name'] . "</h1>";
echo "<div class='text-secondary'>".$list['description']."</div>";
if (empty($chk)) {
    echo "<a href='?do=songs&list_id={$_GET['id']}'>
    <i class='fa-solid fa-circle-plus'></i>添加歌曲
    </a><a href='./api/del.php?id={$_GET['id']}&table=playlist&name={$_GET['name']}'>
    <i class='fa-solid fa-circle-minus ps-3'></i>刪除清單
    </a>";
    echo "<br><br><a href='?do=songs&list_id={$_GET['id']}'>你的清單目前空空的呢，來去增加一些吧!</a>";
} else {
    $songs = q("SELECT * FROM `playlist_songs` INNER JOIN `songs` ON `songs`.`id` =`playlist_songs`.`song_id` && `list_id`='{$_GET['id']}}';");
    echo "<a href='?do=songs&list_id={$_GET['id']}'>
    <i class='fa-solid fa-circle-plus'></i>添加歌曲
    </a>
    <a href='./api/del.php?id={$_GET['id']}&table=playlist'>
    <i class='fa-solid fa-circle-minus ps-3'></i>刪除清單
    </a></div>";
    // dd($songs);
    foreach ($songs as $song) {
        echo "
        <table width='90%' class='mx-auto mt-2'>
            <tr>
            <td width='10%'>
                <a href='https://open.spotify.com/track/{$song['yt_link']}' target='blank'>
                <img src='./upload/{$song['cover']}' alt='∮' width='50px'></td>
                </a>
            <td>
                <div>{$song['song_name']}</div>
                <div>{$song['singer']}<div>
            </td>
                <td width='10%'>
                <a href='./api/delSong4List copy.php?id={$song['id']}&list_id={$_GET['id']}&name={$_GET['name']}'>
                <i class='fa-solid fa-minus p-1' style='border: 1px solid white;border-radius:50%'></i>
                </a>    
                </td>
            </tr>
        </table>";
    }
}
