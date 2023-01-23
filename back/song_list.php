<?php
if(isset($_GET['success']) && $_GET['success']=='1'){
    alert('刪除成功!');
}
?>
<div class="mx-auto mt-3 d-flex justify-content-center flex-wrap" style="width: 90%;">
    <h1 class="col-12">歌曲列表</h1>
    <?php

    $songs = all("songs");

    foreach ($songs as $song) {
        $activeText = ($song['active'] == 1) ? "關閉" : "啟用";
    ?>
        <div class="card bg-dark text-white mt-5 d-inline-block" style="width: 24%;">
            <div class="card-body d-flex flex-column " style="min-height: 350px;">
                <img class="card-img-top" src="./upload/<?= $song['cover'] ?>" alt="Card image">
                <h4 class="card-title flex-grow-1"><?= $song['song_name'] ?></h4>
                <p class="card-text mt-3"><?= $song['singer'] ?></p>
                <div>
                    <a href="./api/active.php?id=<?= $song['id'] ?>&table=song" class="card-link"><?= $activeText ?></a>
                    <a href="./center.php?do=song_edit&id=<?= $song['id'] ?>" class="card-link">編輯</a>
                    <a href="./api/del.php?id=<?= $song['id'] ?>&table=song" class="card-link">刪除</a>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>