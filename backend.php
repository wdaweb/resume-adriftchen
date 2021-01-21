<!-- 記得include_once base -->
<?php include_once "base.php"

// if(empty($_SESSION['login'])){
//     echo "非法入侵";
//     exit();
// }


;?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>
<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    
    <div id="main">
        <a title="<?=$Title->find(['sh'=>1])['text'];?>" href="index_back.php">
            <div class="ti" style="background:url(&#39;img/<?=$Title->find(['sh'=>1])['img'];?>&#39;); background-size:cover;"></div> <!-- 有顯示的那張圖'sh'=1 -->
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">後台管理選單</span>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb1">
                        <div class="mainmu">
                            About管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb2">
                        <div class="mainmu">
                            Experience管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb3">
                        <div class="mainmu">
                            Ability 管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb4">
                        <div class="mainmu">
                            Portfolio 管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb5">
                        <div class="mainmu">
                            Contact管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        href="?do=tb6">
                        <div class="mainmu">
                            xxx管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin">
                        <div class="mainmu">
                            管理者帳號管理 </div>
                    </a>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :<?=$Total->find(1)['total'];?> </span>
                </div>
            </div>
            <div class="di"
                style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
                <!--正中央-->
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;"
                                class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a>
                            </td>
                            <td><button onclick="lo(&#39;index.php&#39;)"
                                    style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
                        </tr>
                    </tbody>
                </table>
<!-- 此段剪下，建立至 backend/title.php，並增加php使這個區域可以替換檔案-->
                <?php

                $do=(isset($_GET['do']))?$_GET['do']:'tb1'; /* 這裡的do來自於網址get到的欄位名稱 */
                $file="./backend/".$do.".php";
                if(file_exists($file)){
                    include $file;
                }else{
                    include "./backend/tb1.php";
                }

                ?>

            </div>
            <div id="alt"
                style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
            </div>
            <script>
            $(".sswww").hover(
                function() {
                    $("#alt").html("" + $(this).children(".all").html() + "").css({
                        "top": $(this).offset().top - 50
                    })
                    $("#alt").show()
                }
            )
            $(".sswww").mouseout(
                function() {
                    $("#alt").hide()
                }
            )
            </script>
        </div>
        <div style="clear:both;"></div>
        <div
            style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
        </div>
    </div>
</body>
</html> 