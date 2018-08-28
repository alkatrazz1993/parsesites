<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Поиск данных vk.com | findmyinfo</title>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
    <body id="bodyvk">
    
        <!--header -->
        <?php include ROOT . '/views/layouts/header.php'; ?>
         <div class="content">
            <div style="text-align:center" class="revealator-zoomin revealator-once">
				<div class="btn-group">
					<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
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
							<a class="link" title="" href="/cabinet/statistic_google"><button type="button" class="btn btn-default">Последняя проверка в <span style="color:#00897b;font-weight:bold;">Google</span></button></a>
						</div>	
                        <div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/statistic_universal"><button type="button" class="btn btn-default">Последняя проверка <span style="color:#00897b;font-weight:bold;">Универсального</span> поиска</button></a>
						</div>																			
					<div class="clearfix"></div>
					<br> 
				</div><!--btn-group -->
			</div><!--revealator-zoomin -->
            <div class="loading-wrap">
                <div class="triangle1"></div>
                <div class="triangle2"></div>
                <div class="triangle3"><span style="margin-left:20px;">Поиск</span></div>
            </div>
             <div class="clearfix"></div>
            <div class="Box">Загрузка...</div>
            <div id="value"></div>
        <div class="revealator-slideup revealator-once">
        <?if(!empty($final_vk_link[0])){?>
        <?if(count($final_vk_link) == 1){?>
            <div class="col-sm-3">
                <form id="formvk" align="center" action="#" method="post" class="form-signin">
                        <input type="text" value="1" hidden
                        name="SEARCH_FORM">
                    <h1 style="color:#00897b" class="form-signin-heading">VKonakte</h1>
                    <h3 class="form-signin-heading">Поиск данных:</h3>

                    <p>Введите адрес страницы vk.com, ник или id</p>
                    <p><input style="width:303px;background: rgb(169, 169, 169);" name="vkuserid" type="text" value="<?=$final_vk_link[0]?>" placeholder="https://vk.com/example" disabled required></p>
                    <p><input id="pdvk" name="pdvk" title="Даю свое согласие на обработку моих персональных данных" type="checkbox"> <span style="color:grey;font-weight:bold;">Да, это мой профиль</span> </a><br></p>
                    <p><div class="g-recaptcha" data-sitekey="6Ld27lgUAAAAAMWJLAZtkCOYEHiUdhKfU0wmTMXz"></div></p>
                    <p><button id="btnvk" class="searchvkbutton" name="searchbutton" type="submit">Проверить</button></p>
                    </form>
                <br><br>
            </div><!--col-sm-4-->
            <div class="col-sm-2">
            <?if(!empty($link_page_info && $foto_url_info)){?>
                <p style="color:#00897b;"><strong>Главное фото:</strong></p>
                <?echo "<a href='$link_page_info' target='_blank'><img style='border-radius:75%;box-shadow: 0 0 10px rgba(0,0,0,0.9);' src='$foto_url_info'></a>" . "<br>";}?>
            </div><!-- col-sm-2-->
            <div class="clearfix"></div>

                <?if(!empty($finaloutparameters)){?>
                    <div id="headerpdvk" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;margin:10px;padding:5px;">
                        <p style="margin:0px;" colspan="2">Найденные персональные данные по Вашему запросу</p>
                    </div>
                    <div style="text-align:center;font-weight:bold;margin:10px;padding:5px;">
                        <p><i style="color:#ef0404" class="fas fa-exclamation-triangle"></i> - Данные, которые желательно скрыть из публичного доступа, чтобы ими не смогли воспользоваться мошенники</p>
                    </div>
                <?}else{
                    ?>
                    <div id="headerpdvk" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;margin:10px;padding:5px;">
                        <p style="margin:0px;" colspan="2">Здесь Вы увидите не сохраненные результаты проверки в <span style="color:#00897b;font-weight:bold;">VK</span></p>
                    </div>
                    <?   
                }?>
            <div class="clearfix"></div>

            <?
                if(!empty($finaloutparameters))
                {
                    foreach($finaloutparameters as $key => $value_array)
                    {
                        if(!empty($value_array))
                        {
                            if($key != "Фотография")
                            {
                                ?><div align="left" style="display: inline-block;float:left;padding:10px;margin:10px;border-radius:10px;border:2px solid #0c235a;">
                                  
                                        <div>
                                            <h4 style="text-align:center;" colspan="2"><?echo "<strong style='color:#00897b'>" . $key . "</strong>" . "<br>";?></h4>
                                        </div><?
                            }
                            foreach($value_array as $key_next => $value)
                            {	
                                if($key != "Фотография")
                                {   
                                    ?>
                                    <br><div>
                                        <p style="border-bottom:1px dotted black;"><?echo "<strong>" . preg_replace('/[0-9]+/', '', $key_next) . ":</strong>"?>
                                        <?if(
                                            $key_next == "Город"
                                            || $key_next == "Страна" 
                                            || $key_next == "Дата рождения" 
                                            || $key_next == "Мобильный телефон" 
                                            || $key_next == "Дополнительный телефон" 
                                            || $key_next == "О себе"
                                            || $key_next == "Деятельность"
                                            || $key_next == "Внешние сервисы"
                                            || $key_next == "Родственная связь"
                                            || $key_next == "Тип родственной связи"
                                            || $key_next == "Skype"
                                            || $key_next == "Twitter"
                                            || $key_next == "Facebook"
                                            || $key_next == "Livejournal"
                                            || $key_next == "Instagram"
                                            || $key_next == "Личный сайт"
                                            || $key_next == "Домен"
                                            || $key_next == "Родной город"
                                            || $key_next == "Отчество"
                                            )
                                        {
                                            if($value == "скрыто или не указано" || $value == "скрыта или не указана" || $value == "скрыт или не указан" || $value == "скрыты или не указаны")
                                            {
                                                ?><span style="float:right;"><i style="color:#5cf442;" title="Замечаний нет" class="fas fa-check-circle"></i></span><?
                                            }else{
                                                ?><span style="float:right;"><i style="color:#ef0404" title="Есть замечания" class="fas fa-exclamation-triangle"></i></span><?
                                            }
                                            ?>
                                        
                                        <?}else{?>
                                        <span style="float:right;"><i style="color:#5cf442;" title="Замечаний нет" class="fas fa-check-circle"></i></span>
                                        <?}?>
                                        <br><span style="font-weight:normal;font-style:italic;float:left;"> <?echo $value?></span></p>
                                    </div><?                      
                                }		
                            }
                        }
                        ?></div><!--col-sm-3--><?			
                    }
        }}else{
            ?>
                <div align="center" class="col-sm-12">
                    <div id="headerpdvk" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;margin:10px;padding:5px;">
                        <p style="margin:0px;" colspan="2">В разделе последней проверки, выберите именно вашу ссылку для поиска в <span style="color:#00897b;font-weight:bold;">VK</span></p>
                    </div>
                </div>
            <?
        }}else{
            ?>
                <div align="center" class="col-sm-12">
                    <div id="headerpdvk" style="border-radius:10px;border:2px solid #0c235a;text-align:center;font-weight:bold;margin:10px;padding:5px;">
                        <p style="margin:0px;" colspan="2">Вы сможете воспользоватся поиском в <span style="color:#00897b;font-weight:bold;">VK</span>, как только будет найдена Ваша ссылка на профиль.</p>
                    </div>
                </div>
            <?
        }
                ?>
   
        
        
      </div>
      </div>
       <div class="clearfix"></div>

      <?php include ROOT . '/views/layouts/footer.php'; ?>
    </body><!-- body-->
</html>