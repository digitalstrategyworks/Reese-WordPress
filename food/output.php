<?php 

	require_once('includes/connection.php');
	require_once("includes/functions.php"); 

	$venues = get_all_venues();

	print "<root>";	
	
	print "<venues>";
	
	foreach($venues as $venue) {
		print "<place>";
		
		$id = $venue['id'];
		
		$coupons = get_coupons_xml($id);
				
		foreach($venue as $key=>$val){
			
			if($key == 'location') {
			
				$place = get_location_by_id((int)$val);
				
				print '<location>';
				
				foreach($place as $p=>$q) {
					print "<$p>$q</$p>";
				}
				
				print '</location>';
			
			} else {
			
				print "<$key>$val</$key>";
				
			}
				
		}
		
			print '<coupons>';
				
			foreach($coupons as $coupon) {
			
				print '<coupon>';
				
				foreach($coupon as $key=>$val) {
					
					print "<$key>$val</$key>";
				
				}
				
				print '</coupon>';
				
			}

			print '</coupons>';
	
		print "</place>";
	
	}
	
	print "</venues>";
	
		
	
	print "</root>";
	
	
?>