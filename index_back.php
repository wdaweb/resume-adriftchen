<!-- 記得 include_once base.php -->
<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>My Resume - Admin</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>

	<div id="main">
    	<a title="<?=$Title->find(['sh'=>1])['text'];?>" href="index_back.php"><div class="ti" style="background:url(&#39;img/<?=$Title->find(['sh'=>1])['img'];?>&#39;); background-size:cover;"></div><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
						<?php
							$mainmu=$Menu->all(['sh'=>1,'parent'=>0]);
							foreach($mainmu as $main){
						?>

							<div class="mainmu">
								<a style="color:#000; font-size:13px; text-decoration:none;" href="<?=$main['href'];?>"><?=$main['text'];?></a>
								<div class="mw" style="display:none;position:relative;top:-5px;z-index:98;width:150px;margin-left:100px"> <!-- 主要寫到display:none即可，調整選單版面-->
								<?php 

									if($Menu->count(['parent'=>$main['id']])>0){
										$subs=$Menu->all(['parent'=>$main['id']]);
										foreach($subs as $sub){

									?>
									<a style="color:#000; font-size:13px; text-decoration:none;" href="<?=$sub['href'];?>">
										<div class="mainmu2"><?=$sub['text'];?></div>
									</a>
									<?php
										}
									}
									?>
								</div>
						</div>
						<?php } ;?>
                    </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 : <?=$Total->find(1)['total'];?></span>
                    </div>
        		</div>
				<?php

					$do=(isset($_GET['do']))?$_GET['do']:'main';
					$file="./front/".$do.".php";
					if(file_exists($file)){
						include $file;
					}else{
						include "./front/main.php";
					}


				;?>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->
									<?php
									if(isset($_SESSION['login'])){
									?>
									<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;index.php&#39;)">返回首頁</button>

									<?php
									}else{
									?>
									<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">管理登入</button>

									<?php
									}
									?>

                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
                	<span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
                </div>
    </div>

</body></html> 