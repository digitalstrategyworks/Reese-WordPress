// AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
if (!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
	jQuery(function($) {
		$("a[rel^='lightbox']").slimbox({
			loop: ((lightboxJSConfig.loop == 1)? true : false),
			overlayOpacity: parseFloat(lightboxJSConfig.overlayOpacity),
			overlayFadeDuration: parseInt(lightboxJSConfig.overlayFadeDuration),
			resizeDuration: parseInt(lightboxJSConfig.resizeDuration),
			resizeEasing: lightboxJSConfig.resizeEasing,
			initialWidth: parseInt(lightboxJSConfig.initialWidth),
			initialHeight: parseInt(lightboxJSConfig.initialHeight),
			imageFadeDuration: parseInt(lightboxJSConfig.imageFadeDuration),
			captionAnimationDuration: parseInt(lightboxJSConfig.captionAnimationDuration),
			counterText: lightboxJSConfig.counterText,
			closeKeys: [27, 88, 67],
			previousKeys: [37, 80],
			nextKeys: [39, 78]
		}, null, function(el) {
			return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
		});
	});
}