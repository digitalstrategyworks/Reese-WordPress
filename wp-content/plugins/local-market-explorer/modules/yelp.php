<?php

class LmeModuleYelp {
	static function getApiUrls($opt_neighborhood, $opt_city, $opt_state, $opt_zip) {
		$options = get_option(LME_OPTION_NAME);
		$apiKey = $options["api-keys"]["yelp"];
		$url = "http://api.yelp.com/business_review_search?ywsid={$apiKey}&limit=20&category=active+food+localflavor+nightlife+restaurants&location=";
		
		if (!empty($opt_zip)) {
			$locationParams = "{$opt_zip}";
		} else {
			$encodedCity = urlencode($opt_city);
			$locationParams = "{$encodedCity},{$opt_state}";
			if (strlen($opt_neighborhood) > 0) {
				$encodedNeighborhood = urlencode($opt_neighborhood);
				$locationParams = "{$encodedNeighborhood},{$locationParams}";
			}
		}
		
		return array(
			"yelp"	=> "{$url}{$locationParams}"
		);
	}
	static function getModuleHtml($apiResponses) {
		global $wp_scripts;
		
		$yelpResponse = @json_decode($apiResponses["yelp"])->businesses;
		
		if (empty($yelpResponse))
			return;
		
		$jsonResults = array();
		$resultsId = rand();
		
		wp_enqueue_script("gmaps3", "http://maps.google.com/maps/api/js?sensor=false", null, null, true);
		
		$wp_scripts->in_footer[] = "gmaps3";
		$wp_scripts->in_footer[] = "local-market-explorer";
		
		foreach ($yelpResponse as $business) {
			$jsonResults[] = (object)array(
				"name"				=> $business->name,
				"address1"			=> $business->address1,
				"address2"			=> $business->address2,
				"address3"			=> $business->address3,
				"city"				=> $business->city,
				"state_code"		=> $business->state_code,
				"zip"				=> $business->zip,
				"phone"				=> $business->phone,
				"rating_img_url"	=> $business->rating_img_url,
				"review_count"		=> $business->review_count,
				"url"				=> $business->url,
				"latitude"			=> $business->latitude,
				"longitude"			=> $business->longitude,
				"photo_url"			=> $business->photo_url
			);
		}
		
		$jsonResultsSerialized = json_encode($jsonResults);
		$content = <<<HTML
			<script>
				var lme = lme || {};
				lme.yelpData = lme.yelpData || {};
				lme.yelpData['{$resultsId}'] = {$jsonResultsSerialized};
			</script>
			<h2 class="lme-module-heading">
				<a href="http://www.yelp.com"><img src="http://media2.px.yelpcdn.com/static/20091130149848283/i/developers/yelp_logo_75x38.png" alt="Yelp" class="lme-yelp-logo" /></a>
			</h2>
			<div class="lme-module lme-yelp">
				<div class="lme-map" data-resultsid="{$resultsId}"></div>
				<div class="lme-businesses">
HTML;
		foreach ($yelpResponse as $review) {
			$categories = "";
			foreach ($review->categories as $category)
				$categories .= ", " . $category->name;
			$categories = trim($categories, ", ");
			
			$address = $review->address1;
			if (!empty($review->address2))
				$address .= ", {$review->address2}";
			if (!empty($review->address3))
				$address .= ", {$review->address3}";
			$address .= ", {$review->city}";
			$address = trim($address, ", ");
			
			if (!empty($review->photo_url_small))
				$reviewImgHtml = "<a href=\"{$review->url}\"><img src=\"{$review->photo_url}\" class=\"lme-photo\" /></a>";
			
			$content .= <<<HTML
					<div class="lme-review">
						$reviewImgHtml
						<div class="lme-data">
							<a href="{$review->url}">{$review->name}</a>
							<div>
								<img src="{$review->rating_img_url}" class="lme-rating" />
								based on {$review->review_count} reviews - <a href="{$review->url}">read reviews</a>
							</div>
							<div>Categories: {$categories}</div>
							<div>{$address}</div>
						</div>
					</div>
HTML;
		}
		$content .= <<<HTML
				</div>
				<div style="clear: both;"></div> <!-- IE 6 fix -->
			</div>
HTML;
		return $content;
	}
}

?>