	<?PHP
	if(isset($_POST['submit']) && ($_POST['submit']=="login" || $_POST['submit']=="LOGIN")) 
	{
		if(!empty($_POST['id']) && !empty($_POST['pass']) && checkAnum($_POST['id']) && checkAnum($_POST['pass'])) 
		{
			$exe_char_command=mysql_query("SELECT id,login,email FROM account.account WHERE login LIKE '".mysql_real_escape_string($_POST['id'])."' AND password=PASSWORD('".mysql_real_escape_string($_POST['pass'])."') LIMIT 1",$server);
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
				
				$update=mysql_query("UPDATE account.account SET web_ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."' WHERE id='".mysql_real_escape_string($get_details->id)."'",$server);
				?>
				<meta http-equiv='refresh' content='2;'>
				<script>TINY.box.show({ html:'<?php echo $lang['GLO_TIP_SUCC']; ?>',animate:false,close:false,mask:false,boxid:'true',autohide:4,top:-14,left:-17})</script>
				<?
			}
			else
			{
				?>
				<meta http-equiv='refresh' content='2;'>
				<script>TINY.box.show({ html:'<?php echo $lang['GLO_TIP_ERR1']; ?>',animate:false,close:false,mask:false,boxid:'false',autohide:4,top:-14,left:-17})</script>
				<?
			}
		}
		else
		{
			?>
			<meta http-equiv='refresh' content='2;'>
			<script>TINY.box.show({ html:'<?php echo $lang['GLO_TIP_ERR2']; ?>',animate:false,close:false,mask:false,boxid:'false',autohide:4,top:-14,left:-17})</script>
			<?
		}
	}
	?>