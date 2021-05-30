'use strict';
(function () {
	const popupButton = document.querySelector('.btn--create-user');
	const formPopup = document.querySelector('.add-user-form');
	const popupCloseButton = document.querySelector('.add-user-form__close');

	function closePopup () {
		formPopup.classList.remove('active');
	}

	function showPopup () {
		formPopup.classList.add('active');
	}

	if (popupButton) {
		popupButton.addEventListener('click', function () {
			showPopup();
			popupCloseButton.addEventListener('click', closePopup);

			document.addEventListener('keydown', function (event) {
				if (event.type != 'keydown' || event.keyCode === 27) {
					closePopup();
				}
			});
		});
	}

})();
