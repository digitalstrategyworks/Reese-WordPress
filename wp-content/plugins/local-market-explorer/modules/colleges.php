<?php

class LmeModuleColleges {
	static function getApiUrls($opt_neighborhood, $opt_city, $opt_state, $opt_zip) {
		$options = get_option(LME_OPTION_NAME);
		$urlBase = "http://api.matchcollege.com/colleges?";
		$apiParams = array();
		
		$apiParams["fn"] = "college_search";
		$apiParams["v"] = "1";
		$apiParams["key"] = "185a2d8addb88980dac42c159193f68c"; // match college wants this embedded;
		$apiParams["output"] = "php";
		
		if (!empty($opt_zip)) {
			$apiParams["zip"] = $opt_zip;
		} else {
			$apiParams["city"] = $opt_city;
			$apiParams["state"] = $opt_state;
		}
		
		$url = $urlBase . http_build_query($apiParams);
		return array( "colleges" => $url );
	}
	static function getModuleHtml($apiResponses, $opt_city, $opt_state, $opt_zip) {
		$colleges = @unserialize($apiResponses["colleges"]);
		$logoUrl = plugin_dir_url(__FILE__) . '../images/logos/matchcollege.png';
		
		if (empty($colleges))
			return;

		$state = htmlentities($colleges[0]["college"]["state"]);
		$findMoreUrl = "http://www.matchcollege.com/state-college/" . strtoupper($state);
		
		if (!empty($opt_zip)) {
			$areaName = $zip;
		} else {
			$areaName = ucwords($opt_city) . ", " . strtoupper($opt_state);
		}
		
		$content = <<<HTML
			<h2 class="lme-module-heading">Colleges</h2>
			<div class="lme-module lme-colleges">
				<h3>Colleges near {$areaName}</h3>
				<div class="lme-left">
					<div class="lme-filter lme-school-public-filter">
						<b>Public</b>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-public-level-4" data-filter="public-4-year" checked />
							<label for="lme-public-level-4">4-year</label>
						</div>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-public-level-2" data-filter="public-2-year" />
							<label for="lme-public-level-2">2-year</label>
						</div>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-public-level-lt2" data-filter="public-less-than-2-year" />
							<label for="lme-public-level-lt2">Less than 2-year</label>
						</div>
					</div>
					
					<div class="lme-filter lme-school-private-filter">
						<b>Private</b>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-private-level-4" data-filter="private-4-year" />
							<label for="lme-private-level-4">4-year</label>
						</div>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-private-level-2" data-filter="private-2-year" />
							<label for="lme-private-level-2">2-year</label>
						</div>
						<div>
							<input type="radio" name="lme-college-filter" id="lme-private-level-lt2" data-filter="private-less-than-2-year" />
							<label for="lme-private-level-lt2">Less than 2-year</label>
						</div>
					</div>
					
					<a href="http://www.matchcollege.com">
						<img class="lme-matchcollege-logo" src="{$logoUrl}" />
					</a>
				</div>
				<div class="lme-right">
					<h3 class="lme-college-subtitle">Public 4 year colleges</h3>
					<div class="lme-colleges-container">
HTML;

		foreach ($colleges as $college) {
			$college = $college["college"];
			$typeForFilter = str_replace(" ", "-", strtolower($college["college_type"]));
			$filterClass = htmlentities("lme-" . strtolower($college["college_funding"]) . "-" . $typeForFilter);
			
			$url = htmlentities($college["url"]);
			$name = htmlentities($college["college_name"]);
			$address = htmlentities($college["address"]);
			$city = htmlentities($college["city"]);
			$state = htmlentities($college["state"]);
			$phone = htmlentities($college["general_phone"]);
			$collegeType = htmlentities($college["college_type"]);
			$highestDegree = htmlentities($college["highest_degree"]);
			$studentsEnrolled = htmlentities($college["college_student_size"]);
			$distance = htmlentities($college["distance"]);
			
			$content .= <<<HTML

						<div class="lme-college {$filterClass}">
							<h4><a href="{$url}">{$name}</a></h4>
							<div>{$address}, {$city}, {$state}</div>
							<div>{$phone}</div>
							<div>College Type: {$collegeType}</div>
							<div>Highest Degree: {$highestDegree}</div>
							<div>Students Enrolled: {$studentsEnrolled}</div>
							<div>Distance: {$distance}</div>
						</div>
HTML;
		}

		$content .= <<<HTML
					</div>
				</div>
				<div style="clear: both;"></div> <!-- IE 6 fix -->
				<div class="lme-colleges-find-more">
					Find more <a href="{$findMoreUrl}">colleges in {$state}</a>
				</div>
				<div style="clear: both;"></div> <!-- IE 6 fix -->
			</div>
HTML;
		return $content;
	}
}

?>