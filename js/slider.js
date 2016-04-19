/**
 * jQuery Slider JS
 *
 * Adds the Flexslider Plugin for the Featured Post Slideshow
 *
 * @package Worldstar
 */

jQuery(document).ready(function($) {

	/* Add flexslider to #post-slider div */ 
	$("#post-slider").flexslider({
		animation: worldstar_slider_params.animation,
		slideshowSpeed: worldstar_slider_params.speed,
		namespace: "zeeflex-",
		selector: ".zeeslides > li",
		smoothHeight: true,
		pauseOnHover: true,
		controlsContainer: ".post-slider-controls"
	});
	
});