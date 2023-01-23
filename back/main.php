<h1 class="mt-3 ms-3">HI ! <?=$_SESSION['login']['name'];?>&nbsp; 為你推薦</h1>
<div class="d-flex ms-2">
    <?php
    $upsong = q("SELECT * FROM `songs` WHERE `id` IN('3','4','6')");
    foreach ($upsong as $song) {
    ?>
        <div class="col m-2">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/<?= $song['yt_link']; ?>?utm_source=generator" width="100%" height="252" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    <?php
    }
    ?>
</div>

<h1 class="mt-3 ms-3">進行中的投票</h1>
<div class="d-flex ms-1">
    <?php
    $surveys = all('survey_subjects', ['active' => 1], 'LIMIT 5');
    foreach ($surveys as $survey) {
    ?>
        <a href="./center.php?do=survey_vote&id=<?= $survey['id']; ?>" class="col card m-3 card-vote" style="border-radius:12px">
            <div class="card-body card-main">
                <h4 class="card-title bold"><?= $survey['subject'] ?></h4>
                <hr>
                <p class="card-text"><?= $survey['content'] ?></p>
                <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
            </div>
        </a>

    <?php
    }
    ?>
</div>
<h1 class="mt-3 ms-3">來看看結果吧</h1>
<div class="d-flex ms-1">
    <?php
    $closeSurveys = q("SELECT * FROM `survey_subjects` WHERE `vote`>'0' && `active` = '0' LIMIT 5");
    foreach ($closeSurveys as $survey) {
    ?>
        <a href="./center.php?do=survey_result&id=<?= $survey['id']; ?>" class="col card m-3 card-vote" style="border-radius:12px">
            <div class="card-body card-main">
                <h4 class="card-title bold"><?= $survey['subject'] ?></h4>
                <hr>
                <p class="card-text"><?= $survey['content'] ?></p>
                <p class="card-text">參與次數 : <?= $survey['vote'] ?></p>
            </div>
        </a>
        <?php
    }
    ?>
    </div>
</div>