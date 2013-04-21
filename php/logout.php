<?	if(!$_SESSION['user_id']=="") { ?>
<?PHP
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_golds']);
	unset($_SESSION['user_offers']);
?>
<?=$lang['COM_LOG_OUT_REDI'];?>
<?=$lang['COM_LOG_OUT']?>
<meta http-equiv="refresh" content="2; URL=index.php">
<? } else { echo $lang['COM_LOG_OUT_REDI']; echo $lang['ERR_LOGIN_MISTAKE'];} ?>