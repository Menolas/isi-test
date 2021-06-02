'use strict';
(function () {
	const select = document.querySelector('.form__select');
	const selectOpen = document.querySelector('.form__select-input');
	const selectLabels = document.querySelectorAll('.form__select .form__label');

	function toggleSelector () {
		select.classList.toggle('form__select--opened');
	}
    
    if (selectOpen) {
		selectOpen.addEventListener('click', () => {
			toggleSelector();
		});


		for (let i = 0; i < selectLabels.length; i++) {
			selectLabels[i].addEventListener('click', (evt) => {
				selectOpen.textContent = evt.target.textContent;
				select.classList.remove('form__select--opened');

			});
		}
	}

})();
