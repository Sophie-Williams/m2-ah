<?	if(!$_SESSION['user_id']=="") { ?>
<script>
function choose(id) {
	$( "#dialog-choose" ).dialog({
		
		resizable:false,
		height:300,
		width:390,
		modal:true,
		buttons: {
			"<?php echo $lang['GLO_CREATE_OFFER']; ?>": function() {
				window.location.replace("index.php?content=create_offer&id=" + id);
			},
			"<?php echo $lang['GLO_TRANSFER_ITEM']; ?>": function() {
				window.location.replace("index.php?content=transfer_item&id=" + id);
			},
			"<?php echo $lang['GLO_CANCEL']; ?>": function() {
				$(this).dialog("close");
			}
		}
	});
}
</script>
<div style="display:none;" id="dialog-choose" title="<?php echo $lang['COM_STOREHOUSE_TIT']; ?>">
	<div class="dialog">
		<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
		<?php echo $lang['COM_STOREHOUSE_QUEST1']; ?>
	</div>
	<div class="dialog">
		<?php echo $lang['COM_STOREHOUSE_QUEST2']; ?>
	</div>
	<div class="dialog">
		<?php echo $lang['COM_STOREHOUSE_QUEST3']; ?>
	</div>
</div>
<?php echo $lang['TIT_STOREHOUSE']; ?>
<?php echo $lang['COM_STOREHOUSE_DESCR']; ?>
<?PHP
	
	$whereisitems="SELECT * FROM auction_house.store WHERE account_id='".$_SESSION['user_id']."' ORDER BY id DESC";
	$executeme=mysql_query($whereisitems,$server);
	
	if(mysql_num_rows($executeme)>0)
	{
		?>
		<table>
			<tr>
			<th><?php echo $lang['COM_ITEM_ID']; ?></th>
			<th><?php echo $lang['COM_ITEM_NAME']; ?></th>
			<th><?php echo $lang['COM_ITEM_COUNT']; ?></th>
			<th><?php echo $lang['COM_ITEM_SELLER_NAME']; ?></th>
			</tr>
			<?
			while($array=mysql_fetch_array($executeme)) {
				?>
				<tr align="middle" onclick="choose(<?=$array["id"]?>)" style="cursor:pointer;cursor:hand">
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
						<span class="offername"><?=$array["seller_name"]?></span>
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
<? } else { echo $lang['ERR_LOGIN_NEEDED']; } ?>