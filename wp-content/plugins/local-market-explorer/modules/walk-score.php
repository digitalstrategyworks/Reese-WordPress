<?php

class LmeModuleWalkScore {
	static function getModuleHtml($opt_neighborhood, $opt_city, $opt_state, $opt_zip) {
		$options = get_option(LME_OPTION_NAME);
		$apiKey = $options["api-keys"]["walk-score"];
	
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
		
		$iframeSrc = LME_PLUGIN_URL . "modules/walk-score-iframe.php";
		$iframeSrc .= "?api-key=" . urlencode($apiKey);
		$iframeSrc .= "&location=" . urlencode($locationParams);
		
		return <<<HTML
			<h2 class="lme-module-heading">Walk Score</h2>
			<div class="lme-module lme-walk-score">
				<iframe src="{$iframeSrc}" frameborder="0" class="lme-walk-score-iframe"></iframe>
			</div>
HTML;
	}
}

?>