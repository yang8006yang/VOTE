<?php
include "./db/base.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
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
    <a class="navbar-brand" href="./index.php">Logo</a>
    <div class="collapse navbar-collapse justify-content-center text-center " id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#about">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sns">SNS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./center.php">CENTER</a>
            </li>
        <?php
        if (isset($_SESSION['login'])) {
            echo "<li class='nav-item login'><a class='btn' href='logout.php'>登出</a></li>";
        } else {
            echo "<li class='nav-item singup'><a class='btn' href='index.php?do=reg'>註冊</a></li>";
            echo "<li class='nav-item login'><a class='btn btn-light' href='index.php?do=login'>登入</a></li>";
        }
        ?>
        </ul>
    </div>
    <div style="width:7vw;"></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
</nav>
<main class="container-fluid">
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
</body>
</html>