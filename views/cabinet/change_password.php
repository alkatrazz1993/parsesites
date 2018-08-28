<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Изменить пароль</title>
        <?php include ROOT . '/views/layouts/links.php'; ?>
        <?php include ROOT . '/views/layouts/scripts.php'; ?>
    </head><!--/head-->
<body style="background:#f1f1f1;">
	
<?php include ROOT . '/views/layouts/header.php'; ?>
 <div class="content">
    <div class="container">
        <div class="row">
			<div style="text-align:center" class="revealator-zoomin revealator-once">
				<div class="btn-group">
					<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
					</div>
						<div style="float:left" class="revealator-zoomin revealator-delay0 revealator-once">
							<a class="link" title="" href="/cabinet/edit_name_and_login"><button type="button" class="btn btn-default">Изменить имя и логин</button></a>
						</div>																	
					<div class="clearfix"></div>
					<br> 
				</div><!--btn-group -->
			</div><!--revealator-zoomin -->
			<?
					AlertMessage::errorEdit_short_password();
					AlertMessage::errorEdit_same_password();
					AlertMessage::errorEdit_passwords_not_match();
					AlertMessageForAdmin::errorUpdate_errorOld_password();
												
			?>
            <div class="revealator-slideup revealator-once">
				<p style="font-size:25px;text-align:center;"><strong>Редактировать <span class="far fa-edit" aria-hidden="true"></span></strong></p>
				<h4 align="center"> <strong>Ваши возможности: </strong></h4>
				</div><!--revealator-zoomin-->				
					<div class="col-sm-12"><!--col-sm-12 -->
						<div class="revealator-slideup revealator-delay2 revealator-once"> 
								<form align="center" action="#" method="post" class="">
									<input type="hidden" value="1" hidden name="CHANGEPASSWORD_FORM" align="center">							
									<h3>Изменить пароль для <span style="color:#d3b53b;"><?=$user['login']?> </span></h3>

									<p><input style="display:none;" name="username" type="text" placeholder="Имя" value="<?=$user['username'] ?>" maxlength="15" required></input></p>
									<p><input style="display:none;" name="login" type="email" id="inputEmail" value="<?=$user['login'] ?>" placeholder="example@mail.ru" maxlength="50"></p>

									<p style="font-size:12px;text-align:center">Старый пароль:<span class="stars">*</span></p>
									<p><input style="height:35px !important;" name="old_password" type="password" placeholder="Пароль" maxlength="15" required autofocus> </input></p>
									
									<p style="font-size:12px;text-align:center">Новый пароль:<span class="stars">*</span> <a href="#" class="showPassword"><img src="/upload/images/cabinet/lock.png" width="18px" height="18px" title="Показать пароль" alt="Показать пароль"></img></a> <span id="count">0</span>/15</p>
									<p><input style="height:35px !important;" id="reg_password" name="password" type="password" placeholder="Пароль" maxlength="15" required> </input></p>
									<p style="font-size:12px;text-align:center">Повторите пароль:<span class="stars">*</span> <a onclick="copyText()" href="#"><img src="/upload/images/cabinet/copy_new.png" width="18px" height="18px" title="Подтвердить пароль" alt="Подтвердить пароль"></img></a> <span id="count_confirmation">0</span>/15</p>
									<p><input style="height:35px !important;" id="reg_password_confirmation" name="hash_confirmation" type="password" placeholder="Подтверждение пароля" maxlength="15" required></input></p> 
									
									<button style="width:300px !important;" type="submit" name="passwdrecovery"  value="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Сменить пароль</button>
								</form><br>
						</div>
					</div><!--col-sm-12 -->
					<div class="clearfix"></div>
        </div><!-- row-->
    </div><!-- container-->
	<script src="/template/js/passfield.js" type="text/javascript"></script>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>

</body>
</html>
