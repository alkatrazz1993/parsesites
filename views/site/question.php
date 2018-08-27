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
                            <?foreach($questionByIdUser as $user):
                            endforeach;?>   
                        <form action="#" method="post" class="form-signin">
                            <input type="hidden" value="1" hidden name="QUESTION_FORM" align="center">							
                            <h3>Восстановление доступа для <span style="color:#d3b53b;"><?=$user['login']?> </span></h3>
                            <p style="font-size:12px;text-align:center;">Введите ответ на контрольный вопрос, который вы указали при регистрации.</p>
                            <p style="text-align:center;">Вопрос: <strong><?=$user['question']?> </strong></p>
                            <p><input id="inputAnswer" name="answer" type="text" placeholder="Ваш ответ" maxlength="100" required autofocus></input></p>
                            <p><a href="/passwdrecovery"><i class="fas fa-share"></i> Вернуться</a></p>
                            <?
                               AlertMessage::errorAnswer_answerNoneExists();
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