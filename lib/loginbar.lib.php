<?PHP
	if($_SESSION['user_id']=="") 
	{
		?>
		<a href="#loginbox" name="loginbox" class="button grey"><?=$lang['GLO_LOGIN'];?></a>
		<?
	}
	else
	{
		?>
		<a href="index.php?content=storehouse" class="button grey left"><?=$lang['GLO_STOREHOUSE'];?></a>
		<a href="index.php?content=my_offers" class="button grey middle"><?=$lang['GLO_MYOFFERS'];?>&nbsp;[<?=$_SESSION['user_offers'];?>]</a>
		<a href="index.php?content=offers" class="button grey middle"><?=$lang['GLO_OFFERS'];?></a>
		<a href="index.php?content=logout" class="button grey right"><?=$lang['GLO_EXIT'];?></a>
		<?
		if($_SESSION['user_golds']=="" || $_SESSION['user_golds']=="0")
		{
			echo'<span class="leftcoins_low">'.$lang['GLO_GOLD_NONE'].'</span>';
		}
		else
		{
			if($_SESSION['user_golds']>="500000000" && $_SESSION['user_golds']<="500000000")
			{
				echo'<span class="leftcoins_low">'.$lang['GLO_GOLD'].'</span>';
			}
			elseif($_SESSION['user_golds']>="1000000000" && $_SESSION['user_golds']<="1000000000")
			{
				echo'<span class="leftcoins_med">'.$lang['GLO_GOLD'].'</span>';
			}
			elseif($_SESSION['user_golds']>="1500000000")
			{
				echo'<span class="leftcoins_hig">'.$lang['GLO_GOLD'].'</span>';
			}
			else
			{
				echo'<span class="leftcoins_low">'.$lang['GLO_GOLD'].'</span>';
			}
		}
		?>
		
		<div class="flag"><a href="index.php?lang=tr"><img src="./lang/img/tr.png" title="<?=$lang['GLO_CHANGE_LANG'];?> TR" /></a></div>
		<div class="flag"><a href="index.php?lang=en"><img src="./lang/img/en.png" title="<?=$lang['GLO_CHANGE_LANG'];?> EN" /></a></div>

		
		<div style="display:none;" id="dialog-confirm_exit" title="<?=$lang['GLO_EXIT_TIT'];?>">
			<div class="dialog"><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><?=$lang['GLO_EXIT_QUEST'];?></div>
		</div>
		<?
	}
?>
<div id="loginbox_window">
	<form id="loginbox" class="window" autocomplete="off" action="index.php?content=index" method="POST">
		<div class="d-header">
			<input type="text" class="text ui-widget-content ui-corner-all" name="id" maxlength="16" onfocus="if(this.value=='<?=$lang['GLO_USERNAME'];?>') this.value='';" onblur="if(this.value=='') this.value='<?=$lang['GLO_USERNAME'];?>';" value="<?=$lang['GLO_USERNAME'];?>">
			<input type="password" class="text ui-widget-content ui-corner-all" name="pass" maxlength="16" onfocus="if(this.value=='Password') this.value='';" onblur="if(this.value=='') this.value='Password';" value="Password">
		</div>
		<div class="d-blank"></div>
		<div class="d-login">
			<input type="submit" value="LOGIN" name="submit" id="submit_btn">
		</div>
	</form>
</div>
<div id="loginbox_mask"></div>
