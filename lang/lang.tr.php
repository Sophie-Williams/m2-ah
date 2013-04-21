<?PHP
	
	/*
	------------------
	Dil: T�rk�e
	------------------
	*/
	
	$lang=array();
	
	// META AYARLARI
	$lang['META_TITLE']='M�zayede Alan� - TestM2';
	$lang['META_DESCRIPTION']='Bu TestM2 M�zayede alan�d�r!';
	$lang['META_KEYWORDS']='m�zayede,alan�,metin2,vs';
	$lang['META_CHARSET']='ISO-8859-9';
	
	// GENEL C�MLELER
	$lang['GLO_LOGIN']='Giri�';
	$lang['GLO_STOREHOUSE']='Nesne Deposu';
	$lang['GLO_MYOFFERS']='Mevcut Tekliflerim';
	$lang['GLO_SETTINGS']='Ayarlar';
	$lang['GLO_EXIT']='��k��';
	$lang['GLO_EXIT_TIT']='Onay';
	$lang['GLO_EXIT_QUEST']='��kmak istiyor musunuz?';
	$lang['GLO_USERNAME']='Kullan�c� Ad�';
	$lang['GLO_MAIN_SITE']='Ana Site';
	$lang['GLO_HOME_PAGE']='Ana Sayfa';
	$lang['GLO_OFFERS']='Teklifler';
	$lang['GLO_PROCESS_SUCCESS']='<p>��lem ba�ar�l�! Y�nlendiriliyor...</p>';
	$lang['GLO_REDIRECTING']='<p>Y�nlendiriliyor...</p>';
	$lang['GLO_CREATE_OFFER']='Teklif Olu�tur';
	$lang['GLO_TRANSFER_ITEM']='Nesneyi Geri Ta��';
	$lang['GLO_CAPTCHA']='Do�rulama Kodu';
	$lang['GLO_CANCEL']='�ptal';
	$lang['GLO_BUY']='Sat�n Al';
	$lang['GLO_TRANSFER']='Ta�� [Teklifi Kald�r]';
	$lang['GLO_EDIT']='D�zenle';
	$lang['GLO_GOLD_NAME']='Yang.';
	$lang['GLO_CHOOSE_SELLER']='G�r�nt�lenecek Sat�c� Ad�n� Se�iniz';
	$lang['GLO_HIDE']='[Gizlendi]';
	$lang['GLO_CHANGE_LANG']='Dili De�i�tir:';
	
	$lang['GLO_GOLD_NONE']='Hesab�n�zda <u>hi�</u> yang&#39;�n�z yok.';
	$lang['GLO_GOLD']='Hesab�n�zda <u>'.seperate_gold($_SESSION['user_golds']).'</u> yang bulunmaktad�r.';
	
	$lang['GLO_TIP_SUCC']='Ba�ar�yla giri� yapt�n�z!';
	$lang['GLO_TIP_ERR1']='L�tfen kullan�c� ad�n�z� ya da �ifrenizi kontrol ediniz!';
	$lang['GLO_TIP_ERR2']='Kullan�c� ad� ya da �ifre bo� olamaz!';
	
	// PAGE TITLES
	$lang['TIT_CREATE_OFFER']='<h1>M�zayede Alan� - Teklif Olu�tur</h1>';
	$lang['TIT_EDIT_OFFER']='<h1>M�zayede Alan� - Teklifi D�zenle</h1>';
	$lang['TIT_BUY_OFFER']='<h1>M�zayede Alan� - Teklif Sat�n Al</h1>';
	$lang['TIT_ACTIVE_OFFERS']='<h1>M�zayede Alan� - Aktif Tekliflerim</h1>';
	$lang['TIT_TRANSFER_ITEM']='<h1>M�zayede Alan� - Nesne Transfer</h1>';
	$lang['TIT_STOREHOUSE']='<h1>M�zayede Alan� - Nesne Depo</h1>';
	
	// PAGE COMMENTS
		// LOG OUT
		$lang['COM_LOG_OUT_REDI']='<h1>��k�� Yap�l�yor</h1>';
		$lang['COM_LOG_OUT']='<p>Ba�ar�yla ��k�� yapt�n�z. Y�nlendiriliyor...</p>';
		
		// MY OFFERS
		$calc_offers=($offer_limit)-($_SESSION['user_offers']);
		$lang['COM_TRANSFER_CONFIRMATION_TIT']='Onaylama';
		$lang['COM_TRANSFER_CONFIRMATION_DES']='Bu teklife ne yapmak istiyorsunuz?';
		$lang['COM_ACTIVE_OFFERS_DESCRIPTION']='<p>Nesne ile ilgili i�lem yapmak i�in s�tunlara t�klat�n.<br>Azami olarak <span class="offercount">'.$offer_limit.'</span> adet teklif verebilirsiniz.<br>�u anda <span class="offercount">'.$calc_offers.'</span> adet hakk�n�z mevcut.</p>';
		
		// OFFERS
		$lang['COM_BUY_ITEM_DESCR']='<p>Bir nesne sat�n almak i�in nesne s�tununa t�klay�n ve sat�n almay� onaylay�n.<br>E�er yeterli yang�n�z yok ise s�tuna t�klayamazs�n�z.</p>';
		$lang['COM_BUY_ITEM_GUEST']='<p>Ziyaret�iler sadece nesneleri g�rebilir, hi� bir �ey sat�n alamaz. L�tfen giri� yap�n�z.</p>';
		$lang['COM_BUY_ITEM_QUEST']='Bu nesneyi ger�ekten sat�n almak istiyor musunuz?';
		
		// STORE HOUSE
		$lang['COM_STOREHOUSE_DESCR']='<p>Website deposuna oyun i�inden npc yard�m� ile nesne transfer edebilirsiniz. Ya da bu nesne ile bir teklif ba�latabilirsiniz. Sadece nesne isminin �zerine t�klat�n.</p>';
		$lang['COM_STOREHOUSE_QUEST1']='Bu nesneye ne yapmak istiyorsunuz?';
		$lang['COM_STOREHOUSE_QUEST2']='> Bu nesne ile bir teklif ba�latabilirsiniz.';
		$lang['COM_STOREHOUSE_QUEST3']='> Bu nesneyi oyun i�i deponuza ta��yabilirsiniz.';
		$lang['COM_STOREHOUSE_TIT']='Onaylama';
	
	// ERRORS
	$err_class='err';
	$lang['ERR_LOGIN_NEEDED']='<p class="'.$err_class.'">Bu sayfay� g�rebilmek i�in giri� yapmal�s�n�z!</p>';
	$lang['ERR_ID_NOT_FOUND']='<p class="'.$err_class.'">Belirtilen ID bulunamad�!</p>';
	$lang['ERR_DELAY_TIME']='<p class="'.$err_class.'">Yeni bir i�lem yapmak i�in '.$delay.' saniye beklemelisiniz!</p>';
	$lang['ERR_UNKNOWN_COMMAND']='<p class="'.$err_class.'">Hatal� komut girdiniz!</p>';
	$lang['ERR_FALSE_CAPTCHA']='<p class="'.$err_class.'">Yanl�� bir Do�rulama Kodu girdiniz!</p>';
	$lang['ERR_PRICE_TYPE']='<p class="'.$err_class.'">Fiyat bo� olamaz ve sadece say�dan olu�mal�d�r.</p>';
	$lang['ERR_PRICE_LIMIT']='<p class="'.$err_class.'">Fiyat 1,9T den daha b�y�k olamaz!</p>';
	$lang['ERR_DESCRIPTION_TYPE']='<p class="'.$err_class.'">A��klama bo� olamaz ya da uzunlu�u 50 karakteri ge�emez!</p>';
	$lang['ERR_STOREHOUSE_FULL']='<p class="'.$err_class.'">Oyun i�i deponuz full!</p>';
	$lang['ERR_NOT_ENOUGH_GOLD']='<p class="'.$err_class.'">Bu teklifi alabilmek i�in yeterli yang�n�z yok!</p>';
	$lang['ERR_THERE_IS_NO_ITEM']='<p class="'.$err_class.'">Burada hi� bir �ey yok!</p>';
	$lang['ERR_SELLER_N_BUYER_SAME']='<p class="'.$err_class.'">Kendi tekliflerinizi sat�n alamazs�n�z!</p>';
	$lang['ERR_LOGIN_MISTAKE']='<p class="'.$err_class.'">Zaten ��k�� yapm��s�n�z!</p>';
	$lang['ERR_OFFER_LIMIT_REACHED']='<p class="'.$err_class.'">Teklif say�s� a��ld�! Azami olarak '.$offer_limit.' adet teklif verebilirsiniz!</p>';
	$lang['ERR_JS_PRICE_TYPE']='Fiyat bo� olamaz!';
	$lang['ERR_JS_DESCR_TYPE']='A��klama bo� olamaz!';
	$lang['ERR_JS_CAPTCHA_TYPE']='Do�rulama kodu bo� olamaz!';
	
	// OFFER COMMENTS
	$lang['COM_ITEM_ID']='# ID';
	$lang['COM_ITEM_NAME']='Nesne Ad�';
	$lang['COM_ITEM_COUNT']='Adet';
	$lang['COM_ITEM_PRICE']='Nesne Fiyat�';
	$lang['COM_ITEM_SELLER_NAME']='Sat�c� Ad�';
	$lang['COM_ITEM_SELLER_DESC']='Sat�c� A��klamas�';
	$lang['COM_ITEM_OPTION']='Sat�c� Ad�n� G�ster';
	$lang['COM_ITEM_OPTION_TRUE']='G�ster';
	$lang['COM_ITEM_OPTION_FALSE']='G�sterme';
	$lang['COM_ITEM_DESCRIPTION']='Nesne Hakk�nda A��klama';
	$lang['COM_CAPTCHA']='Do�rulama Kodu';
	$lang['COM_CAPTCHA_ANSWER']='Do�rulama Kodunu Yaz�n�z';
	
	// DEV
	$lang['DEV_NAME']='Tasar�m & Kodlama <a href="http://www.elitepvpers.com/forum/members/2052206--t-rk-.html">-T&#220;RK-.';
	
?>