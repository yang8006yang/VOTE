<?php
if (isset($_GET['error'])) {
    alert('圖片格式錯誤');
};

$song = find('songs', $_GET['id']);
?>
<div class="m-5 card-form text-center">
    <div class=" mx-auto d-flex flex-column">
        <h1 class=" impact bold text-start">編輯歌曲</h1>
        <div class="line"></div>
        <form action="./api/song_edit.php" method="post" class="w-100">
            <div><label for="name">歌名 : </label>
                <input type="text" name="name" id="name" value="<?= $song['song_name']; ?>">
            </div>
            <div><label for="singer">歌手 : </label>
                <input type="text" name="singer" id="singer" value="<?= $song['singer']; ?>">
            </div>
            <div><label for="link">連結 : </label>
                <input type="text" name="link" id="link" value="<?= $song['yt_link']; ?>">
            </div>
            <div><label for="type">分類 : </label>
                <input type="text" name="type" id="type" value="<?= $song['type']; ?>">
            </div>
            <div><label for="cover">封面 : </label>
                <input type="file" name="cover" id="cover">
</div>
                <div><label for="description" style="vertical-align: top;">描述 : </label>
                    <textarea name="description" id="description" cols="30" rows="10"><?= $song['description']; ?></textarea>
                </div>
                    <input type="hidden" name="id" id="id" value="<?= $_GET['id']; ?>">
                    <div class="text-center col-12 mt-3">
                <input type="submit" value="確定修改" class="submitBtn">
                <input type="reset" value="重置" class="btn">
            </div>      
                </form>
    </div>
</div>