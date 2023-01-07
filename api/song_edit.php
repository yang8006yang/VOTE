<?php
include_once "../db/base.php";
    $song = find('songs', $_POST['id']);
    $tmp = [
        'song_name' => $_POST['name'],
        'description' => $_POST['description'],
        'singer' => $_POST['singer'],
        'yt_link' => $_POST['link'],
        'cover'=>$song['cover'],
        'type'=>$_POST['type']
    ];

    
    if(!empty($_POST['cover'])){
        if($_FILES['cover']['error'] == 0){

            move_uploaded_file($_FILES['cover']['tmp_name'], "../upload/" . $song['cover']);
            $tmp['cover']=$song['cover'];
        }
    };
    update('songs', $tmp, $_POST['id']);
    to('../center.php?do=song_list');


