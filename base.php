<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$tstr=[
    'tb1'=>"About管理",
    'tb2'=>"Experience管理",
    'tb3'=>"Ability管理",
    'tb4'=>"Portfolio管理",
    'tb5'=>"Contact管理",
    'tb6'=>"xxx管理",
    'title'=>"網站標題管理",
    'ad'=>"動態文字管理",
    'mvim'=>"動畫圖片管理",
    'image'=>"校園映像圖片管理",
    'total'=>"進站人數管理",
    'bottom'=>"頁尾版權文字管理",
    'news'=>"最新管理",
    'admin'=>"管理者管理",
    'menu'=>"選單管理",

];
$addstr=[
    'tb1'=>"新增About",
    'tb2'=>"新增Experience",
    'tb3'=>"新增Ability",
    'tb4'=>"新增Portfolio",
    'tb5'=>"新增Contact",
    'tb6'=>"新增xxx",
    'title'=>"新增網站標題",
    'ad'=>"新增動態文字",
    'mvim'=>"新增動畫圖片",
    'image'=>"新增校園映像圖片",
    'total'=>"新增進站人數",
    'bottom'=>"新增頁尾版權文字",
    'news'=>"新增最新消息",
    'admin'=>"新增管理者",
    'menu'=>"新增選單",

];

$uploadimg=[
    'image'=>['更新校園映像圖片','校園映像圖片'],
    'mvim'=>['更換動畫圖片','動畫圖片'],
    'title'=>['更新網站標題圖片','網站標題圖片'],

];


class DB{

    protected $table;
    protected $dsn="mysql:host=localhost;dbname=rsm;charset=utf8";
    protected $pdo;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');

    }

    function all(...$arg){
        $sql="select * from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll();

    }
    function count(...$arg){
        $sql="select count(*) from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id){
        $sql="select * from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }


        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql="delete from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }


        return $this->pdo->exec($sql);
    }
    function save($arr){
        if(isset($arr['id'])){
            //update
            foreach($arr as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$arr['id']}'";
        }else{
            //insert

            $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }


}

function to($url){
    header("location:".$url);
}

// function paginate{

// }

//base打完先到db建一張資料表title>text,id,img,sh，並令$Title=new DB("title")...
//測完記得關掉全部指令!!

$Title=new DB("title");
/* $data=['text'=>"第一筆資料",
        'img'=>'t001.jpg',
        'sh'=>1
]; */

//$Title->save($data);
/* $row=$Title->find(1);
print_r($row);
$row['text']="修改資料測試";
$Title->save($row);
$row=$Title->find(1);
print_r($row);
$Title->del(1); */

$Ad=new DB("ad");
$Mvim=new DB("mvim");
$Image=new DB("image");
$Total=new DB("total");
$Bottom=new DB("bottom");
$News=new DB("news");
$Admin=new DB("admin");
$Menu=new DB("menu");

$tb1=new DB("tb1");
$tb2=new DB("tb2");
$tb3=new DB("tb3");
$tb4=new DB("tb4");
$tb5=new DB("tb5");
$tb6=new DB("tb6");

//進站總人數，寫在變數宣告之後
if(empty($_SESSION['total'])){
    $total=$Total->find(1);
    // $total['total']=$total['total']+1;同下
    $total['total']++;
    $Total->save($total);
    $_SESSION['total']=$total['total'];

    
}

?> 