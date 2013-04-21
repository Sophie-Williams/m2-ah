<?PHP	
	
	if(isset($_SESSION['lang']) && $_SESSION['lang']=="tr")
	{
		$_SESSION["lang"]="tr";
		include_once './lang/lang.tr.php';
	}
	elseif(isset($_SESSION['lang']) && $_SESSION['lang']=="en")
	{
		$_SESSION["lang"]="en";
		include_once './lang/lang.en.php';
	}
	
	if(empty($_SESSION['user_id']))
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_email']);
		unset($_SESSION['user_golds']);
		unset($_SESSION['user_offers']);
	}
	else
	{
		$exe_char_command=mysql_query("SELECT id,login,email FROM account.account WHERE web_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' AND id='".mysql_real_escape_string($_SESSION['user_id'])."' LIMIT 1",$server);
		$get_details=mysql_fetch_object($exe_char_command);
		$get_coins=mysql_fetch_object(mysql_query("SELECT ah_golds FROM account.account WHERE id='".$get_details->id."' LIMIT 1",$server));
		$offer_counts=mysql_num_rows(mysql_query("SELECT * FROM auction_house.items WHERE account_id='".$get_details->id."'",$server));
		
		if(mysql_num_rows($exe_char_command)>0)
		{
			$_SESSION['user_id']=$get_details->id;
			$_SESSION['user_name']=$get_details->login;
			$_SESSION['user_email']=$get_details->email;
			$_SESSION['user_golds']=$get_coins->ah_golds;
			$_SESSION['user_offers']=$offer_counts;
		}
		else
		{
			unset($_SESSION['user_id']);
			unset($_SESSION['user_name']);
			unset($_SESSION['user_email']);
			unset($_SESSION['user_golds']);
			unset($_SESSION['user_offers']);
		}
	}
	
?>