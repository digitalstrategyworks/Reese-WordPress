hs.graphicsDir = efnggHighslideJSConfig.graphicsDir;
hs.align = efnggHighslideJSConfig.align;
hs.transitions = ['expand', 'crossfade'];
if(efnggHighslideJSConfig.outlineType != 'null'){
	hs.outlineType = efnggHighslideJSConfig.outlineType;
}else{
	hs.outlineType = null;
}
hs.wrapperClassName = 'controls-in-heading';
hs.blockRightClick = ((efnggHighslideJSConfig.blockRightClick == 1)? true : false);
hs.showCredits = ((efnggHighslideJSConfig.showCredits == 1)? true : false);
hs.easing = efnggHighslideJSConfig.easing;
hs.easingClose = efnggHighslideJSConfig.easingClose;
hs.dimmingOpacity = parseFloat(efnggHighslideJSConfig.dimmingOpacity);
hs.dimmingDuration = parseInt(efnggHighslideJSConfig.dimmingDuration);

// This two lines will take the title of the pictures from NextGEN and add it to the caption field in Highslide.
hs.captionEval = 'this.a.title';
if(efnggHighslideJSConfig.numberPosition != 'null'){
	hs.numberPosition = efnggHighslideJSConfig.numberPosition;
}else{
	hs.numberPosition = null;
}

//Deactivate drag-feature
hs.Expander.prototype.onDrag = function(sender, e) {
	return false;
}

if (hs.addSlideshow) hs.addSlideshow({
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: false,
	overlayOptions: {
		opacity: 1,
		position: 'top right',
		offsetX: '0',
		offsetY: '0',
		hideOnMouseOut: false
	}
});