document.addEventListener("DOMContentLoaded", function () {
	var openBtn = document.querySelector("#toggle");
	openBtn.addEventListener("click", function (e) {
		e.preventDefault();

		openBtn.classList.toggle("rotate");

		var toggledMenu = document.querySelector("#toggled-menu");
		toggledMenu.classList.toggle("nav--active", "nav--inactive");
		toggledMenu.classList.toggle("nav--inactive");
	});

	// var closeBtn = document.querySelector("#toggle-close");
	// closeBtn.addEventListener("click", function (e) {
	// 	e.preventDefault();
	// 	document.querySelector("#toggled-menu").classList.toggle("nav--active");
	// 	document.querySelector("#toggled-menu").classList.toggle("nav--inactive");
	// });

	if (document.querySelector(".interactive-logo-column")) {
		var yellowBlob = document.getElementById("yellowHitbox");
		var greenBlob = document.getElementById("greenHitbox");
		var brownBlob = document.getElementById("brownHitbox");

		var yellowModal = document.getElementById("yellowModal");

		yellowBlob.addEventListener("mouseover", function () {
			yellowModal.classList.toggle("yellow--hovered");
			// console.log("modal on");
		});

		yellowBlob.addEventListener("mouseout", function () {
			yellowModal.classList.toggle("yellow--hovered");
			// console.log("modal off");
		});

		greenBlob.addEventListener("mouseover", function () {
			greenModal.classList.toggle("green--hovered");
			// console.log("modal on");
		});

		greenBlob.addEventListener("mouseout", function () {
			greenModal.classList.toggle("green--hovered");
			// console.log("modal off");
		});

		brownBlob.addEventListener("mouseover", function () {
			brownModal.classList.toggle("brown--hovered");
			// console.log("modal on");
		});

		brownBlob.addEventListener("mouseout", function () {
			brownModal.classList.toggle("brown--hovered");
			// console.log("modal off");
		});
	}

	//autoscroll statement of beliefs
	var x = 0;
	var startScroll;
	var speed = 8;

	$("#scroll").scroll(function () {
		x = $(this).scrollTop();

		if (x + $(this).innerHeight() >= $(this)[0].scrollHeight) {
		}
	});

	if ($("#pause").hasClass("active")) {
		startScroll = setInterval(scroller, 400 / speed);
	}

	$(".scroll-btn").on("click", function () {
		$("#play").toggleClass("active");
		$("#pause").toggleClass("active");

		if ($("#play").hasClass("active")) {
			clearInterval(startScroll);
		} else {
			startScroll = setInterval(scroller, 400 / speed);
		}
	});

	function scroller() {
		x += 1;
		$("#scroll").scrollTop(x);
	}

	function reset() {
		$("#scroll").animate({ scrollTop: 0 }, 500);
	}

	$("#back").click(function () {
		reset();
	});

	//draggable timeline
	$(".timeline-container").draggable({
		axis: "x",

		containment: $(this).parent(),
	});

	//iframe overlay behaviour
	var iframe = $(".iframe-container");
	var overlay = $(".overlay");
	var blurb = $(".__info-blurb");
	var moreInfoIcon = $(".more-info");

	// iframe.hover(function () {
	// 	$(this).parent().find(blurb).addClass("reveal");
	// 	$(this).find(overlay).fadeOut();
	// 	$(this).parent().find(moreInfoIcon).fadeIn();
	// });

	// $(window).on("resize", function () {
	// 	if ($(window).width() < 768) {
	// 		iframe.parent().find(blurb).addClass("reveal");
	// 		iframe.find(overlay).fadeOut();
	// 		iframe.parent().find(moreInfoIcon).fadeIn();
	// 	} else {
	// 		iframe.parent().find(blurb).removeClass("reveal");
	// 		iframe.find(overlay).fadeIn();
	// 		iframe.parent().find(moreInfoIcon).fadeOut();
	// 	}
	// });

	//resource slider
	// $(".resource-columns").slick({
	// 	slidesToShow: 3,
	// 	slidesToScroll: 1,
	// });
});
