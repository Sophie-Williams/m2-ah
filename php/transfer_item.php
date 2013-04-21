<?	if(!$_SESSION['user_id']=="") { ?>
<?PHP
	echo $lang['TIT_TRANSFER_ITEM'];
	if(isset($_GET['id']) && checkInt($_GET['id']))
	{
		if(canDo($delay))
		{
			$whereisitems="SELECT * FROM auction_house.store WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."' AND id='".mysql_real_escape_string($_GET['id'])."' LIMIT 1";
			$executeitems=mysql_query($whereisitems,$server);
			$getobjects=mysql_fetch_object($executeitems);
			
			if(mysql_num_rows($executeitems)>0)
			{
				create_log($getobjects->item_id,'TRANSFER_ITEM_TO_INGAME',$getobjects->seller_name,'-',$getobjects->item_name,$getobjects->vnum,'-');
				insert_real_item($getobjects->item_id,$possible_position[0],$getobjects->count,$getobjects->vnum,$getobjects->socket0,$getobjects->socket1,$getobjects->socket2,$getobjects->socket3,$getobjects->socket4,$getobjects->socket5,$getobjects->attrtype0,$getobjects->attrvalue0,$getobjects->attrtype1,$getobjects->attrvalue1,$getobjects->attrtype2,$getobjects->attrvalue2,$getobjects->attrtype3,$getobjects->attrvalue3,$getobjects->attrtype4,$getobjects->attrvalue4,$getobjects->attrtype5,$getobjects->attrvalue5,$getobjects->attrtype6,$getobjects->attrvalue6);
				remove_item_storehouse($getobjects->id,$getobjects->account_id);
				echo'<meta http-equiv="refresh" content="1;URL=index.php?content=storehouse" />';
				echo $lang['GLO_PROCESS_SUCCESS'];
			}
			else
			{
				echo $lang['ERR_ID_NOT_FOUND'];
			}
		}
		else
		{
			echo $lang['ERR_DELAY_TIME'];
		}
	}
	else
	{
		echo $lang['ERR_UNKNOWN_COMMAND'];
	}
?>
<? } else { echo $lang['ERR_LOGIN_NEEDED']; } ?>