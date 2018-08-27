<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> <!-- Выбор кодировки -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- for internet Explorer -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- отображение для мобильных устройсв(масштабирование) -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Восстановление доступа</title>
        <?php include ROOT . '/views/layouts/links.php'; ?>
		<?php include ROOT . '/views/layouts/scripts.php'; ?>
    </head><!--/head-->
<body style="background:#f1f1f1;">
     <div class="content">
        <div class="container">
            <div class="row">
                <div class="revealator-slideup revealator-once">
                    <div class="form-div">   
                        <form action="#" method="post" class="form-signin">
                            <input type="hidden" value="1" hidden name="CHANGEPASSWORD_FORM" align="center">							
                            <h3>Изменение пароля для <span style="color:#d3b53b;"><?=$userById['login']?> </span></h3>

					<p><input style="display:none;" name="username" type="text" placeholder="Имя" value="<?=$userById['username'] ?>" maxlength="15" required></input></p>
					<p><input style="display:none;" name="login" type="email" id="inputEmail" value="<?=$userById['login'] ?>" placeholder="example@mail.ru" maxlength="50"></p>

					
					<p style="font-size:12px;text-align:center">Новый пароль:<span class="stars">*</span> <a href="#" class="showPassword"><img src="/upload/images/cabinet/lock.png" width="18px" height="18px" title="Показать пароль" alt="Показать пароль"></img></a> <span id="count">0</span>/15</p>
					<p><input id="reg_password" name="password" type="password" placeholder="Пароль" maxlength="15" required autofocus> </input></p>
					<p style="font-size:12px;text-align:center">Повторите пароль:<span class="stars">*</span> <a onclick="copyText()" href="#"><img src="/upload/images/cabinet/copy_new.png" width="18px" height="18px" title="Подтвердить пароль" alt="Подтвердить пароль"></img></a> <span id="count_confirmation">0</span>/15</p>
					<p><input id="reg_password_confirmation" name="hash_confirmation" type="password" placeholder="Подтверждение пароля" maxlength="15" required></input></p> 

					<p><a href="/passwdrecovery"><i class="fas fa-share"></i> Вернуться</a></p>
                            <?
                               	AlertMessage::errorEdit_short_password();
								AlertMessage::errorEdit_same_password();
								AlertMessage::errorEdit_passwords_not_match();
                            ?>
                            <button type="submit" name="passwdrecovery"  value="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Сменить пароль</button>
                        </form>
                    </div><!-- form-div-->
                    <div class="clearfix"></div>
                </div><!--revealator-zoomin-->		     	  
            </div> <!-- row-->
        </div><!--container -->
        </div>
		<script src="/template/js/passfield.js" type="text/javascript"></script>
</body>
</html>