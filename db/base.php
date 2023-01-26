<link rel="icon" type="image" href="./img/cd.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<?php
// $dsn = "mysql:host=localhost;charset=utf8;dbname=music_spot";
// $pdo = new PDO($dsn, 'root', '');
$dsn="mysql:host=localhost;charset=utf8;dbname=s1110416";
$pdo=new PDO($dsn,'s1110416','s1110416');

date_default_timezone_set("Asia/Taipei");

session_start();

date_default_timezone_set("Asia/Taipei");
session_start();

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
// 取得/搜尋資料
function all($table, ...$args)
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    if (isset($args[0])) {
        if(is_array($args[0])){
        foreach ($args[0] as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . "WHERE" . join("&&", $tmp);
    } else {
        $sql = $sql . $args[0];
    }}
    if (isset($args[1])) {
        $sql = $sql . $args[1];
    }
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 回傳指定ID資料
function find($table, $id)
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . "WHERE" . join("&&", $tmp);
    } else {
        $sql = $sql . "WHERE `id`=$id";
    }
    // echo $sql;
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

// 更新
function update($table, $col, ...$args)
{
    global $pdo;
    $sql = "UPDATE `$table` SET ";

    if (is_array($col)) {
        foreach ($col as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql . join(",", $tmp);
    } else {
        echo "錯誤,請提供以陣列型式的更新資料";
    }

    if (isset($args[0])) {
        if (is_array($args[0])) {
            $tmp = [];
            foreach ($args[0] as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " where " . join(" && ", $tmp);
            
        } else {

            $sql = $sql . " where `id`='{$args[0]}'";
        }
        // echo $sql;
        return $pdo->exec($sql);
    }
}

// 新增
function insert($table,$cols){
    global $pdo;

    $keys=array_keys($cols);
    $sql="insert into $table (`" . join("`,`",$keys) . "`) values('" . join("','",$cols) . "')";
    return $pdo->exec($sql);
    echo $sql;
}


// 刪除
function del($table,$id){
    global $pdo;
    $sql="delete from `$table` ";

    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }

    // echo $sql;
    return $pdo->exec($sql);
}

//萬用sql函式
function q($sql){
    global $pdo;
    //echo $sql;
    return $pdo->query($sql)->fetchAll();
}


// header
function to($location){
    header("location:$location");
}
// 提示
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}