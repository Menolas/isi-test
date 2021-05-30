'use strict';
(function () {
	const select = document.querySelector('.add-user-form__select');
	const selectOpen = document.querySelector('.add-user-form__select-input');
	const selectLabels = document.querySelectorAll('.add-user-form__select .add-user-form__label');

	function toggleSelector () {
		select.classList.toggle('add-user-form__select--opened');
	}
    
    if (selectOpen) {
		selectOpen.addEventListener('click', () => {
			toggleSelector();
		});


		for (let i = 0; i < selectLabels.length; i++) {
			selectLabels[i].addEventListener('click', (evt) => {
				selectOpen.textContent = evt.target.textContent;
				select.classList.remove('add-user-form__select--opened');

			});
		}
	}

})();
