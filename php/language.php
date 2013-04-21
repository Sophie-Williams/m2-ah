<?PHP
	
	if(isset($_GET["lang"]) && $_GET["lang"]=="tr")
	{
		$_SESSION["lang"]="tr";
		echo'<meta http-equiv="refresh" content="1;URL=index.php" />';
	}
	elseif(isset($_GET["lang"]) && $_GET['lang']=="en")
	{
		$_SESSION["lang"]="en";
		echo'<meta http-equiv="refresh" content="1;URL=index.php" />';
	}
	elseif($_SESSION['lang']=="")
	{
		$_SESSION["lang"]="en";
		echo'<meta http-equiv="refresh" content="1;URL=index.php" />';
	}
	
?>