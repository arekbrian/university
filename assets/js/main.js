$( document ).ready(function() {
	$('.slide').owlCarousel({
		loop:true,
		nav:false,
		dots: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		autoplay:true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],	
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	// Get the container element
	var btnContainer = document.getElementById("menu-area");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("main-menu");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
	btns[i].addEventListener("click", function() {
		var current = document.getElementsByClassName("active");
		current[0].className = current[0].className.replace(" active", "");
		this.className += " active";
	});
}
});