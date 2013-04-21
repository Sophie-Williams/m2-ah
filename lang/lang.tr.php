<?PHP
	
	/*
	------------------
	Dil: Türkçe
	------------------
	*/
	
	$lang=array();
	
	// META AYARLARI
	$lang['META_TITLE']='Müzayede Alaný - TestM2';
	$lang['META_DESCRIPTION']='Bu TestM2 Müzayede alanýdýr!';
	$lang['META_KEYWORDS']='müzayede,alaný,metin2,vs';
	$lang['META_CHARSET']='ISO-8859-9';
	
	// GENEL CÜMLELER
	$lang['GLO_LOGIN']='Giriþ';
	$lang['GLO_STOREHOUSE']='Nesne Deposu';
	$lang['GLO_MYOFFERS']='Mevcut Tekliflerim';
	$lang['GLO_SETTINGS']='Ayarlar';
	$lang['GLO_EXIT']='Çýkýþ';
	$lang['GLO_EXIT_TIT']='Onay';
	$lang['GLO_EXIT_QUEST']='Çýkmak istiyor musunuz?';
	$lang['GLO_USERNAME']='Kullanýcý Adý';
	$lang['GLO_MAIN_SITE']='Ana Site';
	$lang['GLO_HOME_PAGE']='Ana Sayfa';
	$lang['GLO_OFFERS']='Teklifler';
	$lang['GLO_PROCESS_SUCCESS']='<p>Ýþlem baþarýlý! Yönlendiriliyor...</p>';
	$lang['GLO_REDIRECTING']='<p>Yönlendiriliyor...</p>';
	$lang['GLO_CREATE_OFFER']='Teklif Oluþtur';
	$lang['GLO_TRANSFER_ITEM']='Nesneyi Geri Taþý';
	$lang['GLO_CAPTCHA']='Doðrulama Kodu';
	$lang['GLO_CANCEL']='Ýptal';
	$lang['GLO_BUY']='Satýn Al';
	$lang['GLO_TRANSFER']='Taþý [Teklifi Kaldýr]';
	$lang['GLO_EDIT']='Düzenle';
	$lang['GLO_GOLD_NAME']='Yang.';
	$lang['GLO_CHOOSE_SELLER']='Görüntülenecek Satýcý Adýný Seçiniz';
	$lang['GLO_HIDE']='[Gizlendi]';
	$lang['GLO_CHANGE_LANG']='Dili Deðiþtir:';
	
	$lang['GLO_GOLD_NONE']='Hesabýnýzda <u>hiç</u> yang&#39;ýnýz yok.';
	$lang['GLO_GOLD']='Hesabýnýzda <u>'.seperate_gold($_SESSION['user_golds']).'</u> yang bulunmaktadýr.';
	
	$lang['GLO_TIP_SUCC']='Baþarýyla giriþ yaptýnýz!';
	$lang['GLO_TIP_ERR1']='Lütfen kullanýcý adýnýzý ya da þifrenizi kontrol ediniz!';
	$lang['GLO_TIP_ERR2']='Kullanýcý adý ya da þifre boþ olamaz!';
	
	// PAGE TITLES
	$lang['TIT_CREATE_OFFER']='<h1>Müzayede Alaný - Teklif Oluþtur</h1>';
	$lang['TIT_EDIT_OFFER']='<h1>Müzayede Alaný - Teklifi Düzenle</h1>';
	$lang['TIT_BUY_OFFER']='<h1>Müzayede Alaný - Teklif Satýn Al</h1>';
	$lang['TIT_ACTIVE_OFFERS']='<h1>Müzayede Alaný - Aktif Tekliflerim</h1>';
	$lang['TIT_TRANSFER_ITEM']='<h1>Müzayede Alaný - Nesne Transfer</h1>';
	$lang['TIT_STOREHOUSE']='<h1>Müzayede Alaný - Nesne Depo</h1>';
	
	// PAGE COMMENTS
		// LOG OUT
		$lang['COM_LOG_OUT_REDI']='<h1>Çýkýþ Yapýlýyor</h1>';
		$lang['COM_LOG_OUT']='<p>Baþarýyla çýkýþ yaptýnýz. Yönlendiriliyor...</p>';
		
		// MY OFFERS
		$calc_offers=($offer_limit)-($_SESSION['user_offers']);
		$lang['COM_TRANSFER_CONFIRMATION_TIT']='Onaylama';
		$lang['COM_TRANSFER_CONFIRMATION_DES']='Bu teklife ne yapmak istiyorsunuz?';
		$lang['COM_ACTIVE_OFFERS_DESCRIPTION']='<p>Nesne ile ilgili iþlem yapmak için sütunlara týklatýn.<br>Azami olarak <span class="offercount">'.$offer_limit.'</span> adet teklif verebilirsiniz.<br>Þu anda <span class="offercount">'.$calc_offers.'</span> adet hakkýnýz mevcut.</p>';
		
		// OFFERS
		$lang['COM_BUY_ITEM_DESCR']='<p>Bir nesne satýn almak için nesne sütununa týklayýn ve satýn almayý onaylayýn.<br>Eðer yeterli yangýnýz yok ise sütuna týklayamazsýnýz.</p>';
		$lang['COM_BUY_ITEM_GUEST']='<p>Ziyaretçiler sadece nesneleri görebilir, hiç bir þey satýn alamaz. Lütfen giriþ yapýnýz.</p>';
		$lang['COM_BUY_ITEM_QUEST']='Bu nesneyi gerçekten satýn almak istiyor musunuz?';
		
		// STORE HOUSE
		$lang['COM_STOREHOUSE_DESCR']='<p>Website deposuna oyun içinden npc yardýmý ile nesne transfer edebilirsiniz. Ya da bu nesne ile bir teklif baþlatabilirsiniz. Sadece nesne isminin üzerine týklatýn.</p>';
		$lang['COM_STOREHOUSE_QUEST1']='Bu nesneye ne yapmak istiyorsunuz?';
		$lang['COM_STOREHOUSE_QUEST2']='> Bu nesne ile bir teklif baþlatabilirsiniz.';
		$lang['COM_STOREHOUSE_QUEST3']='> Bu nesneyi oyun içi deponuza taþýyabilirsiniz.';
		$lang['COM_STOREHOUSE_TIT']='Onaylama';
	
	// ERRORS
	$err_class='err';
	$lang['ERR_LOGIN_NEEDED']='<p class="'.$err_class.'">Bu sayfayý görebilmek için giriþ yapmalýsýnýz!</p>';
	$lang['ERR_ID_NOT_FOUND']='<p class="'.$err_class.'">Belirtilen ID bulunamadý!</p>';
	$lang['ERR_DELAY_TIME']='<p class="'.$err_class.'">Yeni bir iþlem yapmak için '.$delay.' saniye beklemelisiniz!</p>';
	$lang['ERR_UNKNOWN_COMMAND']='<p class="'.$err_class.'">Hatalý komut girdiniz!</p>';
	$lang['ERR_FALSE_CAPTCHA']='<p class="'.$err_class.'">Yanlýþ bir Doðrulama Kodu girdiniz!</p>';
	$lang['ERR_PRICE_TYPE']='<p class="'.$err_class.'">Fiyat boþ olamaz ve sadece sayýdan oluþmalýdýr.</p>';
	$lang['ERR_PRICE_LIMIT']='<p class="'.$err_class.'">Fiyat 1,9T den daha büyük olamaz!</p>';
	$lang['ERR_DESCRIPTION_TYPE']='<p class="'.$err_class.'">Açýklama boþ olamaz ya da uzunluðu 50 karakteri geçemez!</p>';
	$lang['ERR_STOREHOUSE_FULL']='<p class="'.$err_class.'">Oyun içi deponuz full!</p>';
	$lang['ERR_NOT_ENOUGH_GOLD']='<p class="'.$err_class.'">Bu teklifi alabilmek için yeterli yangýnýz yok!</p>';
	$lang['ERR_THERE_IS_NO_ITEM']='<p class="'.$err_class.'">Burada hiç bir þey yok!</p>';
	$lang['ERR_SELLER_N_BUYER_SAME']='<p class="'.$err_class.'">Kendi tekliflerinizi satýn alamazsýnýz!</p>';
	$lang['ERR_LOGIN_MISTAKE']='<p class="'.$err_class.'">Zaten çýkýþ yapmýþsýnýz!</p>';
	$lang['ERR_OFFER_LIMIT_REACHED']='<p class="'.$err_class.'">Teklif sayýsý aþýldý! Azami olarak '.$offer_limit.' adet teklif verebilirsiniz!</p>';
	$lang['ERR_JS_PRICE_TYPE']='Fiyat boþ olamaz!';
	$lang['ERR_JS_DESCR_TYPE']='Açýklama boþ olamaz!';
	$lang['ERR_JS_CAPTCHA_TYPE']='Doðrulama kodu boþ olamaz!';
	
	// OFFER COMMENTS
	$lang['COM_ITEM_ID']='# ID';
	$lang['COM_ITEM_NAME']='Nesne Adý';
	$lang['COM_ITEM_COUNT']='Adet';
	$lang['COM_ITEM_PRICE']='Nesne Fiyatý';
	$lang['COM_ITEM_SELLER_NAME']='Satýcý Adý';
	$lang['COM_ITEM_SELLER_DESC']='Satýcý Açýklamasý';
	$lang['COM_ITEM_OPTION']='Satýcý Adýný Göster';
	$lang['COM_ITEM_OPTION_TRUE']='Göster';
	$lang['COM_ITEM_OPTION_FALSE']='Gösterme';
	$lang['COM_ITEM_DESCRIPTION']='Nesne Hakkýnda Açýklama';
	$lang['COM_CAPTCHA']='Doðrulama Kodu';
	$lang['COM_CAPTCHA_ANSWER']='Doðrulama Kodunu Yazýnýz';
	
	// DEV
	$lang['DEV_NAME']='Tasarým & Kodlama <a href="http://www.elitepvpers.com/forum/members/2052206--t-rk-.html">-T&#220;RK-.';
	
?>