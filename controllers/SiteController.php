<?php

class SiteController
{
    public static function actionindex()
    {
      
        require_once(ROOT . '/views/site/index.php');  
        return true;
    }

    public static function actionStore()
    {
        if(isset($_POST['submit'])){

            $targetUrl = trim(strip_tags($_POST['site']));
            require_once ROOT . '/lib/simplehtmldom/simple_html_dom.php';

            $content = SiteController::getContent($targetUrl);
            if($content)
            {
                $html = str_get_html($content);
                if(!file_exists( 'site' )){
                     
                    mkdir('site', 0777);
                }

                    file_put_contents("site/site.html", $content);

                    if($html->innertext!='' and count($html->find("link")))
                    {   
                        
                        foreach($html->find("link") as $a){

                            $href = $a->attr['href'];
                            $href = ltrim ($href, "/");

                            if(stristr($href, '.css') || stristr($href, '.js') || stristr($href, '.png') || stristr($href, '.jpeg') || stristr($href, '.jpg') || stristr($href, '.gif') || stristr($href, '.svg')){
                                $content = SiteController::getContent($targetUrl . "/" . $href);
                                file_put_contents("site/" . $href, $content);

                                preg_match_all('#<a [^>]*href="(.*)"[^>]*>#Ui', $content, $matches);
                                print_r($matches[1]);//в массиве $matches[1] будут все ссылки

                            }

                        }
                    }

                    if($html->innertext!='' and count($html->find("img")))
                    {   
                        
                        foreach($html->find("img") as $a){

                            $href = $a->attr['src'];
                            $href = ltrim ($href, "/");

                            if(stristr($href, '.png') || stristr($href, '.jpeg') || stristr($href, '.jpg') || stristr($href, '.gif') || stristr($href, '.svg')){
                                $content = SiteController::getContent($targetUrl . "/" . $href);
                                file_put_contents("site/" . $href, $content);
                            }                                                     
                        }
                    }
                
                
            }

            


        }

        //header('Location', '/');
        //
        require_once(ROOT . '/views/site/index.php');  
        return true;
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
   
       
}