// JavaScript Document

var nice = false;

	jQuery(document).ready(function($) {
		
		
		jQuery('.navi').meanmenu();
	
		//nice = $("html").niceScroll();
		/*var nice = $("html,#menumodal").niceScroll({
			cursorcolor: "#202020",
			scrollspeed: 60,
			mousescrollstep: 30,
			boxzoom: false,
			autohidemode: false,
			cursorborder: "0 solid #202020",
			cursorborderradius: "0",
			cursorwidth: 10,
			background: "#666",
			horizrailenabled: false
		});*/
		
		//dropMenu();
	
	});

	/*function dropMenu(){
		$('#menu > li').each(function () {
			// options
			var distance = 10;
			var time = 400;
			var hideDelay = 200;
			var hideDelayTimer = null;
			var beingShown = false;
			var shown = false;
			var trigger = $('#menu li', this);
			var popup = $(this).children('.child').css('opacity', 0);
	
			// set the mouseover and mouseout on both element
			$(this).hover(function () {
				// stops the hide event if we move from the trigger to the popup element
				if (hideDelayTimer) clearTimeout(hideDelayTimer);
				// don't trigger the animation again if we're being shown, or already visible
				if (beingShown || shown) {
					return;
				} else 
				{
					beingShown = true;
					//reset position of popup box
					popup.css({ top:60, left:0, display: 'block' }).animate({ top:'-=' + distance + 'px', opacity:1}, time, 'swing', function()
					{
						// once the animation is complete, set the tracker variables
						beingShown = false;
						shown = true;
					});
				}
			}, function () {
				// reset the timer if we get fired again - avoids double animations
				if (hideDelayTimer) clearTimeout(hideDelayTimer);
				// store the timer so that it can be cleared in the mouseover if required
				hideDelayTimer = setTimeout(function () {
					hideDelayTimer = null;
					popup.animate({ top: '+=' + distance + 'px', opacity: 0}, 200, 'swing', function () {
						// once the animate is complete, set the tracker variables
						shown = false;
						// hide the popup entirely after the effect (opacity alone doesn't do the job)
						popup.css('display', 'none');
					});
				}, hideDelay);
			});
		});
	//end navigation
	}*/
	