<?php
    $voting = all('survey_subjects', 'ORDER BY `vote` DESC LIMIT 1');
    $subject = all('survey_subjects', ' WHERE `active`=0 && `vote`!=0 ORDER BY `vote` DESC LIMIT 1');
    $opts = all('survey_options',['subject_id' => $subject[0]['id']]);
    $xValues = [];
    $yValues = [];
    foreach ($opts as $opt) {
        array_push($xValues, $opt['opt']);
        array_push($yValues, $opt['vote']);
    }
    ?>

<div style="position: relative;" class="d-flex">
    <div class="col-sm-6 left d-flex flex-column justify-content-center ps-5 pt-5">
        <div class="title">
            Listening<br> To<br> The "VOICE"
        </div>
        <div class="font-weight-bold text-white bold fs-5">發表你的意見、聽見大家的聲音，並將你喜歡的歌曲分類!</div>

        <button class="btn btn-lg btn-light mt-5 impact fs-2 ps-5 pe-5 shadow" onclick="location.href ='index.php?do=reg'">Get Start</a></button>

    </div>
    <img src="./img/happy-beautiful-brunette-girl-dancing-listening-music-wireless-headphones-holding-smartphone2.png" alt="" class="mainImg position-absolute img-fluid" style="height: 80vh;">
    <div class="col-sm-6 right text-center d-flex flex-column justify-content-center ps-5 pt-5">
        <div class="d-flex mb-5">
            <div class="cube text-white bold p-2">
                <div class="fs-1">5.2k</div>
                <div class="line"></div>
                <div>Happy Users</div>
            </div>
            <div class="cube text-white bold p-2">
                <div class="fs-1">6k</div>
                <div class="line"></div>
                <div>5 Stars Review</div>
            </div>
            <div class="cube text-white bold p-2">
                <div class="fs-1">10k</div>
                <div class="line"></div>
                <div>Completed Survey</div>
            </div>
        </div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="text-white fs-1 mt-5 impact">
            Everyone Voting
        </div>
        <div class="box mx-auto mt-3 d-flex ">
            <div class="d-flex flex-column justify-content-center ps-5">
                <div class="fs-2 bold pt-5"><?= $voting[0]['subject']; ?></div>
                <div class="line " style="background-color:rgb(27, 36, 37);width: 20vw;"></div>
                <div class="pb-5"><?= $voting[0]['content']; ?></div>
            </div>
            <div class="d-flex flex-column justify-content-center mx-auto bold">
                參與人數
                <div class="fs-1"> <?= $voting[0]['vote']; ?></div>
            </div>
        </div>
    </div>
</div>
<figure class="marquee marquee--mantis" data-text=" ! NEWS !  VOTE !  SONG !"></figure>

<!-- =========================NewArrival================================-->
<div id="newArrival" style="background-color:rgb(27, 36, 37); height: 100vh;">
    
    <figure class="marquee-small marquee--s pt-5" data-text="NEW ARRIVAL" style="rotate: 5deg;"></figure>
    <div class="position-relative">
        <div style="height:70vh;" class="owl-carousel owl-theme d-flex mt-xxl-5 pt-lg-5 justify-content-around overflow-hidden flex-wrap align-items-center">
            <?php
            $array = all('songs', ['active' => '1'], 'ORDER BY `update_at` DESC LIMIT 5');
            // print_r($array);
            foreach ($array as $key => $value) {
                $song = $value['song_name'] . " - " . $value['singer'];
                $img = $value['cover']
            ?>
                <div class="item album position-relative ">
                    <div class="cd-cover mx-auto shadow" style="background-image: url(./upload/<?= $img; ?>);"></div>
                    <div class="cd mx-auto shadow"></div>
                    <div class="fs-5 text-center"><?= $song; ?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <figure class="marquee-small marquee--s" data-text="NEW ARRIVAL" style="rotate: 5deg;"></figure>
</div>

<!-- =========================Survey================================-->
<div id="surveyComped">
    <img src="./img/survey-com-01.png" alt="" class="img-fluid w-75" id="surveyText">
</div>
<div class="p-2 pb-5" style="background-color: rgb(27, 36, 37);">
    <h1 id="title" class="bold text-white text-center p-5"><?= $subject[0]['subject']; ?></h1>
    <canvas id="myChart" style="width:100%;max-width:1200px;margin:0 auto"></canvas>
</div>
<a href="index.php?do=reg">
    <div class="impact fs-1 text-center p-5" style="background-color: #d7b700;">
        Join Us !!   Check out more!!
    </div>
</a>

<!-- =========================FOOTER================================-->

<footer id="contact">
    <div class="row align-items-center mx-auto p-5 text-center text-light">
        <div class="col-sm-6 d-flex flex-column text-center">
            <div class="col mt-5">CONTACT US</div>
            <hr>
            <div class="d-flex justify-content-center mt-3">
                <i class="m-2 fs-2 fa-solid fa-envelope"></i>
                <i class="m-2 fs-2 fa-solid fa-phone"></i>
                <i class="m-2 fs-2 fa-solid fa-location-dot"></i>
            </div>
            <div class="col mt-5">SNS</div>
            <hr>
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-outline-light btn-lg fa-brands fa-instagram p-2"></button>
            <button type="button" class="btn btn-outline-light btn-lg fa-brands fa-facebook p-2 ms-sm-3"></button>
            <button type="button" class="btn btn-outline-light btn-lg fa-brands fa-twitter p-2 ms-sm-3"></button>
            </div>
        </div>
        <div class="col-sm-3">
            <img src="./img/mscd-01.jpg" alt="Music Spot" width="50px" style="border-radius: 10px;">
        </div>
        <div class="col-sm-3 text-light">
            © 2023 by Music Spot.
            Just for learning.
        </div>
    </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</link>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<?php
include_once "./js/chart.php";
?>