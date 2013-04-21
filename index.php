<?PHP
 // ERROR_REPORTING(0);
 if(!file_exists('./lib/config.lib.php'))
 {
  header('Location: install.php');
 }
 
 session_name("auction_house");
 session_start();
 
 require("./lib/config.lib.php");
 require("./lib/functions.lib.php");
 require("./lib/extensions.lib.php");
 require("./php/language.php");
 
 $server=mysql_connect(HOST,USER,PASS);
 mysql_query("SET NAMES 'latin5'");
 
 if(!is_resource($server))
 {
  exit("Can not connect to database!");
 }
 require("./lib/head.lib.php");
 echo '<?xml version="1.0"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title><?=$lang['META_TITLE'];?></title>
		<meta name="description" content="<?=$lang['META_DESCRIPTION'];?>">
		<meta name="keywords" content="<?=$lang['META_KEYWORDS'];?>">
		<meta http-equiv="Content-Type" content="text/html; charset=<?=$lang['META_CHARSET']; ?>">
		
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/buttons.css"/>
		<link rel="stylesheet" href="css/jquery-ui.css"/>
		
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/loginbox.js"></script>
		<script type="text/javascript" src="js/tinybox.js"></script>
	</head>
	<body>
		<?PHP require("./lib/login.lib.php"); ?>
		<script type="text/javascript" src="./js/wz_tooltip.js"></script>
		<div id="containertop"></div>
		<div id="container">
			<div id="userbar">
				<div class="buttonlist clear">
					<?PHP include("./lib/loginbar.lib.php"); ?>
				</div>
			</div>
			<?PHP include("./lib/navi.lib.php"); ?>
			<div id="content">
				<?PHP
					$includeDir=".".DIRECTORY_SEPARATOR."php".DIRECTORY_SEPARATOR;
					$includeDefault=$includeDir."homepage.php";
		
					if(isset($_GET['content']) && !empty($_GET['content']))
					{
						$_GET['content']=str_replace("\0", '', $_GET['content']);
						$includeFile=basename(realpath($includeDir.$_GET['content'].".php"));
						$includePath=$includeDir.$includeFile;
			
						if(!empty($includeFile) && file_exists($includePath))
						{
							include($includePath);
						}
						else
						{
							include($includeDefault);
						}
					}
					else
					{
						include($includeDefault);
					}
				?>
			</div>
			<div class="seperator"></div>
			<?PHP require("./lib/footer.lib.php"); ?>
		</div>
		<div id="containerbottom"></div>
	</body>
</html>