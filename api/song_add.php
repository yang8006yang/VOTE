<?php
include_once "../db/base.php";
if(!empty($_FILES['cover'])){
    if ($_FILES['cover']['error'] == 0) {
        
        $file_str_array = explode(".", $_FILES['cover']['name']);
        $sub = array_pop($file_str_array);
        $file_name = date("Ymdhis") . "." . $sub;
        move_uploaded_file($_FILES['cover']['tmp_name'], "../upload/". $file_name);
        
        $song=['song_name'=>$_POST['name'],
        'description'=>$_POST['description'],
        'singer'=>$_POST['singer'],
        'yt_link'=>$_POST['link'],
        'cover'=>$file_name,
        'type'=>$_POST['type']
    ];
    insert('songs',$song);
    to('../center.php?do=song_list');
}else{
    to('../center.php?do=song_add&error=1');
}
}else{
    $song=['song_name'=>$_POST['name'],
        'description'=>$_POST['description'],
        'singer'=>$_POST['singer'],
        'yt_link'=>$_POST['link'],
        'cover'=>'default.jpg',
        'type'=>$_POST['type']
    ];
    insert('songs',$song);
    to('../center.php?do=song_list');
}