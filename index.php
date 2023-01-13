<?php
include "./db/base.php";

if(isset($_GET['error']) && $_GET['error']=='nolog'){
    alert('請登入');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Spot</title>
    <link rel="stylesheet" href="./css/styke.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img src="./img/mine/mso.png" alt="" width="60px"></a>
            <div class="collapse navbar-collapse justify-content-center text-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#" style="color: white; font-size: 1.2rem; padding:0 5rem;" data-bs-toggle="popover" data-bs-content="We Are Music Spot! Let' Vote!" data-bs-placement="bottom" data-bs-trigger="focus">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#newArrival" style="color: white; font-size: 1.2rem; padding:0 5rem;">NEW SONG</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link font-weight-bold" href="#contact" style="color: white; font-size: 1.2rem; padding:0 5rem;">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold" href="./center.php" style="color: white;font-size: 1.2rem; padding:0 5rem;">CENTER</a>
            </li>
        </ul>
        
        <?php
        if (isset($_SESSION['login'])) {
            echo "<a class='nav-item login align-self-start btn btn-light' href='logout.php'>登出</a>";
        } else {
            echo "<a class='nav-item singup btn btn-light' href='index.php?do=reg'>註冊</a>";
            echo "<a class='nav-item login btn btn-light' href='index.php?do=login'>登入</a>";
        }
        ?>

</div>
<div style="width:7vw;"></div>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
</div>
</nav>
<main>
    <?php
    $do=$_GET['do']??'main';
    // ?? => 有就是?前面的 沒有就後面的
    
    $file="./front/".$do.".php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./front/main.php";
    }
    ?>
</main>
<script src="./js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>
</body>
</html>