<?	if(!$_SESSION['user_id']=="") { ?>
<script language="JavaScript">
function form_control() {
f=document.forms['offer_form'];
if (f.item_price.value == '')
{
TINY.box.show({html:'<?php echo $lang['ERR_JS_PRICE_TYPE']; ?>',animate:true,close:false,mask:true,boxid:'false',autohide:3,top:-14,left:-17})
f.item_price.focus();f.item_price.className='false';
}
else if (f.item_descr.value == '')
{
TINY.box.show({html:'<?php echo $lang['ERR_JS_DESCR_TYPE']; ?>',animate:true,close:false,mask:true,boxid:'false',autohide:3,top:-14,left:-17})
f.item_descr.focus();f.item_descr.className='false';
}
else if (f.captcha.value == '')
{
TINY.box.show({html:'<?php echo $lang['ERR_JS_CAPTCHA_TYPE']; ?>',animate:true,close:false,mask:true,boxid:'false',autohide:3,top:-14,left:-17})
f.captcha.focus();f.captcha.className='false';
}
else return true;
return false;}
</script>
<?PHP
	echo $lang['TIT_CREATE_OFFER'];
	if(isset($_GET['id']) && checkInt($_GET['id']))
	{
		$whereisitems="SELECT * FROM auction_house.store WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."' AND id='".mysql_real_escape_string($_GET['id'])."' LIMIT 1";
		$executeitems=mysql_query($whereisitems,$server);
		$getobjects=mysql_fetch_object($executeitems);
		
		if(mysql_num_rows($executeitems)>0)
		{
			?>
			<form method="post" onsubmit="return form_control();" action="" name="offer_form">
				<table>
					<tr>
						<th>
							<?=$lang['COM_ITEM_NAME']?>
						</th>
						<td>
							<span class="offeritmname"><?=$getobjects->item_name?></span>
							<div class="item_image_effect"><img src="./ah_item_img/<?=check_image_file($getobjects->vnum)?>" title="<?=$getobjects->item_name?>" alt="<?=$getobjects->item_name?>"/></div>
						</td>
					</tr>					
					<tr>
						<th>
							<?=$lang['COM_ITEM_PRICE'];?>
						</th>
						<td>
							<input type="text" maxlength="10" name="item_price" />
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_ITEM_OPTION'];?>
						</th>
						<td>
							<select name="option"> 
								<option selected="selected" value="1"><?=$lang['COM_ITEM_OPTION_TRUE'];?></option> 
								<option value="0"><?=$lang['COM_ITEM_OPTION_FALSE'];?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['GLO_CHOOSE_SELLER'];?>
						</th>
						<td>
							<select name="char">
								<?=list_chars($getobjects->account_id);?>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_ITEM_DESCRIPTION'];?>
						</th>
						<td>
							<input type="text" maxlength="50" name="item_descr" />
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_CAPTCHA'];?>
						</th>
						<td>
							<img src="./captcha/captcha.php" title="<?=$lang['GLO_CAPTCHA']?>"/>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_CAPTCHA_ANSWER'];?>
						</th>
						<td>
							<input type="text" maxlength="8" name="captcha" />
						</td>
					</tr>
					<tr>
						<th colspan="2">
							<input type="hidden" name="item_id" value="<?=$getobjects->id?>" />
							<div id="b_sp">
								<input type="submit" class="create" name="create_me" value="Create." />&nbsp;&nbsp;<a href="index.php?content=storehouse" /><button class="cancel">CANCEL</button></a>
							</div>
						</th>
					</tr>
				</table>
			</form>
			<?PHP
		}
		else
		{
			echo $lang['ERR_ID_NOT_FOUND'];
		}
	}
	else
	{
		echo $lang['ERR_UNKNOWN_COMMAND'];
	}
	if(isset($_POST["create_me"]) && $_POST["create_me"]=="Create.") 
	{
		if(canDo($delay))
		{
			$price=mysql_real_escape_string($_POST["item_price"]);
			$description=mysql_real_escape_string(trim($_POST["item_descr"]));
			$char=mysql_real_escape_string($_POST['char']);
			$option=mysql_real_escape_string($_POST['option']);
			
			$executeitems=mysql_query("SELECT * FROM auction_house.store WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."' AND id='".mysql_real_escape_string($_POST["item_id"])."' LIMIT 1",$server);
			$getobjects=mysql_fetch_object($executeitems);
			
			if(mysql_num_rows($executeitems)>0)
			{
				if(($price != "") && (checkInt($price)))
				{
					if(($description != "") && (strlen($description) <= 50))
					{
						if($price < 1999999999)
						{
							if($_POST['captcha']==$_SESSION['captcha_id']) 
							{
								$find_items=mysql_query("SELECT * FROM auction_house.items WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."'",$server);
								
								if(mysql_num_rows($find_items)<=$offer_limit)
								{
									create_log($getobjects->item_id,'CREATE_OFFER',$getobjects->seller_name,$description,$getobjects->item_name,$getobjects->vnum,$price);
									create_offer($getobjects->item_id,$char,$description,$getobjects->item_name,$getobjects->size,$getobjects->count,$getobjects->vnum,$price,$option,$getobjects->socket0,$getobjects->socket1,$getobjects->socket2,$getobjects->socket3,$getobjects->socket4,$getobjects->socket5,$getobjects->attrtype0,$getobjects->attrvalue0,$getobjects->attrtype1,$getobjects->attrvalue1,$getobjects->attrtype2,$getobjects->attrvalue2,$getobjects->attrtype3,$getobjects->attrvalue3,$getobjects->attrtype4,$getobjects->attrvalue4,$getobjects->attrtype5,$getobjects->attrvalue5,$getobjects->attrtype6,$getobjects->attrvalue6);
									remove_item_storehouse($getobjects->id,$getobjects->account_id);
									echo'<meta http-equiv="refresh" content="1;URL=index.php?content=offers" />';
									echo $lang['GLO_PROCESS_SUCCESS'];
								}
								else
								{
									echo $lang['ERR_OFFER_LIMIT_REACHED'];
								}
							}
							else
							{
								echo $lang['ERR_FALSE_CAPTCHA'];
							}
						}
						else
						{
							echo $lang['ERR_PRICE_LIMIT'];
						}
					}
					else
					{
						echo $lang['ERR_DESCRIPTION_TYPE'];
					}
				}
				else
				{
					echo $lang['ERR_PRICE_TYPE'];
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
?>
<? } else { echo $lang['ERR_LOGIN_NEEDED']; } ?>