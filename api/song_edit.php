<?php
include_once "../db/base.php";
if(isset($_GET['success']) && $_GET['success']=='1'){
    alert('刪除成功!');
}

$_POST['description'] = str_replace("'", "\'", $_POST['description']);
$_POST['name'] = str_replace("'", "\'", $_POST['name']);
echo $_POST['name'];

    $song = $Song->find($_POST['id']);
    $tmp = [
        'song_name' => $_POST['name'],
        'description' => $_POST['description'],
        'singer' => $_POST['singer'],
        'yt_link' => $_POST['link'],
        'cover'=>$song['cover'],
        'type'=>$_POST['type']
    ];

    
    if($song['cover']!=$_POST['cover']){
        if($_FILES['cover']['error'] == 0){

            move_uploaded_file($_FILES['cover']['tmp_name'], "../upload/" . $song['cover']);
            $tmp['cover']=$song['cover'];
        }
    };
    $Song->save($tmp);
    to('../center.php?do=song_list');


