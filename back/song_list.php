<div class="mx-auto w-50 mt-3">
    <h1>歌曲列表</h1>
    <?php

    $songs = all("songs");
    
    foreach ($songs as $song) {
        $activeText = ($song['active'] == 1) ? "關閉" : "啟用";
    ?>
        <div class="card bg-dark text-white mt-5">
            <div class="card-body">
            <img class="card-img-top" src="./upload/<?= $song['cover'] ?>" alt="Card image">
                <h4 class="card-title"><?= $song['song_name'] ?></h4>
                <p class="card-text"><?= $song['singer'] ?></p>
                <a href="./api/active.php?id=<?= $song['id'] ?>&table=song" class="card-link"><?= $activeText ?></a>
                <a href="./center.php?do=song_edit&id=<?= $song['id'] ?>" class="card-link">編輯</a>
                <a href="./api/del.php?id=<?= $song['id'] ?>&table=song" class="card-link">刪除</a>
            </div>
        </div>

    <?php
    }
    ?>
</div>