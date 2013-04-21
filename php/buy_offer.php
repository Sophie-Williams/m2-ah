<?	if(!$_SESSION['user_id']=="") { ?>
<?PHP
	echo $lang['TIT_BUY_OFFER'];
	if(isset($_GET['id']) && checkInt($_GET['id']))
	{
		if(canDo($delay))
		{
			
			$whereisitems="SELECT * FROM auction_house.items WHERE id='".mysql_real_escape_string($_GET['id'])."' LIMIT 1";
			$executeitems=mysql_query($whereisitems,$server);
			$getobjects=mysql_fetch_object($executeitems);
			
			if(mysql_num_rows($executeitems)>0)
			{
				if($_SESSION['user_golds']>=$getobjects->price)
				{
					if(!$_SESSION['user_id']==$getobjects->account_id)
					{
						
						$possible_position=find_possible_position(check_empty_position($_SESSION['user_id']),$getobjects->size);
						
						if(!empty($possible_position)) 
						{
							create_log($getobjects->item_id,'BUY_OFFER',$getobjects->seller_name,$getobjects->seller_descr,$getobjects->item_name,$getobjects->vnum,$getobjects->price);
							insert_real_item($getobjects->item_id,$possible_position[0],$getobjects->count,$getobjects->vnum,$getobjects->socket0,$getobjects->socket1,$getobjects->socket2,$getobjects->socket3,$getobjects->socket4,$getobjects->socket5,$getobjects->attrtype0,$getobjects->attrvalue0,$getobjects->attrtype1,$getobjects->attrvalue1,$getobjects->attrtype2,$getobjects->attrvalue2,$getobjects->attrtype3,$getobjects->attrvalue3,$getobjects->attrtype4,$getobjects->attrvalue4,$getobjects->attrtype5,$getobjects->attrvalue5,$getobjects->attrtype6,$getobjects->attrvalue6);
							
							$new_golds=(($_SESSION['user_golds'])-($getobjects->price));
							change_gold($_SESSION['user_id'],$new_golds);
							change_gold($getobjects->account_id,$getobjects->price);
							
							remove_offer($getobjects->id,$getobjects->account_id);
							
							echo'<meta http-equiv="refresh" content="1;URL=index.php?content=offers" />';
							echo $lang['GLO_PROCESS_SUCCESS'];
							
						}
						else
						{
							echo $lang['ERR_STOREHOUSE_FULL'];
						}
					}
					else
					{
						echo $lang['ERR_SELLER_N_BUYER_SAME'];
					}
				}
				else
				{
					echo $lang['ERR_NOT_ENOUGH_GOLD'];
				}
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