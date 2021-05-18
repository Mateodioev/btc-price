<?php

	error_reporting(0);
	set_time_limit(0);
	date_default_timezone_set('America/Mexico_City');

	echo "\e[H\e[J";
	if (getopt("t:") == NULL){
		print("\e[1;37;41mEXAMPLE: php script.php -t 60\e[0m\n");
		die();
	}
	$options = getopt("t:");
	echo "\e[1;34;40m
	    ____ ____________   __   __   __
	   / __ )_  __/ ____/  / /  / /  / /
	  / __  |/ / / /      / /  / /  / /
	 / /_/ // / / /___   /_/  /_/  /_/
	/_____//_/  \____/  (_)  (_)  (_) \e[0m\n\n";

	echo "
	\e[1;34;40m ©Mateodioev \e[0m\n\n";

	while(1){
    	$today = date("d/m/Y - g:i:s A");
    	print("\e[1;33mHORA[".$today."]\e[0m\n");
    
		$form = json_decode(file_get_contents("https://api.coindesk.com/v1/bpi/currentprice/MXN.json"));
		$priceMXM = $form->bpi->MXN->rate_float;
		$priceUSD = $form->bpi->USD->rate_float;
		print("\e[1;37;41mCOINDESK API => [MXN: ".$priceMXM."] | [USD: ".$priceUSD."]\e[0m\n");//coindesk data
    
		$form2 = json_decode(file_get_contents("https://api.cryptonator.com/api/ticker/btc-usd"));
		$price = round($form2->ticker->price, 5);
		$change = round($form2->ticker->change, 5);
		print("\e[1;37;42mCRYPTONATOR API => [USD: ".$price."] | [CHANGE: ".$change."%]\e[0m\n\n");//cryptonator data  
    
		sleep($options['t'] - 1);
	}

?>
