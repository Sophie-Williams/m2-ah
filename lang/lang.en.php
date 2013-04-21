<?PHP
	
	/*
	------------------
	Language: English
	------------------
	*/
	
	$lang=array();
	
	// META CONFIGS
	$lang['META_TITLE']='Auction House - TestM2';
	$lang['META_DESCRIPTION']='This is TestM2 Auction House!';
	$lang['META_KEYWORDS']='auction,house,metin2,etc';
	$lang['META_CHARSET']='UTF-8';
	
	// GLOBAL COMMENTS
	$lang['GLO_LOGIN']='Login';
	$lang['GLO_STOREHOUSE']='Item Storehouse';
	$lang['GLO_MYOFFERS']='My Available Offers';
	$lang['GLO_SETTINGS']='Settings';
	$lang['GLO_EXIT']='Exit';
	$lang['GLO_EXIT_TIT']='Confirmation';
	$lang['GLO_EXIT_QUEST']='Do you want to exit?';
	$lang['GLO_USERNAME']='User Name';
	$lang['GLO_MAIN_SITE']='Main Site';
	$lang['GLO_HOME_PAGE']='Home Page';
	$lang['GLO_OFFERS']='Offers';
	$lang['GLO_PROCESS_SUCCESS']='<p>Process was success! Redirecting...</p>';
	$lang['GLO_REDIRECTING']='<p>Redirecting...</p>';
	$lang['GLO_CREATE_OFFER']='Create Offer';
	$lang['GLO_TRANSFER_ITEM']='Transfer Item';
	$lang['GLO_CAPTCHA']='Captcha';
	$lang['GLO_CANCEL']='Cancel';
	$lang['GLO_BUY']='Buy';
	$lang['GLO_TRANSFER']='Transfer [Remove Offer]';
	$lang['GLO_EDIT']='Edit';
	$lang['GLO_GOLD_NAME']='Gold.';
	$lang['GLO_CHOOSE_SELLER']='Choose A Seller Name';
	$lang['GLO_HIDE']='[Hidden]';
	
	$lang['GLO_GOLD_NONE']='You do not have <u>any</u> gold.';
	$lang['GLO_GOLD']='You have <u>'.seperate_gold($_SESSION['user_golds']).'</u> golds in your account.';
	
	$lang['GLO_TIP_SUCC']='You successfully logged in!';
	$lang['GLO_TIP_ERR1']='Please check your username or password!';
	$lang['GLO_TIP_ERR2']='Username or Password can not be empty!';
	
	// PAGE TITLES
	$lang['TIT_CREATE_OFFER']='<h1>Auction House - Create Offer</h1>';
	$lang['TIT_EDIT_OFFER']='<h1>Auction House - Edit Offer Properties</h1>';
	$lang['TIT_BUY_OFFER']='<h1>Auction House - Buy Offer</h1>';
	$lang['TIT_ACTIVE_OFFERS']='<h1>Auction House - My Active Offers</h1>';
	$lang['TIT_TRANSFER_ITEM']='<h1>Auction House - Transfer Item</h1>';
	$lang['TIT_STOREHOUSE']='<h1>Auction House - Transfer Item</h1>';
	
	// PAGE COMMENTS
		// LOG OUT
		$lang['COM_LOG_OUT_REDI']='<h1>Log Out</h1>';
		$lang['COM_LOG_OUT']='<p>You have successfully logged out. Redirecting...</p>';
		
		// MY OFFERS
		$calc_offers=($offer_limit)-($_SESSION['user_offers']);
		$lang['COM_TRANSFER_CONFIRMATION_TIT']='Confirmation';
		$lang['COM_TRANSFER_CONFIRMATION_DES']='What do you want to for this offer?';
		$lang['COM_ACTIVE_OFFERS_DESCRIPTION']='<p>Click item row for transfer back item.(Storehouse)<br>You can give up to <span class="offercount">'.$offer_limit.'</span> offers.<br><span class="offercount">'.$calc_offers.'</span> units available right now.</p>';
		
		// OFFERS
		$lang['COM_BUY_ITEM_DESCR']='<p>For buy an item, just click item row and confirm buying.<br>If you do not have enough gold, you can&#39;t click row.</p>';
		$lang['COM_BUY_ITEM_GUEST']='<p>Guests only can see items, can&#39;t buy anything.</p>';
		$lang['COM_BUY_ITEM_QUEST']='Are you sure want to buy this item?';
		
		// STORE HOUSE
		$lang['COM_STOREHOUSE_DESCR']='<p>You can transfer item to storehouse from ingame npc. You can start offer or transfer back your item. Just click rows.</p>';
		$lang['COM_STOREHOUSE_QUEST1']='What do you want for this item?';
		$lang['COM_STOREHOUSE_QUEST2']='> You can start an offer with this item.';
		$lang['COM_STOREHOUSE_QUEST3']='> You can transfer back this item to your ingame storehouse.';
		$lang['COM_STOREHOUSE_TIT']='Confirmation';
	
	// ERRORS
	$err_class='err';
	$lang['ERR_LOGIN_NEEDED']='<p class="'.$err_class.'">You must login for see this page.</p>';
	$lang['ERR_ID_NOT_FOUND']='<p class="'.$err_class.'">Specified ID could not found!</p>';
	$lang['ERR_DELAY_TIME']='<p class="'.$err_class.'">You must wait '.$delay.' seconds for next request!</p>';
	$lang['ERR_UNKNOWN_COMMAND']='<p class="'.$err_class.'">You have entered an incorrect command!</p>';
	$lang['ERR_FALSE_CAPTCHA']='<p class="'.$err_class.'">You have entered an incorrectly captcha!</p>';
	$lang['ERR_PRICE_TYPE']='<p class="'.$err_class.'">Price can not be empty or must be number not a letter!</p>';
	$lang['ERR_PRICE_LIMIT']='<p class="'.$err_class.'">Price can not be bigger than 1,9KKK</p>';
	$lang['ERR_DESCRIPTION_TYPE']='<p class="'.$err_class.'">Description can not be empty or maximum letter length must be 50.</p>';
	$lang['ERR_STOREHOUSE_FULL']='<p class="'.$err_class.'">Your storehouse is full!</p>';
	$lang['ERR_NOT_ENOUGH_GOLD']='<p class="'.$err_class.'">You do not have enough golds for buy this offer!</p>';
	$lang['ERR_THERE_IS_NO_ITEM']='<p class="'.$err_class.'">There is no item!</p>';
	$lang['ERR_SELLER_N_BUYER_SAME']='<p class="'.$err_class.'">You can&#39;t buy your own offers!</p>';
	$lang['ERR_LOGIN_MISTAKE']='<p class="'.$err_class.'">You already been logged out!</p>';
	$lang['ERR_OFFER_LIMIT_REACHED']='<p class="'.$err_class.'">You have reached maximum offer count! Maximum offer count must be '.$offer_limit.'!<br>Remove offers or wait for selling them!</p>';
	$lang['ERR_JS_PRICE_TYPE']='Price can not be empty!';
	$lang['ERR_JS_DESCR_TYPE']='Description can not be empty!';
	$lang['ERR_JS_CAPTCHA_TYPE']='Captcha can not be empty!';
	
	// OFFER COMMENTS
	$lang['COM_ITEM_ID']='# ID';
	$lang['COM_ITEM_NAME']='Item Name';
	$lang['COM_ITEM_COUNT']='Count';
	$lang['COM_ITEM_PRICE']='Item Price';
	$lang['COM_ITEM_SELLER_NAME']='Seller Name';
	$lang['COM_ITEM_SELLER_DESC']='Seller Description';
	$lang['COM_ITEM_OPTION']='Show Seller Name';
	$lang['COM_ITEM_OPTION_TRUE']='Show';
	$lang['COM_ITEM_OPTION_FALSE']='Hide';
	$lang['COM_ITEM_DESCRIPTION']='Description About Item';
	$lang['COM_CAPTCHA']='Captcha';
	$lang['COM_CAPTCHA_ANSWER']='Captcha Answer';
	
?>