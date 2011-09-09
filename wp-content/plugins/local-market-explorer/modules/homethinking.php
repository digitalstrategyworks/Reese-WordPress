<?php

class LmeModuleHomethinking {
	static function getApiUrls($opt_neighborhood, $opt_city, $opt_state, $opt_zip) {
		$options = get_option(LME_OPTION_NAME);
		$apiParams = array();
		
		$apiParams["page"] = "0";
		$apiParams["partnerId"] = "NiSc168282";
		
		if (!empty($opt_zip)) {
			$urlBase = "http://api.homethinking.com/RealtorWebService/getRealtorListByZip?";
			$apiParams["zip"] = $opt_zip;
		} else {
			$urlBase = "http://api.homethinking.com/RealtorWebService/getRealtorListByCityState?";
			$apiParams["city"] = $opt_city;
			$apiParams["state"] = $opt_state;
		}
		
		$url = $urlBase . http_build_query($apiParams);
		return array( "homethinking" => $url );
	}
	static function getModuleHtml($apiResponses, $opt_city, $opt_state, $opt_zip) {
		if (!$apiResponses["homethinking"])
			return "";
		
		$results = @simplexml_load_string($apiResponses["homethinking"]);
		$ns = $results->getNamespaces(true);
		$results->registerXPathNamespace("ns", $ns["ns"]);
		
		if (!empty($opt_zip))
			$realtorResults = $results->xpath("//ns:getRealtorListByZipResponse/ns:return");
		else
			$realtorResults = $results->xpath("//ns:getRealtorListByCityStateResponse/ns:return");
		
		if (!empty($opt_zip)) {
			$areaName = $zip;
			$brandingLink = sprintf("http://www.homethinking.com/z%s-Realtors.html", $areaName);
		} else {
			$fullState = LmeStates::$translations[strtoupper($opt_state)];
			$areaName = ucwords($opt_city) . ", " . $fullState;
			$brandingLink = sprintf("http://www.homethinking.com/%s-Realtors-in-%s.html",
				str_replace(" ", "-", ucwords($opt_city)), $fullState);
		}
		$brandingText = sprintf("Browse more %s Realtors at Homethinking", $areaName);
		
		$brandingLink = htmlspecialchars($brandingLink);
		$brandingText = htmlspecialchars($brandingText);
		
		$content = <<<HTML
			<h2 class="lme-module-heading">Realtors (from Homethinking)</h2>
			<div class="lme-module lme-homethinking">
HTML;

		foreach ($realtorResults as $realtor) {
			$realtor->registerXPathNamespace("ht1", $ns["ht1"]);
			
			$averageSale = htmlentities(array_shift($realtor->xpath("ht1:averageSale")));
			$brokerage = htmlentities(array_shift($realtor->xpath("ht1:brokerage")));
			$medianBedroom = htmlentities(array_shift($realtor->xpath("ht1:medianBedroom")));
			$name = htmlentities(array_shift($realtor->xpath("ht1:name")));
			$phone = htmlentities(array_shift($realtor->xpath("ht1:phone")));
			$photoLink = htmlentities(array_shift($realtor->xpath("ht1:photoLink")));
			$profileLink = htmlentities(array_shift($realtor->xpath("ht1:profileLink")));
			$realtorId = htmlentities(array_shift($realtor->xpath("ht1:realtorId")));
			
			$content .= <<<HTML
				<div class="lme-realtor">
HTML;
			if (!empty($photoLink))
				$content .= <<<HTML

					<a href="{$profileLink}"><img class="lme-photo" src="{$photoLink}"/></a>
HTML;
				$content .= <<<HTML

					<div class="lme-data">
						<h4 class="lme-name"><a href="{$profileLink}">{$name}</a></h4>
						<h5 class="lme-brokerage">{$brokerage}</h5>
						<div>Average sale price: {$averageSale}; median bedrooms: {$medianBedroom}</div>
						<div>Phone: {$phone}</div>
					</div>
				</div>

HTML;
		}

		$content .= <<<HTML
				<div style="clear: both;"></div>
				<div class="lme-homethinking-find-more">
					Find more <a href="{$brandingLink}">{$brandingText}</a>
				</div>
			</div>
			<div style="clear: both;"></div>
HTML;
		return $content;
	}
}

?>