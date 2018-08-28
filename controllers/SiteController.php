<?php

class SiteController
{
    public static function actionIndex()
    {
      
        require_once(ROOT . '/views/site/index.php');  
        return true;
    }

    public static function actionStore()
    {

        if(isset($_POST['submit'])){

            $rule = array('/', ':', 'https', 'http');

            $targetUrl = trim(strip_tags($_POST['site']));

            foreach ($rule as $item) {

                $targetUrl = str_replace($item, '', $targetUrl);

            }


            require_once ROOT . '/lib/simplehtmldom/simple_html_dom.php';

            $content = SiteController::getContent($targetUrl);

            if($content)
            {
                $html = str_get_html($content);

                if(!file_exists( $targetUrl )){

                    mkdir($targetUrl, 0777);

                }

                    file_put_contents("$targetUrl/index.html", $content);

                    if($html->innertext!='' and count($html->find("link")))
                    {

                        foreach($html->find("link") as $a){

                            $href = $a->attr['href'];

                            $href = ltrim ($href, "/");

                            if(stristr($href, '.css') || stristr($href, '.js') || stristr($href, '.png') || stristr($href, '.jpeg') || stristr($href, '.jpg') || stristr($href, '.gif') || stristr($href, '.svg')){

                                if(stristr($href, 'http://') || stristr($href, 'https://')){

                                    $content = SiteController::getContent($href);

                                }else{
                                    $content = SiteController::getContent($targetUrl . "/" . $href);
                                }

                                file_put_contents($targetUrl . "/" . $href, $content);

                                if(stristr($href, '.css')){

                                    if(stristr($href, 'http://') || stristr($href, 'https://')){

                                        $con = file_get_contents($href);
                                    }else{
                                        $con = file_get_contents($targetUrl . "/" . $href);
                                    }

                                    $urlCss = SiteController::getImageUrls($con);


                                    foreach ($urlCss as $src) {

                                        $content = SiteController::getContent($targetUrl . "/" . $src);
                                        file_put_contents($targetUrl . "/" . $src, $content);

                                        if(stristr($src, '.css')){

                                            $cssFile = file_get_contents($targetUrl . "/" . $src);
                                            $urlCssincss = SiteController::getImageUrls($cssFile);

                                            foreach ($urlCssincss as $src) {
                                                $content = SiteController::getContent($targetUrl . "/" . $src);
                                                file_put_contents($targetUrl. "/" . $src, $content);
                                            }
                                        }
                                    }
                                }
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
                                file_put_contents($targetUrl . "/" . $href, $content);
                            }                                                     
                        }
                    }
                
                
            }
        }

        require_once(ROOT . '/views/site/index.php');  
        return true;
    }

    public static function getImageUrls($input_string) {

        $urlArray = array();
        preg_match_all('/url\(([\s])?([\"|\'])?(.*?)([\"|\'])?([\s])?\)/i', $input_string, $matches, PREG_PATTERN_ORDER);
        if ($matches) {
            foreach ($matches[3] as $match) {
                array_push($urlArray, $match);
            }
        }

        return $urlArray;
    }

    public static function getContent($url)
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