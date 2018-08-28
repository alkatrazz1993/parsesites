<?php	
class AutoParseController {

    public static $errorMessage = '';

   	public static function actionAutoparse()
	{	
		if (authComponent::checkIn())
        {
			$user = Authorization::getUserById($_SESSION['user_id']);
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['AUTO_SEARCH_FORM'])) 
			{
				$_SESSION['auto_parse']=true;
				header("Location: /cabinet");
				exit;
			}
			require_once(ROOT . '/views/cabinet/autoparse.php');
			return true;
		}
	}
	public static function ErrorMessage()
	{
		return self::$errorMessage;
	}
}
/*if (authComponent::checkIn())
{
	$user = Authorization::getUserById($_SESSION['user_id']);
	$info_start = array("ФИО", "Мобильный телефон", "ИНН физического лица", "СНИЛС", "Паспорт", "Номер карты");
	$color_top_border = "#5cf442";
	$data_users = DataUsers::selectAllDataUser($_SESSION['user_id']);
	$user_limit = User::selectLimitUser($_SESSION['user_id']);
	$color_border = ["ФИО" => "#5cf442", "Мобильный телефон" => "#5cf442", "ИНН физического лица" => "#5cf442", "СНИЛС" => "#5cf442", "Паспорт" => "#5cf442", "Номер карты" => "#5cf442"];
	
	
		$saveresult = trim(strip_tags($_POST['saveresult']));
		if($user_limit[0]['limit_q'] == $data_users[0]['limit_q'])
		{
			$timeisit = time();
			//$day = 1 * 24 * 60 * 60;
			$day = 1 * 1 * 1 * 1;
			$nextpdate = $timeisit - strtotime($data_users[0]['last_update']);
			if($nextpdate < $day)
			{
				$_SESSION['limit_null']=true;
				header("Location: /cabinet/universalparse");
				exit;
			}
			else{
				$last_update = date('d.m.Y H:i:s');
				DataUsers::updateLimitUsersData($_SESSION['user_id'], $last_update, 0);
				$_SESSION['limit_up']=true;
				header("Location: /cabinet/universalparse");
				exit;
			}
		}
		else
		{
			
				
			$info_search['ФИО'] = trim(strip_tags($_POST['fio']));
			//$info_search['ФИО'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['fio'])));
			$info_search['Мобильный телефон'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['phone'])));
			$info_search['ИНН физического лица'] = trim(strip_tags($_POST['inn']));
			$info_search['СНИЛС'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['snils'])));
			$info_search['Паспорт'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['pasport'])));
			$info_search['Номер карты'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['card_number'])));




			$googleSearch = GoogleParseController::actionGoogle();
			$yandexSearch = YandexParseController::actionYandex();
			$color_top_border_g = DataUsers::selectColorTopBorderDataUserResourcesG($_SESSION['user_id']);
			$color_top_border_g = $color_top_border_g[0]["color_top_border"];
			$color_top_border_y = DataUsers::selectColorTopBorderDataUserResourcesY($_SESSION['user_id']);
			$color_top_border_y = $color_top_border_y[0]["color_top_border"];
			$color_border_g = DataUsers::selectColorBorderDataUserResourcesG($_SESSION['user_id']);
			$color_border_g = explode(";", $color_border_g[0]["color_border"]);
			$color_border_y = DataUsers::selectColorBorderDataUserResourcesY($_SESSION['user_id']);
			$color_border_y = explode(";", $color_border_y[0]["color_border"]);
			for($g = 0; $g < count($info_start); $g++)
			{
				$color_border_g[$info_start[$g]] = $color_border_g[$g];
			}
			for($y = 0; $y < count($info_start); $y++)
			{
				$color_border_y[$info_start[$y]] = $color_border_y[$y];
			}
			if($saveresult)
			{
				header("Location: /cabinet/statistic_universal");
				exit;
			}
		
		}
	
	
}	*/
