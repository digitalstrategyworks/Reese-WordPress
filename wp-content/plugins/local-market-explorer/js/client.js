
// init yelp map(s)
(function() {
	var $ = jQuery;
	
	$('.lme-yelp .lme-map').each(function() {
		var canvas = this;
		var resultsId = canvas.getAttribute('data-resultsid');
		var mapBounds = new google.maps.LatLngBounds();
		var data = lme.yelpData[resultsId];
		var map, mapOptions, marker;
		var infoWindow = new google.maps.InfoWindow();
		
		if (!data.length)
			return;
		
		for (var i = data.length; i--;)
			mapBounds.extend(new google.maps.LatLng(data[i].latitude, data[i].longitude));

		mapOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			scaleControl: true,
			mapTypeControl: false,
			navigationControlOptions: { position: google.maps.ControlPosition.TOP_LEFT }
		}
		map = new google.maps.Map(canvas, mapOptions);
		map.fitBounds(mapBounds);
		
		for (var i = data.length; i--;) {
			marker = new google.maps.Marker({
				icon: 'http://media3.px.yelpcdn.com/static/200911304213451137/i/map/marker_star.png',
				map: map,
				position: new google.maps.LatLng(data[i].latitude, data[i].longitude)
			});
			(function() {
				var content =
					'<div style="font-size: 11px; font-family: Verdana; width: 250px; height: 50px;">' +
					'<a href="' + data[i].url + '">' + data[i].name + '</a><br />' +
					'<img src="' + data[i].rating_img_url + '" class="lme-rating" /> based on ' + data[i].review_count + ' reviews<br />' +
					'</div>';
				google.maps.event.addListener(marker, 'click', function() {
					infoWindow.setContent(content);
					infoWindow.open(map, this);
				});
			})();
		}
	});
})();

//init nile guide map(s)
(function() {
	var $ = jQuery;
	
	$('.lme-seedo-map').each(function() {
		var canvas = this;
		var resultsId = canvas.getAttribute('data-resultsid');
		var mapBounds = new google.maps.LatLngBounds();
		var data = lme.nileGuideData[resultsId];
		var map, mapOptions, marker;
		var infoWindow = new google.maps.InfoWindow();
		
		if (!data.length)
			return;
		
		for (var i = data.length; i--;)
			mapBounds.extend(new google.maps.LatLng(data[i].latitude, data[i].longitude));

		mapOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			scaleControl: true,
			mapTypeControl: false,
			navigationControlOptions: { position: google.maps.ControlPosition.TOP_LEFT }
		}
		map = new google.maps.Map(canvas, mapOptions);
		map.fitBounds(mapBounds);
		
		for (var i = data.length; i--;) {
			marker = new google.maps.Marker({
				icon: lme.pluginUrl + 'images/nileguide-map-icon.png',
				map: map,
				position: new google.maps.LatLng(data[i].latitude, data[i].longitude)
			});
			(function() {
				var content =
					'<div style="font-size: 11px; font-family: Verdana; width: 300px; min-height: 60px; line-height: 16px;">' +
					'<a href="' + data[i].url + '"><img src="' + data[i].image + '" style="float: left; border: 1px solid #999; margin-right: 10px;" /></a>' +
					'<a href="' + data[i].url + '"><b>' + data[i].name + '</b></a><br />' +
					(data[i].summary || '') +
					'</div>';
				google.maps.event.addListener(marker, 'click', function() {
					infoWindow.setContent(content);
					infoWindow.open(map, this);
				});
			})();
		}
	});
})();

// init school filters
(function() {
	var $ = jQuery;
	var gradeMatcher = new RegExp(''), typeMatcher = new RegExp('');
	
	$('.lme-school-grade-filter, .lme-school-type-filter').click(function(e) {
		var filter = e.target.getAttribute('data-filter');
		var filterType = e.currentTarget.getAttribute('data-filter-type');
		
		// if data-for isn't set on the target, this will be null. if it's just an empty string, 'all' was clicked and we want
		// to continue 
		if (filter == null)
			return;
		
		if (filterType == 'type')
			typeMatcher = new RegExp(filter);
		else if (filterType == 'grade')
			gradeMatcher = new RegExp(filter);
		
		// now we hide any school that doesn't match our filters and show any that were previously hidden
		$(this).closest('.lme-schools').find('.lme-school').each(function() {
			var grade = this.getAttribute('data-grade');
			var type = this.getAttribute('data-type');
			
			this.style.display = gradeMatcher.test(grade) && typeMatcher.test(type) ? '' : 'none';
		});
	});
})();

//init college filters
(function() {
	var $ = jQuery;
	
	$('.lme-colleges').change(function(e) {
		var currentTarget = $(e.currentTarget);
		var target = $(e.target);
		var filter = target.attr('data-filter');
		var subtitle;
		
		if (!filter)
			return;
		
		subtitle = filter.replace(/\-/g, ' ') + ' colleges';
		subtitle = subtitle.charAt(0).toUpperCase() + subtitle.substr(1);
		currentTarget.find('.lme-college-subtitle').text(subtitle);

		currentTarget.find('.lme-college').each(function() {
			this.style.display = $(this).hasClass('lme-' + filter) ? 'block' : 'none';
		});
	});
})();