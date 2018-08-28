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
				<p style="font-size:25px;text-align:center;"><strong>Обращение <span class="far fa-edit" aria-hidden="true"></span></strong></p>
				</div><!--revealator-zoomin-->				
					<div class="col-sm-12"><!--col-sm-12 -->
						<div class="revealator-slideup revealator-delay2 revealator-once"> 
								<form align="center" action="#" method="post" class="">
									<input type="hidden" value="1" hidden name="MESSAGE_FORM" align="center">							
									<h3>Заполните форму</h3>
                                    <label>Представьтесь, пожалуйста </label>
									<p><input name="name" type="text" placeholder="Имя" value="" maxlength="15" required></p>
                                    <label>Куда отправить ответ? </label>
                                    <p><input name="email" type="email" placeholder="email" value="" maxlength="45" required></p>
									<p><textarea style="height:300px;" name="message" type="text" id="message" value="" placeholder="" maxlength="1500" required></textarea></p>
									
									<button style="width:300px !important;" type="submit" name="passwdrecovery"  value="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Отправить</button>
								</form><br>
						</div>
					</div><!--col-sm-12 -->
					<div class="clearfix"></div>
                    </div>
      <?php include ROOT . '/views/layouts/footer.php'; ?>
    </body><!-- body-->
</html>