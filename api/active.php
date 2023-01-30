<?php
include_once "../db/base.php";

$id=$_GET['id'];
switch ($_GET['table']) {
    case 'survey':
        $table='Subject';
        $do='survey';
        break;
    case 'song':
        $table='Song';
        $do='song_list';
        break;
    
    default:
        # code...
        break;
}
$tmp=$$table->find($id);
switch ($_GET['table']) {
    case 'survey':
        $tmp['content'] = str_replace("'", "\'", $tmp['content']);
        $tmp['subject'] = str_replace("'", "\'", $tmp['subject']);
        break;
    case 'song':
        $tmp['description'] = str_replace("'", "\'", $tmp['description']);
        $tmp['song_name'] = str_replace("'", "\'", $tmp['song_name']);
        
        break;
    
    default:
        # code...
        break;
}
// echo $tmp['song_name'];
$tmp['active']=($tmp['active']+1)%2;
$$table->save($tmp);
to("../center.php?do=$do");