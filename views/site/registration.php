<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> <!-- Выбор кодировки -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- for internet Explorer -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- отображение для мобильных устройсв(масштабирование) -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Регистрация</title>
        <?php include ROOT . '/views/layouts/links.php'; ?>
         <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
<body>
						 <!--header -->
                    <?php include ROOT . '/views/layouts/header.php'; ?>
                <div class="content">
                <div align="center" class="revealator-zoomin revealator-once">
                    <div id="registration">	 
                        <form class="form-signin" id="registrationForm" action="#" method="post" align="center">
                        <input type="text" value="1" hidden name="REGISTRATION_FORM">
                        <h3 class="form-signin-heading">Регистрация</h3>
                            <p>Имя:<span style="color:red;">*</span> <span id="count_username">0</span>/15</p>
                            <p><input id="inputUsername" name="username" type="text" placeholder="Имя" maxlength="15" required autofocus></input></p>
                            
                            <p>Логин:<span style="color:red;">*</span> <span id="count_login">0</span>/50</p>
                            <p><input id="inputLogin" name="login" type="email" placeholder="example@mail.ru" maxlength="50" required></input></p>											
                            
                            <p>Пароль:<span style="color:red;">*</span> <a href="#" class="showPassword"><img src="/upload/images/cabinet/lock.png" width="18px" height="18px" title="Показать пароль" alt="Показать пароль"></img></a> <span id="count"> 0</span>/15</p>
                            <p><input id="reg_password" name="password" type="password" placeholder="Пароль" maxlength="15" required> </input></p>
                            
                            <p>Повторите пароль:<span style="color:red;">*</span> <a onclick="copyText()" href="#"><img src="/upload/images/cabinet/copy_new.png" width="18px" height="18px" title="Подтвердить пароль" alt="Подтвердить пароль"></img></a> <span id="count_confirmation"> 0</span>/15</p>
                            <p><input id="reg_password_confirmation" name="password_confirmation" type="password" placeholder="Повторите пароль" maxlength="15" required></input></p>
                            
                            <p>Контрольный вопрос:<span style="color:red;">*</span></p>
                            <p><select name="question">
                                <option value="Ваша любимая работа?" selected="selected">Ваша любимая работа?</option>
                                <option value="Фамилия Вашего любимого актёра?" selected="selected">Фамилия Вашего любимого актёра?</option>
                                <option value="Кличка Вашего домашнего питомца?" selected="selected">Кличка Вашего домашнего питомца?</option>
                                <option value="Название школы, в которой Вы учились?" selected="selected">Название школы, в которой Вы учились?</option>
                                <option value="Фамилия Вашего первого учителя?" selected="selected">Фамилия Вашего первого учителя?</option>
                            </select></p>
                            
                            <p>Ответ:<span style="color:red;">*</span></p>
                            <p><input id="inputAnswer" name="answer" type="text" placeholder="Ваш ответ" maxlength="100" required></input></p>

                            <a href="/authorization" style="font-size:14px;" class="showPassword">Вход</a> |              
                            <a href="#" style="font-size:14px;" onclick="str_rand()" class="generatePassword">Сгенерировать пароль</a>
                            <?
								AlertMessage::errorCaptcha_dont_push_captcha();
                                AlertMessage::errorEdit_loginExists();
                                AlertMessage::errorEdit_short_password_or_login();
                                AlertMessage::errorEdit_short_answer();
                                AlertMessage::errorEdit_passwords_not_match();
                            ?>
                            <div id="resultpass"></div>                            
                            <p style="font-size:10" id="bg_res"> </p>
							<p><div class="g-recaptcha" data-sitekey="6Ld27lgUAAAAAMWJLAZtkCOYEHiUdhKfU0wmTMXz"></div></p>
                            <p><input id="pd" name="pd" title="Даю свое согласие на обработку моих персональных данных" style="width:10px;" type="checkbox"> <span style="color:grey;font-weight:bold;">&nbsp;Даю свое</span> <a target="_blank" href="/upload/Soglasie_na_obrabotku_pdn.pdf"><span style="font-weight:bold;">согласие на обработку моих персональных данных</span> </a><br></p>
                             <p><button name="authbutton" class="authbutton" id="application" type="submit" disabled><i style="font-size:20px;" class="fa fa-thumbs-up" id="icon" aria-hidden="true"></i></button></p>
                            <br><p align="left"><img src="/upload/images/cabinet/lock.png" width="18px" height="18px" title="Подтвердить пароль" alt="Подтвердить пароль"></img> - показать пароль.</p>
                            <p align="left"><img src="/upload/images/cabinet/copy_new.png" width="18px" height="18px" title="Подтвердить пароль" alt="Подтвердить пароль"></img> - повторить пароль.</p>
                        </form>  
                    </div><!--registration -->
            </div><!--revealator -->
    <div class="clearfix"></div>
    </div>
     <div class="clearfix"></div>
<?php include ROOT . '/views/layouts/scripts.php'; ?>
 <?php include ROOT . '/views/layouts/footer.php'; ?>
</body>
</html>


