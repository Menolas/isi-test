jQuery(document).ready(function ($) {

	$('.users-table__row').click(function (e) {
		$('.users-table__row').each(function(i, elem) {
			if ($(this).hasClass('users-table__row--clicked')) {
				$(this).removeClass('users-table__row--clicked');
			}
		});
		$(this).addClass('users-table__row--clicked');
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
				if ($('#add-user').hasClass('active')) {
					$('#add-user').removeClass('active');
				}
				$('.form-container--edit-user').html(response);

				$('#edit-user-form-close').click(function () {

					$('#edit-user').css("display", "none");

				});

				$('#delete').click(function (e) {
					
					var deleteUserId = $(this).attr('data');

					jQuery.post(
						myPlugin.ajaxurl,
						{
							action: 'delete_user',
							deleteUserId: deleteUserId
						}
					);
				});

				$("#edit-user").submit(function(e) {
					e.preventDefault();
					
					var editForm = $(this);

					    jQuery.post(
					    	myPlugin.ajaxurl,
					        {
					        	action: 'edit_user_by_data',
					            formData: editForm.serialize(),
					        },
					        function (response) {
					        	
					        	$('.form-container--edit-user').html(response);
					        	$('#edit-user-form-close').click(function () {

									$('#edit-user').css("display", "none");

								});
					        }
					    );
				});
			}
		);
	}
});
