<?php
if(isset($_GET['error'])){
    alert('圖片格式錯誤');
}
?>
<h1>新增歌曲</h1>
<form action="./api/song_add.php" method="post" enctype="multipart/form-data">
    <label for="name">歌名 : </label>
    <input type="text" name="name" id="name">
    <label for="singer">歌手 : </label>
    <input type="text" name="singer" id="singer">
    <label for="link">連結 : </label>
    <input type="text" name="link" id="link">
    <label for="type">分類 : </label>
    <input type="text" name="type" id="type">
    <label for="cover">封面 : </label>
    <input type="file" name="cover" id="cover">
    <label for="description">描述 : </label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <input type="submit" value="建立">



</form>