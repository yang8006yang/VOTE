<link rel="icon" type="image" href="./img/cd.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<?php
// $dsn = "mysql:host=localhost;charset=utf8;dbname=music_spot";
// $pdo = new PDO($dsn, 'root', '');
// $dsn="mysql:host=localhost;charset=utf8;dbname=s1110416";
// $pdo=new PDO($dsn,'s1110416','s1110416');

date_default_timezone_set("Asia/Taipei");

session_start();

class DB{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=music_spot";
    // protected $dsn="mysql:host=localhost;charset=utf8;dbname=s1110416";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
        // $this->pdo = new PDO($dsn,'s1110416','s1110416');
    }

    private function arrayToSqlArray($array){
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    
    public function find($id){
        $sql="select * from $this->table ";
        if(is_array($id)){
            $tmp = $this->arrayToSqlArray($id);
            $sql = $sql . " where" . join(" && ",$tmp);
        }else{
            $sql = $sql . " where `id` ='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$arg){
        $sql="select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrayToSqlArray($arg[0]);
                $sql = $sql . " where" . join(" && ",$tmp);
            }else{
                $sql = $sql . $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    public function save($array){
        if(isset($array['id'])){
            $id=$array['id'];
            unset($array['id']);
            $tmp=$this->arrayToSqlArray($array);
            $sql="update $this->table set ". join(',',$tmp) . " WHERE `id`=$id";
        }else{
            $cols=array_keys($array);
            $sql="insert into $this->table (`". join(',',$cols) ."`) values('". join($array) . "')";
        }
        $this->pdo->exec($sql);
    }

    public function del($id){
        $sql = "delete from $this->table WHERE ";
        if(is_array($id)){
            $tmp = $this->arrayToSqlArray($id);
            $sql = $sql . join(" && ",$tmp);
        }else{
            $sql = $sql . "`id`='$id'";
        }
        return $this->pdo->exec($sql);
    }

    private function math($math,...$arg){
        switch ($math) {
            case 'count':
                $sql = "select count(*) from $this->table ";
                if(isset($arg[0])){
                    $con=$arg[0];
                }
                break;
                
                default:
                $col =$arg[0];
                if(isset($arg[1])){
                    $con=$arg[1];
                }
                $sql = "select $math($col) from $this->table ";
                break;
        }
        if(isset($con)){
            if(is_array($con)){
                $tmp=$this->arrayToSqlArray($con);
                $sql= $sql ." WHERE " .join('&&',$tmp);
            }else{
                $sql= $sql . $con;
            }
            return $this->pdo->query($sql)->fetchColumn();
        }
    }

    public function count(...$arg){
        return $this->math('count',...$arg);
    }
    public function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }
    public function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }
    public function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }
    public function avg($col,...$arg){
        return $this->math('avg',$col,...$arg);
    }


}

function to($url){
    header('location:'.$url);
 }

 function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

//萬用sql函式

function q($sql){
$dsn = "mysql:host=localhost;charset=utf8;dbname=music_spot";
$pdo = new PDO($dsn, 'root', '');

return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

$Subject=new DB('survey_subjects');
$Option=new DB('survey_options');
$Song= new DB('songs');
$Playlist= new DB('playlists');
$Playlist_song= new DB('playlist_songs');
$User=new DB('users');
$Log=new DB('survey_log');