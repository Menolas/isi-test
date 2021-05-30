jQuery(document).ready(function ($) {

	$('.users-table__row').click(function (e) {
		var userId = $(this).attr('data-id');

		ajaxUserUpload(userId);
	});

	function ajaxUserUpload(userId) {
		jQuery.post(
			myPlugin.ajaxurl,
			{
				action: 'get_user',
				userid: userId
			},
			function (response) {
				$('#add-user').remove();
				$('.users-page__form-container').html(response);

				$('.delete-user-form__btn').click(function (e) {
					
					var deleteUserId = $(this).attr('data');

					jQuery.post(
						myPlugin.ajaxurl,
						{
							action: 'delete_user',
							deleteUserId: deleteUserId
						}
					);
				});

				$(".update-user-form__btn").click(function (e) {
					//e.preventDefault();

					var editUserId = $(this).attr('data');

					jQuery.post(
						myPlugin.ajaxurl,
						{
							action: 'edit_user',
							editUserId: editUserId
						}
					);

				});

			}
		);
	}

});
