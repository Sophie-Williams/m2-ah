<?	if(!$_SESSION['user_id']=="") { ?>
<?PHP
	echo $lang['TIT_EDIT_OFFER'];
	if(isset($_GET['id']) && checkInt($_GET['id']))
	{
		$whereisitems="SELECT * FROM auction_house.items WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."' AND id='".mysql_real_escape_string($_GET['id'])."' LIMIT 1";
		$executeitems=mysql_query($whereisitems,$server);
		$getobjects=mysql_fetch_object($executeitems);
		
		if(mysql_num_rows($executeitems)>0)
		{
			?>
			<form method="post" action="">
				<table>
					<tr>
						<th>
							<?=$lang['COM_ITEM_NAME'];?>
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
							<input type="text" maxlength="10" name="item_price" value="<?=$getobjects->price?>" onfocus="if(this.value=='<?=$getobjects->price?>') this.value='';" onblur="if(this.value=='') this.value='<?=$getobjects->price?>';" />
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_ITEM_OPTION'];?>
						</th>
						<td>
							<div>
								<select name="option" > 
									<? 
									if($getobjects->type==1)
									{
										?>
										<option selected="selected" value="1"><?=$lang['COM_ITEM_OPTION_TRUE'];?></option> 
										<option value="0"><?=$lang['COM_ITEM_OPTION_FALSE'];?></option>
										<?
									}
									else
									{
										?>
										<option value="1"><?=$lang['COM_ITEM_OPTION_TRUE'];?></option> 
										<option selected="selected" value="0"><?=$lang['COM_ITEM_OPTION_FALSE'];?></option>
										<?
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['GLO_CHOOSE_SELLER'];?>
						</th>
						<td>
							<select name="char">
								<?=list_chars($getobjects->account_id,$getobjects->seller_name);?>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_ITEM_DESCRIPTION'];?>
						</th>
						<td>
							<input type="text" maxlength="50" name="item_descr" value="<?=$getobjects->seller_descr?>" onfocus="if(this.value=='<?=$getobjects->seller_descr?>') this.value='';" onblur="if(this.value=='') this.value='<?=$getobjects->seller_descr?>';" />
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_CAPTCHA'];?>
						</th>
						<td>
							<img src="./captcha/captcha.php" title="Captcha"/>
						</td>
					</tr>
					<tr>
						<th>
							<?=$lang['COM_CAPTCHA_ANSWER'];?>
						</th>
						<td>
							<input data-hotkey="/ s" placeholder="<?=$lang['COM_CAPTCHA_ANSWER'];?>" type="text" maxlength="8" name="captcha" />
						</td>
					</tr>
					<tr>
						<th colspan="2">
							<input type="hidden" name="item_id" value="<?=$getobjects->id?>" />
							<div id="b_sp">
								<input type="submit" class="edit" name="edit_me" value="Edit." /> &nbsp;&nbsp; <a href="javascript:history.back()" /><button class="cancel">CANCEL</button></a>
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
	if(isset($_POST["edit_me"]) && $_POST["edit_me"]=="Edit.")
	{
		if(canDo($delay))
		{
			
			$price=mysql_real_escape_string($_POST["item_price"]);
			$description=mysql_real_escape_string(trim($_POST["item_descr"]));
			$char=mysql_real_escape_string($_POST['char']);
			$option=mysql_real_escape_string($_POST['option']);
			
			$whereisitems="SELECT * FROM auction_house.items WHERE account_id='".mysql_real_escape_string($_SESSION['user_id'])."' AND id='".mysql_real_escape_string($_POST["item_id"])."' LIMIT 1";
			$executeitems=mysql_query($whereisitems,$server);
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
								create_log($getobjects->item_id,'EDIT_OFFER',$char,$getobjects->seller_descr,$getobjects->item_name,$getobjects->vnum,$getobjects->price);
								update_offer($_POST["item_id"],$char,$description,$price,$option);
								echo'<meta http-equiv="refresh" content="1" />';
								echo $lang['GLO_PROCESS_SUCCESS'];
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