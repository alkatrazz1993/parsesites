<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Поиск данных в google | findmyinfo</title>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
    <body id="body">
    
        <!--header -->
        <?php include ROOT . '/views/layouts/header.php'; ?>
        <div class="content">
            <div class="revealator-slideup revealator-once">
                <?
                    AlertMessage::errorform_null();
                    AlertMessage::errorCaptcha_dont_push_captcha();
                    AlertMessage::limit_null();
                    AlertMessage::limit_up();
                ?>
            </div>
            <div style="text-align:center" class="revealator-zoomin revealator-once">
				<div id="btngroup" class="btn-group">
					<div align="center" class="revealator-zoomin revealator-delay0 revealator-once">
					</div>
						<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
							<a class="link" title="" href="/cabinet/vkparse"><button type="button" class="btn btn-default">Поиск во <span style="color:#00897b;font-weight:bold;">VK</span></button></a>
							<a class="link" title="" href="/cabinet/yandexparse"><button type="button" class="btn btn-default">Поиск в <span style="color:#00897b;font-weight:bold;">Yandex</span></button></a>
							<a class="link" title="" href="/cabinet/googleparse"><button type="button" class="btn btn-default">Поиск в <span style="color:#00897b;font-weight:bold;">Google</span></button></a>
							<a class="link" title="" href="/cabinet/universalparse"><button type="button" class="btn btn-default"><span style="color:#00897b;font-weight:bold;">Универсальный</span> поиск</button></a>
							<a class="link" title="" href="/cabinet/statistic_google"><button type="button" class="btn btn-default">Последняя проверка в <span style="color:#00897b;font-weight:bold;">Google</span></button></a>                   
							<a class="link" title="" href="/cabinet/statistic_yandex"><button type="button" class="btn btn-default">Последняя проверка в <span style="color:#00897b;font-weight:bold;">Yandex</span></button></a>
							<a class="link" title="" href="/cabinet/statistic_universal"><button type="button" class="btn btn-default">Последняя проверка <span style="color:#00897b;font-weight:bold;">Универсального</span> поиска</button></a>
						</div>																				
					<div class="clearfix"></div>
					<br> 
				</div><!--btn-group -->
			</div><!--revealator-zoomin -->
            <div id="progressdiv" class="progress">
                <div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="loading-wrap">
                <div class="triangle1"></div>
                <div class="triangle2"></div>
                <div class="triangle3"><span style="margin-left:20px;">Поиск</span></div>
            </div>
             <div class="clearfix"></div>
            <div class="Box">Загрузка...</div>
            <div id="value"></div>
   
            <div class="revealator-slideup revealator-once">
                <h1 align="center" class="form-signin-heading"><span style="color:#00897b;font-weight:bold;">Автоматический</span> поиск данных</h1>
                <div align="center" class="col-sm-12">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div id="divleft" style="display: inline-block;padding:5px;border-radius:10px;border:2px solid #0c235a;">
                            <form id="formgoogle" action="#" method="post" class="form-signin">
                                <input type="text" value="1" hidden
                                name="AUTO_SEARCH_FORM">
                                <h3 class="form-signin-heading"><strong>Поиск:</strong></h3>
                                <div id="checkall" style="color:#ff0000;"></div>
                                <label>ФИО <i id="uncheck" style="color:#ef0404;display:none;" class="fas fa-exclamation-triangle"></i><i id="check" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="fio" style="width:303px;" name="fio" type="text" <?if(!empty($data_users[0]['fio'])){?>value="<?=$data_users[0]['fio'];}?>" placeholder="" autofocus disabled></p>
                                <label>Мобильный телефон <i id="check_phone" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="phone" style="width:303px;" name="phone" type="text" <?if(!empty($data_users[0]['phone'])){?>value="<?=$data_users[0]['phone'];}?>" placeholder="" disabled></p>
                                <label>ИНН физического лица <i id="check_inn" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="inn" style="width:303px;" name="inn" type="text" <?if(!empty($data_users[0]['inn'])){?>value="<?=$data_users[0]['inn'];}?>" placeholder="" disabled></p>
                                <label>СНИЛС <i id="check_snils" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="snils" style="width:303px;" name="snils" type="text" <?if(!empty($data_users[0]['snils'])){?>value="<?=$data_users[0]['snils'];}?>" placeholder="" disabled></p>
                                <label>Паспорт (серия и номер) <i id="check_pasport" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="pasport" style="width:303px;" name="pasport" type="text" <?if(!empty($data_users[0]['pasport'])){?>value="<?=$data_users[0]['pasport'];}?>" placeholder="" disabled></p>
                                <label>Номер банковской карты <i id="check_card_number" style="color:#5cf442;display:none;" class="fas fa-check-circle"></i></label>
                                <p><input id="card_number" style="width:303px;" name="card_number" type="text" <?if(!empty($data_users[0]['card_number'])){?>value="<?=$data_users[0]['card_number'];}?>" placeholder="" disabled></p>
                                <p><div id="captcha" class="g-recaptcha" data-sitekey="6Ld27lgUAAAAAMWJLAZtkCOYEHiUdhKfU0wmTMXz"></div></p>

                                <p><input id="inputpdgoogle" name="inputpdgoogle" title="Подтверждаю, что ознакомлен с пользовательским соглашением" type="checkbox"> <span style="color:grey;font-weight:bold;">Подтверждаю, что ознакомлен с </span> <a target="_blank" href="/upload/Polizovateliskoe_soglashenie.pdf"><span style="font-weight:bold;">пользовательским соглашением</span> </a><br></p>
                                <p><input id="pdgoogle" name="pdgoogle" title="Даю свое согласие на обработку моих персональных данных" type="checkbox"> <span style="color:grey;font-weight:bold;">Даю свое</span> <a target="_blank" href="/upload/google/Soglasie_na_obrabotku_pdn.pdf"><span style="font-weight:bold;">согласие на обработку моих персональных данных</span> </a><br></p>
                                <p><button id="btngoogle" name="searchbutton" class="searchbutton" type="submit" disabled><i class="fas fa-thumbs-up"></i> Запустить</button></p>
                            </form>
                        </div><!--left -->
                    </div><!-- col-sm-4-->
                    <div class="col-sm-4"></div>
                </div><!--col-sm-12-->
            </div><!--revealator -->
         <div class="clearfix"></div>
        </div><!-- content-->
         <div class="clearfix"></div>
        <?php include ROOT . '/views/layouts/footer.php'; ?>      
    </body><!-- body-->
</html>