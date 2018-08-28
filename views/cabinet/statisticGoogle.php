<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Результаты последней проверки в Google | findmyinfo</title>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
    <body>
    
        <!--header -->
        <?php include ROOT . '/views/layouts/header.php'; ?>
         <div class="content">
            <div style="text-align:center" class="revealator-zoomin revealator-once">
				<div class="btn-group">
					<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
					</div>
						<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
							<a class="link" title="" href="/cabinet/vkparse"><button type="button" class="btn btn-default">Поиск во <span style="color:#00897b;font-weight:bold;">VK</span></button></a>
						</div>
						<div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/yandexparse"><button type="button" class="btn btn-default">Поиск в <span style="color:#00897b;font-weight:bold;">Yandex</span></button></a>
						</div>
                        <div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/googleparse"><button type="button" class="btn btn-default">Поиск в <span style="color:#00897b;font-weight:bold;">Google</span></button></a>
						</div>	
                        <div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/universalparse"><button type="button" class="btn btn-default"><span style="color:#00897b;font-weight:bold;">Универсальный</span> поиск</button></a>
						</div>
                        <div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/statistic_yandex"><button type="button" class="btn btn-default">Последняя проверка в <span style="color:#00897b;font-weight:bold;">Yandex</span></button></a>
						</div>	
                        <div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/statistic_universal"><button type="button" class="btn btn-default">Последняя проверка <span style="color:#00897b;font-weight:bold;">Универсального</span> поиска</button></a>
						</div>																	
					<div class="clearfix"></div>
					<br> 
				</div><!--btn-group -->
			</div><!--revealator-zoomin -->
        <div align="center" class="col-sm-12">
                <?if(!empty($info_search["Цвет основной границы"][0])){?>
                <div class="revealator-slideup revealator-once">
                    <div id="headerpd" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;padding:5px;">
                        <p style="margin:0px;" colspan="2">Результаты последней проверки в <span style="color:#00897b;font-weight:bold;">Google</span> <span style="color:#FFAB00"><?=$datausers[0]["last_update"]?></span>:</p>
                    </div>
                    <?if($info_search["ФИО"][0] == "Поиск времено не доступен. Обратитесь к Администрации."){?>
                        <img src="/upload/scan/result_null.png" width="300" height="300">
                    <?}else{?> 
                    <?if($info_search["Цвет основной границы"][0] == "#5cf442"){?>
                        <img src="/upload/scan/result_green.png" width="300" height="300">
                    <?}else if($info_search["Цвет основной границы"][0] == "#FFA500"){?>
                        <img src="/upload/scan/result_yellow.png" width="300" height="300">
                        <p style="color:#ef0404;text-align:left"><strong>Возможные угрозы:</strong><p>
                        <?$intvul = 1; foreach($vulnerability as $vul){foreach($vul as $v){if(!empty($v)){?>
                            <p style="text-align:left;font-weight:bold;"><?=$intvul?>. <?=$v?><p>
                        <?$intvul++;}}}?>
                        <br>
                        <div>
                            <p><strong>Вы можете удалить те ресурсы, где расположена <span style="color:#ef0404">НЕ ВАША</span> информация, отметив их галочкой:</strong></p>
                        </div>
                    <?}else{?>
                        <img src="/upload/scan/result_red.png" width="300" height="300">
                        <div>
                            <p><strong>Вы можете удалить те ресурсы, где расположена <span style="color:#ef0404">НЕ ВАША</span> информация, отметив их галочкой:</strong></p>
                        </div>
                    <?}}?>
                </div>
                    <div id="pdncontent" style="display: inline-block;padding:10px;margin:10px;border-radius:10px;border-right:2px solid #0c235a;border-bottom:2px solid #0c235a;border-top:2px solid #0c235a;border-left:10px solid <?=$info_search["Цвет основной границы"][0]?>;">
                <?}else{?>
                <div class="revealator-slideup revealator-once">
                    <div id="headerpd" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;padding:5px;">
                        <p style="margin:0px;" colspan="2">Проверок <span style="color:#00897b;font-weight:bold;">Google</span> еще не было</p>
                    </div>  
                </div>
                <?}?> 
                
                    <form align="center" id="formresult" action="#" method="post" class="formsignin">
                        <input type="text" value="1" hidden
                            name="SAVE_STATISTIC_GOOGLE_FORM">
                    <?$i = 2;
                    $c = 0;
                    $b = 0;
                    if(!empty($info_search["Цвет основной границы"][0])){
                            foreach($info_search as $key => $value){
                                
                            ?>
                                <div style="display: inline-block;" class="revealator-zoomin revealator-delay<?=$i?> revealator-once">
                                    <?if($value[0] == 'Список ресурсов пуст'){?>
                                        <div align="left" style="display: inline-block;float:left;padding:10px;margin:10px;border-radius:10px;border-right:2px solid #0c235a;border-bottom:2px solid #0c235a;border-top:2px solid #0c235a;border-left:5px solid #5cf442;">
                                    <?} else if($value[0] == 'Поиск времено не доступен. Обратитесь к Администрации.'){?>
                                        <div align="left" style="display: inline-block;float:left;padding:10px;margin:10px;border-radius:10px;border-right:2px solid #0c235a;border-bottom:2px solid #0c235a;border-top:2px solid #0c235a;border-left:5px solid grey;">
                                    <?}else{ if($key != "Цвет границы" && $key != "Цвет основной границы"){?>
                                    
                                    <div align="left" id="border" style="display: inline-block;float:left;padding:10px;margin:10px;border-radius:10px;border-right:2px solid #0c235a;border-bottom:2px solid #0c235a;border-top:2px solid #0c235a;border-left:5px solid <?=$info_search["Цвет границы"][$c]?>;">
                                    <?}}?>
                                <div>
                                    <h4 style="text-align:center;" colspan="2"><?if($key != "Цвет границы" && $key != "Цвет основной границы"){if($key === 'Мобильный телефон'){  echo "<strong style='color:#795548'>$key: +7"; echo $datausersup[$key] . "</strong>" . "<br>";}else{echo "<strong style='color:#795548'>$key: " . $datausersup[$key] . "</strong>" . "<br>";}}?></h4>                
                                </div>

                                <?
                                    foreach($value as $val)
                                    {
                                        if($key != "Цвет границы" && $key != "Цвет основной границы"){

                                            if($val == "Список ресурсов пуст"){?>
                                            
                                                <div>
                                                    <p style="border-bottom:1px dotted black;color:#5cf442;font-weight:bold;"><?=$val?>&nbsp; 
                                                        <span style="float:right;"><i style="color:#5cf442" class="fas fa-check-circle"></i></span>
                                                    </p>
                                                </div>
                                                <?} else if($val == "Поиск времено не доступен. Обратитесь к Администрации.") {?>
                                                <div>                                   
                                                    <p style="border-bottom:1px dotted black;font-weight:bold;color:#ef0404"><?=$val?>&nbsp; 
                                                        <span style="float:right;"><i style="color:#ef0404" class="fas fa-exclamation-triangle"></i></span>
                                                        <input id="result" style="display:none !important;" type="checkbox" name="checkbox_<?=$b?>" checked>
                                                    </p>                                         
                                                </div>
                                                <?}else{?>
                                                <div>
                                                    <!--<input id="resultinput" style="width:100% !important;border:none !importnat;border-radius:0px !important;background-color:#FFE4C4" type="text" value="<?=$val?>">-->
                                                    <p style="border-bottom:1px dotted black;font-weight:bold;">
                                                        <a href="<?=$val?>" target="_blank"><?=$val?>&nbsp;</a>   
                                                        <span style="float:right;"><input id="result" type="checkbox" name="checkbox_<?=$b?>"></span>
                                                    </p>
                                                </div> 
                                            
                                    <?}}$b++;}
                                ?>

                                </div><!--zoomin-->
                            </div><!-- pdcontent-->
                            <?
                            $c++;
                            $$i = $i+2;
                            }
                    }
            ?><div align="center" class="col-sm-12">
                <p><button align="center" style="width:100px; !important" name="btnsaveData" class="btnsaveData" type="submit" disabled><i class="fas fa-thumbs-up"></i> Удалить</button></p>
            </div>
        </form>  
        </div><!--col-sm-12-->    
    </div><!-- content-->
    <div class="clearfix"></div>
    <?php include ROOT . '/views/layouts/footer.php'; ?>
    </body><!-- body-->
</html>