<?php
if(isset($_GET['error'])){
    alert('圖片格式錯誤');
};

$song=find('songs',$_GET['id']);
?>

<h1>編輯歌曲</h1>
<form action="./api/song_edit.php" method="post">
<label for="name">歌名 : </label>
    <input type="text" name="name" id="name" value="<?=$song['song_name'];?>">
    <label for="singer">歌手 : </label>
    <input type="text" name="singer" id="singer" value="<?=$song['singer'];?>">
    <label for="link">連結 : </label>
    <input type="text" name="link" id="link" value="<?=$song['yt_link'];?>">
    <label for="type">分類 : </label>
    <input type="text" name="type" id="type" value="<?=$song['type'];?>">
    <label for="cover">封面 : </label>
    <input type="file" name="cover" id="cover">
    <label for="description">描述 : </label>
    <textarea name="description" id="description" cols="30" rows="10"><?=$song['description'];?></textarea>
    <input type="hidden" name="id" id="id" value="<?=$_GET['id'];?>">

    <input type="submit" value="送出">
</form>