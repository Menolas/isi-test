'use strict';
(function () {
	const popupButton = document.querySelector('.btn--create-user');
	const formPopup = document.querySelector('#add-user');
	const popupCloseButton = document.querySelector('#add-user-form-close');
	const successMessage = document.querySelector('.users-page__message');
	const submitButton = formPopup.querySelector('.form__btn--add');

	function hideSuccessMessage () {
		if (successMessage && successMessage.classList.contains('users-page__message--success')) {
			successMessage.classList.remove('users-page__message--success');
			successMessage.textContent = '';
		}
	}

	function closePopup () {
		formPopup.classList.remove('active');
		hideSuccessMessage();
	}

	function showPopup () {
		formPopup.classList.add('active');
		hideSuccessMessage();
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

	if (successMessage) {
		setTimeout(hideSuccessMessage, 3000);
	}

})();
