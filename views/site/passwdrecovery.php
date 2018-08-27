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
                            <input type="hidden" value="1" hidden name="PASSWDRECOVERY_FORM" align="center">							
                            <h3>Восстановление доступа</h3>
                            <p style="text-align:center;">Ваш логин:<span class="stars">*</span></p>
                            <p><input name="login" type="email" id="inputEmail" placeholder="Login" maxlength="50" required autofocus></p>
                            <p><a href="/auth_panel"><i class="fas fa-share"></i> Вернуться к авторизации</a></p>
                            <?
                                AlertMessage::errorRecovery_loginNoneExists();
                            ?>
                            <button type="submit" name="passwdrecovery"  value="" class="btn btn-default"><i class="fas fa-share"></i> Далее</button>
                        </form>
                    </div><!-- form-div-->
                    <div class="clearfix"></div>
                </div><!--revealator-zoomin-->		     	  
            </div> <!-- row-->
        </div><!--container -->
        </div>
</body>
</html>