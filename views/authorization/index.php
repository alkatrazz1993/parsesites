<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Авторизация | findmyinfo</title>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head><!--/head-->
    <body>
    
        <!--header -->
        <?php include ROOT . '/views/layouts/header.php'; ?>
        <div class="revealator-zoomin revealator-once">
            <?AlertMessage::successRegistration();?>
        </div>
        <div class="content">
        <div align="center" class="revealator-zoomin revealator-once">
        	 <div id="authorization">
                <form id="authorizationForm" align="center" action="#" method="post" class="form-signin">
                                <input type="text" value="1" hidden
                                name="AUTH_FORM">
                                
                            <h3 class="form-signin-heading">Авторизация</h3>

                            <label for="inputEmail" class="sr-only">Введите логин</label>
                            <p><input name="login" type="text" id="inputEmail" placeholder="Логин" required autofocus></p>
                            <label for="inputPassword" class="sr-only">Пароль</label>
                            <p><input name="password" type="password" id="inputPassword" placeholder="Пароль" required></p>
                            <p><div class="g-recaptcha" data-sitekey="6Ld27lgUAAAAAMWJLAZtkCOYEHiUdhKfU0wmTMXz"></div></p>
                                <?
                                        AlertMessage::errorCaptcha_dont_push_captcha();
                                        AlertMessage::errorRegistration_incorrect_login_or_password();
                                ?>
                            <p><a href="/registration" style="font-size:14px;" class="showPassword">Регистрация</a></p>
                            <p><button class="buttonAuth" name="authbutton" id="button" type="submit"><i style="font-size:20px;" class="fas fa-sign-in-alt"></i></button></p>
                </form>
            </div><!--authorization-->
      </div><!--revealator -->
      </div>
       <?php include ROOT . '/views/layouts/footer.php'; ?>
    </body><!-- body-->
</html>