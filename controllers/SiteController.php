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

            $targetUrlPost = trim(strip_tags($_POST['site']));
            $targetUrl = parse_url($targetUrlPost, PHP_URL_HOST);
            
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

                        if(stristr($href, '.css') || stristr($href, '.js') || stristr($href, '.png') || stristr($href, '.jpeg') || stristr($href, '.jpg') || stristr($href, '.gif') || stristr($href, '.svg') || stristr($href, '.ttf') || stristr($href, '.otf') || stristr($href, '.woff') || stristr($href, '.ico')){

                            if(stristr($href, trim(strip_tags($_POST['site'])))){

                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);


                                if(!file_exists( $targetUrl . $pathToDir )){
                                    mkdir($targetUrl . $pathToDir, 0777, true);
                                }

                                $content = SiteController::getContent($href);

                                file_put_contents($targetUrl . $path, $content);


                                if(stristr($href, '.css')) {

                                    $urlCss = SiteController::getImageUrls($content);

                                    foreach ($urlCss as $src) {

                                        $pathSrc = parse_url($src, PHP_URL_PATH);
                                        $pathToDirSrc = mb_substr(str_replace(basename($pathSrc), '', $pathSrc), 0, -1);
                                        //echo "<br>" . $pathSrc . "<br>";

//                                        if(substr($pathSrc, 0,1) == '.'){
//                                            $fullPath = $targetUrl . '/' . $pathToDirSrc;
//                                        }else if (substr($pathSrc, 0,1) =='/'){
//                                            $fullPath = $targetUrl . $pathToDirSrc;
//                                        }else{
//                                            $fullPath = $targetUrl . '/' . $pathToDirSrc;
//                                        }

                                        if(substr($pathSrc, 0,6) == '../../'){
                                            $fullPath = $targetUrl . "/" . $pathToDir . "/" . $pathToDirSrc;
                                            //echo "<br>" . "Полный путь для" . "../../ ------" . $fullPath . "<br>";
                                        }else if (substr($pathSrc, 0,1) =='/'){
                                            $fullPath = $targetUrl . $pathToDirSrc;
                                            //echo "<br>" . "Полный путь для" . " / ------" . $fullPath . "<br>";
                                        }else if (substr($pathSrc, 0,3) == '../'){
                                            $fullPath = $targetUrl . "/" . $pathToDir . "/" . $pathToDirSrc;
                                            //echo "<br>" . "Полный путь для" . "../ ------" . $fullPath . "<br>";
                                        }else{
                                            $fullPath = $targetUrl . "/" . $pathToDirSrc;
                                            //echo "<br>" . "Иначе" . " ------" . $fullPath . "<br>";
                                        }



                                        if(!file_exists( $fullPath)){
                                            mkdir($fullPath, 0777, true);
                                        }


                                        $content = SiteController::getContent($fullPath . '/' .  basename($pathSrc));

                                        file_put_contents($fullPath . '/' .  basename($pathSrc), $content);



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




                            }else if(!stristr($href, 'http')){

                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);
                                //echo "<br>" . $path . "<br>";


                                if(substr($path, 0,1) == '.'){
                                    $fullPath = $targetUrl . "/" . $pathToDir;
                                    //echo "<br>" . "Полный путь для . -----" . $fullPath . "<br>";
                                }else if (substr($path, 0,1) =='/'){
                                    $fullPath = $targetUrl . $pathToDir;
                                    //echo "<br>" . "Полный путь для / -----" . $fullPath . "<br>";
                                }else{
                                    $fullPath = $targetUrl . "/" . $pathToDir;
                                    //echo "<br>" . "Иначе . -----" . $fullPath . "<br>";
                                }


                                if(!empty($pathToDir)){
                                     if(!file_exists( $fullPath )){
                                         mkdir($fullPath, 0777, true);
                                    }

                                    $content = SiteController::getContent($fullPath . "/" . basename($path));
                                    file_put_contents($fullPath . "/" . basename($path), $content);

                                }else{
                                    $content = SiteController::getContent($targetUrl . "/" . $path);
                                    file_put_contents($targetUrl . '/' . $path, $content);
                                }

                                if(stristr($href, '.css')) {


                                    $urlCss = SiteController::getImageUrls($content);

                                    foreach ($urlCss as $src) {

                                        $pathSrc = parse_url($src, PHP_URL_PATH);
                                        $pathToDirSrc = mb_substr(str_replace(basename($pathSrc), '', $pathSrc), 0, -1);
                                        echo "<br>" . $pathSrc . "<br>";


                                        if(substr($pathSrc, 0,6) == '../../'){
                                            $fullPath = $targetUrl . "/" . $pathToDir . "/" . $pathToDirSrc;
                                            echo "<br>" . "Полный путь для" . "../../ ------" . $fullPath . "<br>";
                                        }else if (substr($pathSrc, 0,1) =='/'){
                                            $fullPath = $targetUrl . $pathToDirSrc;
                                            echo "<br>" . "Полный путь для" . " / ------" . $fullPath . "<br>";
                                        }else if (substr($pathSrc, 0,3) == '../'){
                                            $fullPath = $targetUrl . "/" . $pathToDir . "/" . $pathToDirSrc;
                                            echo "<br>" . "Полный путь для" . "../ ------" . $fullPath . "<br>";
                                        }else{
                                            $fullPath = $targetUrl . "/" . $pathToDirSrc;
                                            echo "<br>" . "Иначе" . " ------" . $fullPath . "<br>";
                                        }




                                        if(!file_exists( $fullPath)){
                                            mkdir($fullPath, 0777, true);
                                        }

//                                        if(stristr($pathSrc, 'bg_category_rastertop.gif')){
//
//                                            continue;
//                                        }else{
//                                            echo substr($pathSrc, 0,6) . "<br>";
//                                            echo $fullPath;
//                                            exit;
//
//                                        }


                                        $content = SiteController::getContent($fullPath . '/' .  basename($pathSrc));

                                        file_put_contents($fullPath . '/' .  basename($pathSrc), $content);



                                        if(stristr($src, '.css')){

                                            $pathSrcCss = parse_url($src, PHP_URL_PATH);
                                            $pathToDirSrcCss = mb_substr(str_replace(basename($pathSrcCss), '', $pathSrcCss), 0, -1);


                                            if(substr($pathSrcCss, 0,1) == '.'){
                                                $fullPathCss = $targetUrl . $pathToDir . '/' .$pathToDirSrcCss;
                                            }else if (substr($pathSrcCss, 0,1) =='/'){
                                                $fullPathCss = $targetUrl . $pathToDir . $pathToDirSrcCss;
                                            }else{
                                                $fullPathCss = $targetUrl . $pathToDir . '/' .$pathToDirSrcCss;
                                            }

                                            if(!file_exists( $fullPathCss)){
                                                mkdir($fullPathCss, 0777, true);
                                            }


                                            $urlCssincss = SiteController::getImageUrls($content);

                                            foreach ($urlCssincss as $src) {

                                                $pathSrcCssInCss = parse_url($src, PHP_URL_PATH);
                                                $pathToDirSrcCssInCss = mb_substr(str_replace(basename($pathSrcCssInCss), '', $pathSrcCssInCss), 0, -1);

                                                if(substr($pathSrcCssInCss, 0,1) == '.'){
                                                    $fullPathCss = $targetUrl . $pathToDir . '/' .$pathToDirSrcCssInCss;
                                                }else if (substr($pathSrcCssInCss, 0,1) =='/'){
                                                    $fullPathCss = $targetUrl . $pathToDir . $pathToDirSrcCssInCss;
                                                }else{
                                                    $fullPathCss = $targetUrl . $pathToDir . '/' .$pathToDirSrcCssInCss;
                                                }


                                                $content = SiteController::getContent($fullPathCss . $src);
                                                file_put_contents($fullPathCss . $src, $content);
                                            }
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

                            if(stristr($href, trim(strip_tags($_POST['site'])))) {


                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);


                                if (!file_exists($targetUrl . $pathToDir)) {
                                    mkdir($targetUrl . $pathToDir, 0777, true);
                                }

                                $content = SiteController::getContent($href);

                                file_put_contents($targetUrl . $path, $content);

                            }else if(!stristr($href, 'http')) {

                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);
                                //echo "<br>" . $path . "<br>";

                                if(substr($path, 0,1) == '.'){
                                    $fullPath = $targetUrl . '/' . $pathToDir;
                                    //echo "<br>" . "Полный путь для . -------- " . $fullPath . "<br>";
                                }else if (substr($path, 0,1) =='/'){
                                    $fullPath = $targetUrl . $pathToDir;
                                    //echo "<br>" . "Полный путь для / -------- " . $fullPath . "<br>";
                                }else{
                                    $fullPath = $targetUrl . '/' . $pathToDir;
                                    //echo "<br>" . "Иначе -------- " . $fullPath . "<br>";
                                }


                                if (!empty($pathToDir)) {
                                    if (!file_exists($fullPath)) {
                                        mkdir($fullPath, 0777, true);
                                    }

                                    $content = SiteController::getContent($fullPath . "/" . basename($path));
                                    file_put_contents($fullPath . "/" . basename($path), $content);

                                } else {

                                    $content = SiteController::getContent($targetUrl . "/" . $path);
                                    file_put_contents($targetUrl . '/' . $path, $content);
                                }
                            }
                        }
                    }

                    foreach($html->find("img") as $a){

                        $href = $a->attr['data-original'];
                        $href = ltrim ($href, "/");

                        if(stristr($href, '.png') || stristr($href, '.jpeg') || stristr($href, '.jpg') || stristr($href, '.gif') || stristr($href, '.svg')){

                            if(stristr($href, trim(strip_tags($_POST['site'])))) {


                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);


                                if (!file_exists($targetUrl . $pathToDir)) {
                                    mkdir($targetUrl . $pathToDir, 0777, true);
                                }

                                $content = SiteController::getContent($href);

                                file_put_contents($targetUrl . $path, $content);

                            }else if(!stristr($href, 'http')) {

                                $path = parse_url($href, PHP_URL_PATH);
                                $pathToDir = mb_substr(str_replace(basename($path), '', $path), 0, -1);
                                //echo "<br>" . $path . "<br>";

                                if(substr($path, 0,1) == '.'){
                                    $fullPath = $targetUrl . '/' . $pathToDir;
                                    //echo "<br>" . "Полный путь для . -------- " . $fullPath . "<br>";
                                }else if (substr($path, 0,1) =='/'){
                                    $fullPath = $targetUrl . $pathToDir;
                                    //echo "<br>" . "Полный путь для / -------- " . $fullPath . "<br>";
                                }else{
                                    $fullPath = $targetUrl . '/' . $pathToDir;
                                    //echo "<br>" . "Иначе -------- " . $fullPath . "<br>";
                                }


                                if (!empty($pathToDir)) {
                                    if (!file_exists($fullPath)) {
                                        mkdir($fullPath, 0777, true);
                                    }

                                    $content = SiteController::getContent($fullPath . "/" . basename($path));
                                    file_put_contents($fullPath . "/" . basename($path), $content);

                                } else {

                                    $content = SiteController::getContent($targetUrl . "/" . $path);
                                    file_put_contents($targetUrl . '/' . $path, $content);
                                }
                            }
                        }
                    }
                }







//                if($html->innertext!='' and count($html->find("script"))) {
//
//                    foreach ($html->find("script") as $a) {
//
//                        echo $a->innertext;
//                        exit;
//
//                        $href = $a->attr['src'];
//                        $href = ltrim($href, "/");
//                        echo $href;
//                        exit;
//                    }
//                }
//                $html->clear(); // подчищаем за собой
//                unset($html);
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
                if(!stristr($match, 'urn')){
                    array_push($urlArray, $match);
                }
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