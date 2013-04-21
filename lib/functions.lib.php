<?PHP
	
	function checkAnum($wert)
	{
		$checkit = preg_match("/^[a-zA-Z0-9]+$/",$wert);
		if($checkit)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
  
	function checkInt($wert)
	{
		$checkit = preg_match("/^[0-9]+$/",$wert);
		
		if($checkit) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function check_empty_position($inID)
	{
		global $server;
		$cmd_find_all_items="SELECT pos,vnum FROM player.item WHERE owner_id='".$inID."' AND window='MALL'";
		$exe_find_all_items=mysql_query($cmd_find_all_items,$server);
		$array_positions=array();
		
		while($array=mysql_fetch_object($exe_find_all_items)) 
		{
      
			$obj_find_size=mysql_fetch_object(mysql_query("SELECT size FROM player.item_proto WHERE vnum='".$array->vnum."'",$server));
			$actual_position=$array->pos;
			
			for($i=1;$i<=$obj_find_size->size;$i++)
			{
				$array_positions[$actual_position]=$array->vnum;
				$actual_position=$actual_position + 5;
			}
		}
		return $array_positions;
	}
  
	function find_possible_position($occupied_pos,$item_size)
	{
		$possible_position=array();
		for($i=0;$i<45;$i++)
		{
			if(empty($occupied_pos[$i]))
			{
				for($y=0;$y<$item_size;$y++)
				{
					$actual_position=$i+($y*5);
					$fit=true;
					
					if(!isset($occupied_pos[$actual_position]) && $actual_position<45)
					{
						$fit=true;
					}
					else
					{
						$fit=false;
						break;
					}
				}
				if($fit) { $possible_position[]=$i; }
			}
		}
		return $possible_position;
	}
	
	function canDo($delay)
	{
		if(!isset($_SESSION['nextDo']))
		{
			$_SESSION['nextDo']=time();
		}
	
		if($_SESSION['nextDo']<=time())
		{
			$_SESSION['nextDo']=time()+$delay;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function list_chars($account_id,$selected)
	{
		global $server;
		$query=mysql_query("SELECT * FROM player.player WHERE account_id='".$account_id."' LIMIT 4",$server);
		while($array=mysql_fetch_array($query))
		{
			if($selected=='')
			{
				echo'<option value="'.$array["name"].'">'.$array["name"].'</option>';
			}
			else
			{
				if($selected==$array["name"])
				{
					echo'<option selected="selected" value="'.$array["name"].'">'.$array["name"].'</option>';
				}
				else
				{
					echo'<option value="'.$array["name"].'">'.$array["name"].'</option>';
				}
			}
		}
	}
	
	function check_image_file($vnum)
	{
		$path='./ah_item_img/'.$vnum.'.png';
		if(file_exists($path))
		{
			$file_name=''.$vnum.'.png';
			return $file_name;
		}
		else
		{
			$replace=substr_replace($vnum, 0, -1, strlen(0)); 
			$path='./ah_item_img/'.$replace.'.png';
			if(file_exists($path))
			{
				$file_name=''.$replace.'.png';
				return $file_name;
			}
			else
			{
				return 'none.png';
			}
		}
	}
	
	function seperate_gold($value)
	{
		return number_format($value);
	}
	
	function create_log($item_id,$what,$seller_name,$seller_descr,$item_name,$vnum,$price)
	{
		global $server;
		$account_id=$_SESSION['user_id'];
		$ip=$_SERVER["REMOTE_ADDR"];
		$date=date("Y-m-d H:i:s",time());
		$command="INSERT INTO auction_house.logs (item_id,account_id,what,seller_name,seller_descr,item_name,vnum,price,ip,date) VALUES ('".$item_id."','".$account_id."','".$what."','".$seller_name."','".$seller_descr."','".$item_name."','".$vnum."','".$price."','".$ip."','".$date."')";
		return mysql_query($command,$server);
	}
	
	function change_gold($who,$value)
	{
		global $server;
		$command="UPDATE auction_house.golds SET value='".$value."' WHERE account_id='".$who."' LIMIT 1";
		return mysql_query($command,$server);
	}
	
	function insert_real_item($id,$pos,$count,$vnum,$socket0,$socket1,$socket2,$socket3,$socket4,$socket5,$attrtype0,$attrvalue0,$attrtype1,$attrvalue1,$attrtype2,$attrvalue2,$attrtype3,$attrvalue3,$attrtype4,$attrvalue4,$attrtype5,$attrvalue5,$attrtype6,$attrvalue6)
	{
		global $server;
		$owner_id=$_SESSION['user_id'];
		$window='MALL';
		$command="INSERT INTO player.item (id,owner_id,window,pos,count,vnum,socket0,socket1,socket2,socket3,socket4,socket5,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6) VALUES ('".$id."','".$owner_id."','".$window."','".$pos."','".$count."','".$vnum."','".$socket0."','".$socket1."','".$socket2."','".$socket3."','".$socket4."','".$socket5."','".$attrtype0."','".$attrvalue0."','".$attrtype1."','".$attrvalue1."','".$attrtype2."','".$attrvalue2."','".$attrtype3."','".$attrvalue3."','".$attrtype4."','".$attrvalue4."','".$attrtype5."','".$attrvalue5."','".$attrtype6."','".$attrvalue6."')";
		return mysql_query($command,$server);
	}
	
	function create_offer($item_id,$seller_name,$seller_descr,$item_name,$size,$count,$vnum,$price,$type,$socket0,$socket1,$socket2,$socket3,$socket4,$socket5,$attrtype0,$attrvalue0,$attrtype1,$attrvalue1,$attrtype2,$attrvalue2,$attrtype3,$attrvalue3,$attrtype4,$attrvalue4,$attrtype5,$attrvalue5,$attrtype6,$attrvalue6)
	{
		global $server;
		$account_id=$_SESSION['user_id'];
		$command="INSERT INTO auction_house.items (item_id,account_id,seller_name,seller_descr,item_name,size,count,vnum,price,type,socket0,socket1,socket2,socket3,socket4,socket5,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6) VALUES ('".$item_id."','".$account_id."','".$seller_name."','".$seller_descr."','".$item_name."','".$size."','".$count."','".$vnum."','".$price."','".$type."','".$socket0."','".$socket1."','".$socket2."','".$socket3."','".$socket4."','".$socket5."','".$attrtype0."','".$attrvalue0."','".$attrtype1."','".$attrvalue1."','".$attrtype2."','".$attrvalue2."','".$attrtype3."','".$attrvalue3."','".$attrtype4."','".$attrvalue4."','".$attrtype5."','".$attrvalue5."','".$attrtype6."','".$attrvalue6."')";
		return mysql_query($command,$server);
	}
	
	function insert_item_storehouse($item_id,$account_id,$seller_name,$item_name,$size,$count,$vnum,$socket0,$socket1,$socket2,$socket3,$socket4,$socket5,$attrtype0,$attrvalue0,$attrtype1,$attrvalue1,$attrtype2,$attrvalue2,$attrtype3,$attrvalue3,$attrtype4,$attrvalue4,$attrtype5,$attrvalue5,$attrtype6,$attrvalue6)
	{
		global $server;
		$account_id=$_SESSION['user_id'];
		$command="INSERT INTO auction_house.store (item_id,account_id,seller_name,item_name,size,count,vnum,socket0,socket1,socket2,socket3,socket4,socket5,attrtype0,attrvalue0,attrtype1,attrvalue1,attrtype2,attrvalue2,attrtype3,attrvalue3,attrtype4,attrvalue4,attrtype5,attrvalue5,attrtype6,attrvalue6) VALUES ('".$item_id."','".$account_id."','".$seller_name."','".$item_name."','".$size."','".$count."','".$vnum."','".$socket0."','".$socket1."','".$socket2."','".$socket3."','".$socket4."','".$socket5."','".$attrtype0."','".$attrvalue0."','".$attrtype1."','".$attrvalue1."','".$attrtype2."','".$attrvalue2."','".$attrtype3."','".$attrvalue3."','".$attrtype4."','".$attrvalue4."','".$attrtype5."','".$attrvalue5."','".$attrtype6."','".$attrvalue6."')";
		return mysql_query($command,$server);
	}
	
	function update_offer($id,$seller_name,$seller_descr,$price,$type)
	{
		global $server;
		$account_id=$_SESSION['user_id'];
		$command="UPDATE auction_house.items SET seller_name='".$seller_name."', seller_descr='".$seller_descr."', price='".$price."', type='".$type."' WHERE account_id='".$account_id."' AND id='".$id."' LIMIT 1";
		return mysql_query($command,$server);
	}
	
	function remove_offer($id,$account_id)
	{
		global $server;
		$command="DELETE FROM auction_house.items WHERE account_id='".$account_id."' AND id='".$id."' LIMIT 1";			
		return mysql_query($command,$server);
	}
	
	function remove_item_storehouse($id,$account_id)
	{
		global $server;
		$command="DELETE FROM auction_house.store WHERE account_id='".$account_id."' AND id='".$id."' LIMIT 1";			
		return mysql_query($command,$server);
	}
	
?>