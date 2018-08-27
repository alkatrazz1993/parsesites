<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Личный кабинет | findmyinfo</title>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
    <body>
     <div class="content">
        <!--header -->
        <?php include ROOT . '/views/layouts/header.php'; ?>
       
        <div class="revealator-slideup revealator-once">
            <div class="col-sm-12">
                <?
                    AlertMessage::auto_parse();
                    AlertMessage::deletedata();
                    AlertMessage::successEditRecoveryPassword();
                    AlertMessage::successUpdate_successUpdateUser();
                    AlertMessage::messagesend();
                ?>
                                <div class="col-sm-4">
                                    <div class="revealator-slideup revealator-once">					
                                        <p style="font-size:25px;text-align:center;"><strong>Редактировать <span class="far fa-edit" aria-hidden="true"></span></strong></p>						
                                        <div class="panel">
                                            <div id="0" class="title"><i style="color:#795548" class="fas fa-plus"></i> 
                                            Профиль<span class="fas fa-user" aria-hidden="true"></span> 
                                            <span style="float:right"></span></div>
                                            <div class="inner">
                                                <div><a href="/cabinet/edit_name_and_login"><p>Изменить имя и логин</p></a></div>
                                                <div><a href="/cabinet/change_password"><p>Изменить пароль</p></a></div>
                                            </div><!-- inner-->
                                        </div><!-- panel-->
                                    </div><!--revealator-slideup -->
                                </div><!-- col-sm-4-->
                                
                                <div class="col-sm-4">
                                    <div class="revealator-slideup revealator-once">
                                        <p style="font-size:25px;text-align:center;"><strong>Поиск данных <span class="fab fa-searchengin" aria-hidden="true"></span></strong></p>						
                                        <div class="panel">
                                            <div id="0" class="title"><i style="color:#795548" class="fas fa-plus"></i> 
                                            Услуги<span class="fas fa-cart-arrow-down" aria-hidden="true"></span> 
                                            <span style="float:right"></span></div>
                                            <div class="inner">
                                                <div><a href="/cabinet/vkparse"><p>VK</p></a></div>
                                                <div><a href="/cabinet/googleparse"><p>Google</p></a></div>
                                                <div><a href="/cabinet/yandexparse"><p>Yandex</p></a></div>
                                                <div><a href="/cabinet/universalparse"><p>Универсальный поиск</p></a></div>
                                                <div><a href="/cabinet/statistic_google"><p>Последняя проверка Google</p></a></div>
                                                <div><a href="/cabinet/statistic_yandex"><p>Последняя проверка Yandex</p></a></div>
                                                <div><a href="/cabinet/statistic_universal"><p>Последняя проверка Универсального поиска</p></a></div>
                                            </div><!-- inner-->
                                        </div><!-- panel-->
                                    </div><!--revealator-slideup -->
                                </div><!-- col-sm-4-->

                                <div class="col-sm-4">
                                    <div class="revealator-slideup revealator-once">					
                                        <p style="font-size:25px;text-align:center;"><strong>Обратная связь <span class="fas fa-comments" aria-hidden="true"></span></strong></p>						
                                        <div class="panel">
                                            <div id="0" class="title"><i style="color:#795548" class="fas fa-plus"></i> 
                                            Контакты с администрацией<span class="fas fa-user" aria-hidden="true"></span> 
                                            <span style="float:right"></span></div>
                                            <div class="inner">
                                                <div><a href="/cabinet/contactform"><p>Заполнить форму</p></a></div>
                                            </div><!-- inner-->
                                        </div><!-- panel-->
                                    </div><!--revealator-slideup -->
                                </div><!-- col-sm-4-->
            </div>
      </div>
      </div>
   <div class="clearfix"></div>
          <div class="revealator-zoomin revealator-once">
            <?php include ROOT . '/views/layouts/footer.php'; ?>
        </div>
   
    </body><!-- body-->
</html>