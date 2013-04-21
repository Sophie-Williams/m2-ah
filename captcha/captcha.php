<?PHP
	session_name("auction_house");
	session_start();
	header("Content-Type: image/png");
	$font = "./franconi.ttf"; 
	$_SESSION["captcha_id"] = "";
	$zufallszahl = mt_rand(10000000,99999999);
	$_SESSION["captcha_id"] = $zufallszahl;
	$image = imagecreatefrompng("bg.png");
	$col1 = mt_rand(000,255);
	$col2 = mt_rand(000,255);
	$colors = imagecolorallocate($image, $col1, $col2, 255);
	imagettftext($image, 19, 0, 45, 24, $colors, $font, $_SESSION["captcha_id"]); 
	ImagePNG($image);
?>