<script>
function buy_item(id) {
	$( "#dialog-confirm_buy" ).dialog({
		
		resizable:false,
		height:200,
		width:340,
		modal:true,
		buttons: {
			"<?=$lang['GLO_BUY'];?>": function() {
				window.location.replace("index.php?content=buy_offer&id=" + id);
			},
			"<?=$lang['GLO_CANCEL'];?>": function() {
				$(this).dialog("close");
			}
		}
	});
}
</script>
<div style="display:none;" id="dialog-confirm_buy" title="<?=$lang['COM_TRANSFER_CONFIRMATION_TIT'];?>">
	<div class="dialog">
		<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><?=$lang['COM_BUY_ITEM_QUEST'];?>
	</div>
</div>
<?=$lang['TIT_BUY_OFFER'];?>
<? if(!$_SESSION['user_id']=="") {echo $lang['COM_BUY_ITEM_DESCR'];} else {echo $lang['COM_BUY_ITEM_GUEST'];}?>
<?PHP
	
	$executeme=mysql_query("SELECT * FROM auction_house.items ORDER BY id DESC",$server);
	
	if(mysql_num_rows($executeme)>0)
	{
		?>
		<table>
			<th><?=$lang['COM_ITEM_ID'];?></th>
			<th><?=$lang['COM_ITEM_NAME'];?></th>
			<th><?=$lang['COM_ITEM_COUNT'];?></th>
			<th><?=$lang['COM_ITEM_SELLER_NAME'];?></th>
			<th><?=$lang['COM_ITEM_SELLER_DESC'];?></th>
			<th><?=$lang['COM_ITEM_PRICE'];?></th>
			<?
			while($array=mysql_fetch_array($executeme))
			{
			?>
				<?
				if(!$_SESSION['user_id']=="")
				{
					if(!$_SESSION['user_id']==$array["account_id"])
					{
						if(($_SESSION['user_golds'])>=$array["price"])
						{
							echo'<tr align="middle" onclick="buy_item('.$array["id"].')" style="cursor:pointer;cursor:hand">';
						}
						else
						{
							echo'<tr align="middle">';
						}
					}
					else
					{
						echo'<tr align="middle">';
					}
				}
				else
				{
					echo'<tr align="middle">';
				}
				?>
					<td>
						<span class="offercount"># <?=$array["id"]?></span>
					</td>
					<td onmouseover="Tip('<table cellspacing=5><tr><th colspan=2 style=font-size:8pt><center><?=$array["item_name"]?></center></th></tr><tr><th colspan=2 style=font-size:8pt><center><? echo'<img src=./ah_item_img/'.check_image_file($array["vnum"]).' title='.$array["item_name"].' alt='.$array["item_name"].'/>' ?></center></th></tr><? if($array["socket0"]==0 || $array["socket0"]==1) {echo'<tr><th colspan=2 style=font-size:8pt;background:#'.$row_color_stone.'><center>'.$itemSteine[$array["socket0"]].'</center></th></tr>';} ?><? if($array["socket1"]==0 || $array["socket1"]==1) {echo'<tr><th colspan=2 style=font-size:8pt;background:#'.$row_color_stone.'><center>'.$itemSteine[$array["socket1"]].'</center></th></tr>';} ?><? if($array["socket2"]==0 || $array["socket2"]==1) {echo'<tr><th colspan=2 style=font-size:8pt;background:#'.$row_color_stone.'><center>'.$itemSteine[$array["socket2"]].'</center></th></tr>';} ?><? if($array["attrtype0"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype0"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue0"].'</center></td></tr>';} ?><? if($array["attrtype1"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype1"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue1"].'</center></td></tr>';} ?><? if($array["attrtype2"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype2"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue2"].'</center></td></tr>';} ?><? if($array["attrtype3"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype3"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue3"].'</center></td></tr>';} ?><? if($array["attrtype4"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype4"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue4"].'</center></td></tr>';} ?><? if($array["attrtype5"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype5"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue5"].'</center></td></tr>';} ?><? if($array["attrtype6"]>=1) {echo'<tr><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$itemBoni[$array["attrtype6"]].'</center></td><td style=font-size:8pt;background:#'.$row_color_bonus.'><center>'.$array["attrvalue6"].'</center></td></tr>';} ?></table>')" onmouseout="UnTip()">
						<span class="offeritmname"><?=$array["item_name"]?></span>
						<div class="item_image_effect"><img src="./ah_item_img/<?=check_image_file($array["vnum"])?>" title="<?=$array["item_name"]?>" alt="<?=$array["item_name"]?>"/></div>
					</td>
					<td>
						<span class="offercount"><?if($array["count"]>1){echo''.$array["count"].'';} else echo'-';?></span>
					</td>
					<td>
						<span class="offername"><?if($array["type"]==1) {echo ''.$array["seller_name"].'';} else {echo ''.$lang['GLO_HIDE'].'';}?></span>
					</td>
					<td>
						<span class="offerdescr"><?=$array["seller_descr"]?></span>
					</td>
					<td>
						<span class="offerprice"><?=seperate_gold($array["price"])?>&nbsp;<?=$lang['GLO_GOLD_NAME']?></span>
					</td>
				</tr>
				<?
			}
			?>
		</table>
		<?
	}
	else
	{
		echo $lang['ERR_THERE_IS_NO_ITEM'];
	}
?>