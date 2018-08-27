<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Изменить имя и логин</title>
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
						<div style="float:left" class="revealator-zoomin revealator-delay2 revealator-once">
							<a class="link" title="" href="/cabinet/change_password"><button type="button" class="btn btn-default">Изменить пароль</button></a>
						</div>																		
					<div class="clearfix"></div>
					<br> 
				</div><!--btn-group -->
			</div><!--revealator-zoomin -->
			<?
					AlertMessage::errorEdit_loginExists();
					AlertMessage::errorEdit_short_login();
					AlertMessageForAdmin::errorUpdate_errorOld_password();
			?>
            <div class="revealator-slideup revealator-once">
				<p style="font-size:25px;text-align:center;"><strong>Редактировать <span class="far fa-edit" aria-hidden="true"></span></strong></p>
				<h4 align="center"> <strong>Ваши возможности: </strong></h4>
				</div><!--revealator-zoomin-->																					
					<div class="col-sm-12"><!--col-sm-12 -->
						<div class="revealator-slideup revealator-once">  
								<form align="center" action="#" method="post" class="">
									<input type="hidden" value="1" hidden name="CHANGEEMAIL_AND_LOGIN_FORM" align="center">							
									<h3>Изменить имя и логин:</h3>
									<p style="font-size:12px;text-align:center">Пароль:<span class="stars">*</span></p>
									<p><input style="height:35px !important;" name="old_password" type="password" placeholder="Пароль" maxlength="15" required autofocus> </input></p>
									<p><input style="height:35px !important;" name="username" type="text" placeholder="Имя" value="<?=$user['username'] ?>" maxlength="15" required></input></p>
									<p><input style="height:35px !important;" name="login" type="email" id="inputEmail" value="<?=$user['login'] ?>" placeholder="Логин" maxlength="50" required></p>
									<button style="width:300px;" type="submit" name="submit" value="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Готово!</button>
								</form><br>
						</div>
					</div><!--col-sm-12 -->
					<div class="clearfix"></div>					
        </div><!-- row-->
    </div><!-- container-->
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
</body>
</html>
