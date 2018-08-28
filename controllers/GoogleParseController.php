<?php
class GoogleParseController {

    public static $errorMessage = '';

   	public static function actionGoogle()
	{	
		if (authComponent::checkIn())
        {
			$user = Authorization::getUserById($_SESSION['user_id']);
			$info_start = array("ФИО", "Мобильный телефон", "ИНН физического лица", "СНИЛС", "Паспорт", "Номер карты");
			$color_top_border = "#5cf442";
			$data_users = DataUsers::selectAllDataUser($_SESSION['user_id']);
			$user_limit = User::selectLimitUser($_SESSION['user_id']);
			$vulnerability = [];
			$vulnerabilityall = DataUsers::selectAllVul();
			$color_border = ["ФИО" => "#5cf442", "Мобильный телефон" => "#5cf442", "ИНН физического лица" => "#5cf442", "СНИЛС" => "#5cf442", "Паспорт" => "#5cf442", "Номер карты" => "#5cf442"];
			if(($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['SEARCH_GOOGLE_FORM'])) || ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['SEARCH_UNIVERSAL_FORM']))) 
			{
				$saveresult = trim(strip_tags($_POST['saveresult']));
				if($user_limit[0]['limit_q'] == $data_users[0]['limit_q'])
				{
					$timeisit = time();
					$day = 1 * 24 * 60 * 60;
					//$day = 1 * 1 * 1 * 60;
					$nextpdate = $timeisit - strtotime($data_users[0]['last_update']);
					if($nextpdate < $day)
					{
						$_SESSION['limit_null']=true;
						header("Location: /cabinet/googleparse");
						exit;
					}
					else{
						$last_update = date('d.m.Y H:i:s');
						DataUsers::updateLimitUsersData($_SESSION['user_id'], $last_update, 0);
						$_SESSION['limit_up']=true;
						header("Location: /cabinet/googleparse");
						exit;
					}
				}
				else
				{
					/*$gipadress=$_SERVER['REMOTE_ADDR'];
					$grecaptcha=$_POST['g-recaptcha-response']; 
					$postdata = http_build_query(
					array(
						'secret' => '6Ld27lgUAAAAANFBbmlJQ14mnIT3yl09oMrmGm-6',
						'response' => $grecaptcha,
						'remoteip' => $gipadress
					)
					);
					$opts = array('http' =>
					array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/x-www-form-urlencoded',
						'content' => $postdata
					)
					);
		
					$gcontents = stream_context_create($opts);
					$gresults = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $gcontents);
					$jsonresults = json_decode($gresults); 			
		
					if ($jsonresults->{'success'}===false ) {  
					// the code was incorrect  
						$_SESSION['dont_push_captcha']=true;
						header("Location: /cabinet/googleparse");
						exit;
					} 
					else if ($jsonresults->{'success'}=== true )
					{*/
						//GOOGLE_SEARCH
						$update_info_search = [];
						$info_search = [];
						$info_search_process = [];
						$header_search_process = [];
						$info_search_output = [];
						$header_search_output = [];
						$vk_link = array();
						$no_real_phone_site = array(
							'http://bazatel.ru/', 
							'http://ptextile.ru/telephone-numbers/', 
							'https://kakoj-region.ru/', 
							'http://www.ktozvonit.ru/', 
							'http://kodnomera.ru/', 
							'http://diamorph.ru/kakoy-operator-i-region/', 
							'http://allnum.ru/',
							'https://whose-is-this-phone-number.ru/',
							'http://asvas.ru/',
							'https://kto-zvonit.com/',
							'http://ktozvonit.ru/',
							'http://wiki-numbers.ru/',
							'http://kakoi-operator.ru/',
							'https://tel-search.ru/',
							'https://www.neberitrubku.ru/',
							'http://ktomnezvonil.net/',
							'https://kto-zvonil.biz/',
							'http://ktomnezvonil.net/',
							'http://tel-base.ru/',
							'https://kakojoperator.ru/',
							'https://ktozvonil24.ru/',
							'http://defnomer.ru/',
							'http://flagman-s.ru/',
							'http://89xx.ru/',
							'https://www.numbersdata.com/',
							'http://www.callerop.com/',
							'https://reversejusphone.com/',
							'http://www.mozleyu.com/',
							'https://nomeraj.ru/',
							'https://www.kodtelefona.ru/',
							'https://zvonili.com/',
							'https://telefons.info/',
							'http://numblink.com/',
							'http://ww.w.who-calls.info/',
							'http://www.988sj.com/telephone/',
							'https://retelephone.us/',
							'http://www.socaller.com/',
							'http://www.phonenumberquery.net/',
							'http://chey-zvonok.ru/',
							'http://cheynomertelefona.ru/',
							'http://phones.tity.club/',
							'https://7hq.ru/',
							'http://formatstd.ru/',
							'https://whose-is-this-phone-number.ru/',
							'http://phoneradar.ru/',
							'http://www.nerenintelefonu.com/',
							'http://www.wiki-numbers.ru/',
							'http://def9xx.rusaudit-nn.ru/',
							'https://cheynomertelefona.ru/',
							'http://htotelefonuvav.in.ua/',
							'http://www.doki-rent.ru/',
							'http://otkudazvonok.com/',
							'http://telnumbers.info/',
							'http://www.telnumbers.info/',
							'http://pi-company.ru/',
							'http://www.otkudazvonok.com/',
							'http://reon-kim.ru/',
							'http://oldhamntc.ru/',
							'http://www.tel-operator.ru/',
							'http://cellphoneinfo.meebby.com/',
							'http://www.welovefitness.eu/',
							'http://www.lookupzen.com/',
							'http://reversephone.website/',
							'http://www.nmbryu.com/',
							'http://numberphone.ru/',
							'http://560-171.ru/',
							'http://phones-903-720.in-sait.ru/',
							'http://phones-903-720.mmotops.ru/',
							'http://pokerfm.ru/',
							'http://ented.ru/',
							'http://chey-nomer-921.fvds.ru/',
							'http://investprim.ru/',
							'https://baza-nomerov.com/',
							'http://doki-rent.ru/',
							'http://bazanomera.ru/',
							'http://mobilnyenomera.2dn.ru/',
							'http://phonenum.ru/',
							'http://ktomnezvonit.ru/',
							'http://interweb.spb.ru/',
							'http://www.whoisphone.org/',
							'http://yummie.world/',
							'http://redisphone.vhost.wf/',
							'http://chei-nomer.ru/',
							'http://chei-nomer.ru/',
							'http://tel-operator.ru/',
							'http://phonelark.com/',
							'http://fdkjsearch.com/',
							'http://www.phoneinfosource.com/',
							'http://tlwlsearch.com/',
							'http://tlwlsearch.com/',
							'http://www.areacodelocator.net/',
							'http://zvonitnomer.ru/',
							'http://phones',
							'interergo.ru/',
							'http://chey-nomer.fvds.ru/',
							'https://mysmsbox.ru/',
							'https://nomerzvonit.ru/',
							'https://numbershub.ru/',
							'http://www.sarkoid.ru/',
							'http://24sbs.ru/spisok-mobilnyh-nomerov/'
							);


						$info_search['ФИО'] = trim(strip_tags($_POST['fio']));
						//$info_search['ФИО'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['fio'])));
						$info_search['Мобильный телефон'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['phone'])));
						$info_search['ИНН физического лица'] = trim(strip_tags($_POST['inn']));
						$info_search['СНИЛС'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['snils'])));
						$info_search['Паспорт'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['pasport'])));
						$info_search['Номер карты'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['card_number'])));

						$update_info_search['fio'] = trim(strip_tags($_POST['fio']));
						//$info_search['ФИО'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['fio'])));
						$update_info_search['phone'] = preg_replace('![^0-9]+!', '', trim(strip_tags($_POST['phone'])));
						$update_info_search['inn'] = trim(strip_tags($_POST['inn']));
						$update_info_search['snils'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['snils'])));
						$update_info_search['pasport'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['pasport'])));
						$update_info_search['card_number'] = preg_replace('~[^0-9]+~', '', trim(strip_tags($_POST['card_number'])));

						$array_key = ["fio" => "ФИО", "phone" => "Мобильный телефон", "inn" => "ИНН физического лица", "snils" => "СНИЛС", "pasport" => "Паспорт", "card_number" => "Номер карты"];

						$last_update = date('d.m.Y H:i:s');
						$limit_q = $data_users[0]['limit_q'] + 1;
						DataUsers::updateLimitUsersData($_SESSION['user_id'], $last_update, $limit_q);
						foreach($update_info_search as $key_info_search => $itemsearch){
							if(empty($itemsearch)){
								//echo $data_users[0][$key_info_search];
								$update_info_search[$key_info_search] = $data_users[0][$key_info_search];
								$info_search[$array_key[$key_info_search]] = $data_users[0][$key_info_search];
							}
							else{
								if($key_info_search == "phone")
								{
									$info_search[$array_key[$key_info_search]] = "7" . $data_users[0][$key_info_search];
								}
							}
						}
						if(empty($data_users[0]))
						{
							DataUsers::getAlterTableUser();
							DataUsers::insertUsersData($_SESSION['user_id'], $info_search['ФИО'], substr($info_search['Мобильный телефон'], 1), $info_search['ИНН физического лица'], $info_search['СНИЛС'], $info_search['Паспорт'], $info_search['Номер карты'], $last_update, $limit_q);
						}
						else{
							if($data_users[0]['fio'] != $update_info_search['fio'] 
							|| $data_users[0]['phone'] != $update_info_search['phone'] 
							|| $data_users[0]['inn'] != $update_info_search['inn'] 
							|| $data_users[0]['snils'] != $update_info_search['snils'] 
							|| $data_users[0]['pasport'] != $update_info_search['pasport'] 
							|| $data_users[0]['card_number'] != $update_info_search['card_number'])
							{
								DataUsers::updateUsersData($_SESSION['user_id'], $update_info_search['fio'], substr($update_info_search['phone'], 1), $update_info_search['inn'], $update_info_search['snils'], $update_info_search['pasport'], $update_info_search['card_number'], $last_update, $limit_q);
							}
						}

						if(empty($info_search))
						{
							$_SESSION['errorform_null']=true;
							header("Location: /cabinet/googleparse");
							exit;
						}
						if(!empty($info_search))
						{
							require_once ROOT . '/lib/simplehtmldom/simple_html_dom.php';
							foreach($info_search as $key => $param)
							{

								if(!empty($param))
								{
									for($i = 0; $i<2; $i++)
									{
										if($key === 'Мобильный телефон')
										{
											$query = 'site%3A*+' . "%2B7" . $param;
										}
										else if($key === 'ФИО'){
											$query = 'site%3A*+' . urlencode($param);
										}
										else{
											$query = 'site%3A*+' . $param;
										}
										if($i == 0)
										{
											$url = "http://www.google.com/search?hl=ru&q=".$query;
										}
										else{
											$url = "http://www.google.com/search?hl=ru&q=".$query . "&start=" . $i . "0";
										}
										$content = GoogleParseController::getContent($url);
										if($content)
										{
											$html = str_get_html($content);
										}
										else
										{
											array_push($info_search_process, 'Поиск времено не доступен. Обратитесь к Администрации.');
											$color_border[$key] = "grey";
											$color_top_border = "grey";
											$info_search_output[$key] = $info_search_process;
											$info_search_process = [];
											break;
										}
										if(stristr($content, "302 Moved")){
												array_push($info_search_process, 'Блокировка Google. Ошибка: 302 Moved');
												$color_border[$key] = "grey";
												$color_top_border = "grey";
												$info_search_output[$key] = $info_search_process;
												$info_search_process = [];
										}
										else if(stristr($content, "Error 400"))
										{
											array_push($info_search_process, 'Google. Ваш клиент выдал неверный или незаконный запрос. Ошибка: 400. That’s an error.');
											$color_border[$key] = "grey";
											$color_top_border = "grey";
											$info_search_output[$key] = $info_search_process;
											$info_search_process = [];
										}
										else
										{
											if($html->innertext!='' and count($html->find("div.s")))
											{
												foreach($html->find("div.g") as $a)
												{
													foreach($a->find("div.s") as $b)
													{
														$arra = $a->find("h3.r a");
														if(stristr($arra[0], "nomerorg.cc")){
															$result_url = strstr(substr(strstr($arra[0]->attr['href'], '='), 1, strlen($arra[0]->attr['href'])), '&', true);
															if(!stristr($result_url, 'xn--'))
															{
																if(stristr($result_url, '%'))
																{																		
																	$result_url = str_replace("25","",$result_url);
																	$st = $b->find("span.st");
																	array_push($info_search_process, urldecode($result_url));
																	array_push($header_search_process, $st[0]);
																	continue;
																}
															}
														}
														if(stristr($b, $param) || stristr($b, mb_strtolower($param)) || stristr($b, mb_strtoupper($param)))
														{
															foreach($a->find("h3.r a") as $tar)
															{												
																$result_url = strstr(substr(strstr($tar->attr['href'], '='), 1, strlen($tar->attr['href'])), '&', true);
																if(stristr($result_url, 'vk.com') || stristr($result_url, 'twitter.com') || stristr($result_url, 'ok.ru') || stristr($result_url, 'ru-ru.facebook.com')){
																	$st = $b->find("span.st");
																	if(in_array('Список ресурсов пуст', $info_search_process))
																	{
																		$info_search_process = [];
																		array_push($info_search_process, urldecode($result_url));
																		array_push($header_search_process, $st[0]);
																	}else{
																		array_push($info_search_process, urldecode($result_url));
																		array_push($header_search_process, $st[0]);
																	}
																	
																	if(stristr($result_url, 'vk.com')){
																		if((!stristr($result_url, 'vk.com/topic'))){
																			if(!stristr($result_url, 'vk.com/wall')){
																				array_push($vk_link, urldecode($result_url));
																			}
																		}
																	}
																	continue;
																}
																if(!stristr($result_url, 'xn--'))
																{
																	if(stristr($result_url, '%'))
																	{																		
																		$result_url = str_replace("25","",$result_url);
																	}
																}
																if(stristr($result_url, 'call'))
																{
																	continue;
																}
																if(stristr($result_url, '.pdf') || stristr($result_url, '.rtf') || stristr($result_url, '.docs') || stristr($result_url, '.doc') || stristr($result_url, '.xlsx') || stristr($result_url, '.xls'))
																{
																	$st = $b->find("span.st");
																	array_push($info_search_process, urldecode($result_url));
																	array_push($header_search_process, $st[0]);
																	continue;
																}
																foreach($no_real_phone_site as $no_real_phone)
																{
																	if(stristr($result_url, $no_real_phone))
																	{
																		$result_url = '';
																		break;
																	}
																}
																if(!empty($result_url))
																{
																	if(!stristr($result_url, 'xn--'))
																	{
																		$result_url = urldecode($result_url);
																	}
																	//echo $result_url . "<br>";
																	$body_result_url = GoogleParseController::getContent($result_url);
																	$html_res = str_get_html($body_result_url);
																	
																	if($html_res->innertext!='' and count($html_res->find("body")))
																	{
																		foreach($html_res->find("body") as $a_body)
																		{									
																			if(stristr($a_body, $param . '.jpg') || stristr($a_body, $param . '.png'))
																			{
																				continue;
																			}
																			else if(stristr($a_body, $param) || stristr($a_body, mb_strtolower($param)) || stristr($a_body, mb_strtoupper($param)))
																			{
																				//GoogleParseController::getScreen($result_url);
																				$st = $b->find("span.st");
																				if(in_array('Список ресурсов пуст', $info_search_process))
																				{
																					$info_search_process = [];
																					array_push($info_search_process, urldecode($result_url));
																					array_push($header_search_process, $st[0]);
																				}
																				else
																				{
																					//echo $result_url . "<br>";
																					array_push($info_search_process, urldecode($result_url));
																					array_push($header_search_process, $st[0]);
																				}
																			}
																			else
																			{
																				
																			}
																		}
																	}
																	else
																	{
																		if(empty($info_search_process))
																		{
																			array_push($info_search_process, 'Список ресурсов пуст');
																		}														
																	}																											
																}
																else
																{
																	if(empty($info_search_process))
																	{
																		array_push($info_search_process, 'Список ресурсов пуст');
																	}	
																}
															}
														}
													}
												}			
											}
											else
											{
												if($i == 0)
												{
													array_push($info_search_process, 'Список ресурсов пуст');
													$color_border[$key] = "#5cf442";
													$color_top_border = "#5cf442";
													$info_search_output[$key] = $info_search_process;
													$info_search_process = [];
													continue;
												}
											}
											//echo "<br>" . count($info_search_process) . "<br>";
											if(count($info_search_process) == 0)
											{
												$color_border[$key] = "#5cf442";
											}
											else if(count($info_search_process) <= 3)
											{
												if(in_array('Список ресурсов пуст', $info_search_process))
												{
													$color_top_border = "#5cf442";
												}
												else
												{
													$color_border[$key] = "#FFA500";
												}					
											}
											else
											{
												if(in_array('Список ресурсов пуст', $info_search_process))
												{
													$color_top_border = "#5cf442";
												}
												else
												{
													$color_border[$key] = "#ef0404";
												}
											}
											$info_search_output[$key] = $info_search_process;
											$header_search_output[$key] = $header_search_process;
										}
									}
									$info_search_process = [];
									$header_search_process = [];
								}		
							}
						}
					//}
				}
			}
			if(!empty($color_border))
			{
				$count_border_color = array_count_values($color_border);
			}
			if(!empty($count_border_color))
			{
				foreach($count_border_color as $k => $val)
				{		
					if($k == "#5cf442")
					{
						if($val == 6)
						{
							$color_top_border = "#5cf442";
						}
					}
					else if($k == "#FFA500")
					{
						if($val > 0)
						{
							$color_top_border = "#FFA500";
						}
					}
					else if($k == "#ef0404")
					{
						if($val > 0)
						{
							$color_top_border = "#FFA500";
						}
						if($val >= 4)
						{
							$color_top_border = "#ef0404";
						}
					}
					else
					{

					}	
				}
			}

			if(!empty($info_search_output["ФИО"]) && $info_search_output["ФИО"] != "Список ресурсов пуст"){
                    array_push($vulnerability, explode(";", $vulnerabilityall[0]["fio_vul"]));
            }
            if(!empty($info_search_output["Мобильный телефон"]) && $info_search_output["Мобильный телефон"] != "Список ресурсов пуст"){
                array_push($vulnerability, explode(";", $vulnerabilityall[0]["phone_vul"]));
            }
            if(!empty($info_search_output["ИНН физического лица"]) && $info_search_output["ИНН физического лица"] != "Список ресурсов пуст"){
                array_push($vulnerability, explode(";", $vulnerabilityall[0]["inn_vul"]));
            }
            if(!empty($info_search_output["СНИЛС"]) && $info_search_output["СНИЛС"] != "Список ресурсов пуст"){
                array_push($vulnerability, explode(";", $vulnerabilityall[0]["snils_vul"]));
            }
            if(!empty($info_search_output["Паспорт"]) && $info_search_output["Паспорт"] != "Список ресурсов пуст"){
                array_push($vulnerability, explode(";", $vulnerabilityall[0]["pasport_vul"]));
            }
            if(!empty($info_search_output["Номер карты"]) && $info_search_output["Номер карты"] != "Список ресурсов пуст"){
                array_push($vulnerability, explode(";", $vulnerabilityall[0]["card_number_vul"]));
            }
            if(empty($vulnerability)){
                array_push($vulnerability, "Угроз нет");
            }

			$data_users = DataUsers::selectAllDataUser($_SESSION['user_id']);
			if($saveresult)
			{
				$dataSave = [];
				foreach($info_search_output as $key_push => $push)
				{
					if(!empty($push))
					{
						$dataSave[$key_push] = implode(";", $push);
					}
					else{
						$dataSave[$key_push] = "Список ресурсов пуст";
					}
				}
				$count_array = count($dataSave);
				if($count_array != 6)
				{
					for($z=$count_array; $z <=5; $z++)
					{
						$dataSave[$info_start[$z]] = "Список ресурсов пуст";
					}
				}
				$alldata = DataUsers::selectAllDataUserResources($_SESSION['user_id']);
				$vk_link_res = DataUsers::selectAllDataUserVK($_SESSION['user_id']);
				if(!empty($vk_link)){
					$strvklink = implode(";", $vk_link);
				}else{
					$strvklink = "";
				}
				if(empty($vk_link_res)){
					
					DataUsers::DataSaveResultVK($_SESSION['user_id'], $strvklink, $last_update);
				}else{
					DataUsers::DataSaveResultUpdateVK($_SESSION['user_id'], $strvklink, $last_update);
				}
				if(empty($alldata))
				{
					DataUsers::getAlterTableDataResources();
					$col_border = implode(";", $color_border);
					DataUsers::DataSaveResult($_SESSION['user_id'], $dataSave[$info_start[0]], $dataSave[$info_start[1]], $dataSave[$info_start[2]], $dataSave[$info_start[3]], $dataSave[$info_start[4]], $dataSave[$info_start[5]], $last_update, $col_border, $color_top_border);
				}
				else{
					$col_border = implode(";", $color_border);
					DataUsers::DataSaveResultUpdate($_SESSION['user_id'], $dataSave[$info_start[0]], $dataSave[$info_start[1]], $dataSave[$info_start[2]], $dataSave[$info_start[3]], $dataSave[$info_start[4]], $dataSave[$info_start[5]], $last_update, $col_border, $color_top_border);
				}
				if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['SEARCH_UNIVERSAL_FORM'])){
					header("Location: /cabinet/statistic_google");
					exit;
				}
			}
			if(empty($_POST['SEARCH_UNIVERSAL_FORM'])){
				require_once(ROOT . '/views/cabinet/googleparse.php');
				return true;
			}
			else{
				return $info_search_output;
			}
		}
		header("Location: /");
		exit;	
	}

 	protected function getContentByProxy($url, $referer = null, $proxies = array('183.182.105.202:80', '183.182.105.202:80'))
    {
        $proxies = (array) $proxies;
        $steps = count($proxies);
        $step = 0;
        $try = true;
        while($try){
            // create curl resource
            $ch = curl_init();
            $proxy = isset($proxies[$step]) ? $proxies[$step] : null;
 
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_REFERER, $referer);
			
            //curl_setopt($ch, CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.51");
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return the transfer as a string
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 
            $output = curl_exec($ch); // get content
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код
 
            // close curl resource to free up system resources
            curl_close($ch);
			//echo $step . " : " . $http_code . "<br>";
            $step++;
            $try = (($step < $steps) && ($http_code != 200));
        }
        return $output;
    }

	public function getContent($url)
    {
			$user_agent = $_SERVER["HTTP_USER_AGENT"];
            // create curl resource
            $ch = curl_init();
			
			curl_setopt($ch, CURLOPT_HEADER, 1);
			//curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return the transfer as a string
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			

			//curl_setopt($ch, CURLOPT_PROXY, $proxy);
			//curl_setopt($ch, CURLOPT_COOKIEJAR, dirname (__FILE__)."/cookie.txt"); 
			//curl_setopt($ch, CURLOPT_COOKIEFILE, dirname (__FILE__)."/cookie.txt");
 
            $output = curl_exec($ch); // get content
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код
 
            // close curl resource to free up system resources
            //curl_close($ch);
			//echo $http_code . "<br>";
			if($http_code == 200)
			{
				$header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
				curl_close($ch);

				$tmpHeaders = substr($output, 0, $header_size);
				$postResult = substr($output, $header_size);

				$headers = array();
				foreach(explode("\n",$tmpHeaders) as $header)
				{
					$tmp = explode(":",trim($header),2);
					if (count($tmp)>1)
					{
						$headers[strtolower($tmp[0])] = trim(strtolower($tmp[1]));
					}
				}

				$encoding="utf-8"; //default
				if (isset($headers['content-type']))
				{
					$tmp = explode("=", $headers['content-type']);
					if (count($tmp)>1)
					{
						$encoding = $tmp[1];
					} 
				}
				if ($encoding != "utf-8")
				{
					$postResult = iconv($encoding, "UTF-8", $postResult);
				}
				return $postResult;
			}
 
    }

	public static function ErrorMessage()
	{
		return self::$errorMessage;
	}
	
}