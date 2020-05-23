document.addEventListener("DOMContentLoaded", function () {
	var openBtn = document.querySelector("#toggle");
	openBtn.addEventListener("click", function (e) {
		e.preventDefault();

		var toggledMenu = document.querySelector("#toggled-menu");
		toggledMenu.classList.toggle("nav--active", "nav--inactive");
		toggledMenu.classList.toggle("nav--inactive");
	});

	var closeBtn = document.querySelector("#toggle-close");
	closeBtn.addEventListener("click", function (e) {
		e.preventDefault();
		document.querySelector("#toggled-menu").classList.toggle("nav--active");
		document.querySelector("#toggled-menu").classList.toggle("nav--inactive");
	});

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
	$("#scroll").animate(
		{
			scrollTop: $("#scroll")[0].scrollHeight,
		},
		2000
	);
	//autoscroll statement of beliefs
	if (document.querySelector(".autoscroll-statement")) {
	}
});
