<?php
/**
 * The template for displaying all pages
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package isi-test
 */

global $update_user;
print_r($update_user);

if (isset($_POST['delete-user'])) {
		//delete_user_by_id($update_user->id);
	}

$active = '';

if (isset($_POST['add-user'])) {
	
	$errors = [];
	$values = [];

	// validation of username

	if (isset($_POST['user-name']) && trim($_POST['user-name']) !== '') {

		$values['user-name'] = trim($_POST['user-name']);

		if (find_user_name($values['user-name'])) {
			$errors['user-name'] = 'Username already exist';
		}

	} else {
		$errors['user-name'] = 'Username field is empty';
	}

	// validation of first name

	if (isset($_POST['first-name']) && trim($_POST['first-name']) !== '') {

		$values['first-name'] = trim($_POST['first-name']);

	} else {
		$errors['first-name'] = 'First name field is empty';
	}

	//validation of last name

	if (isset($_POST['last-name']) && trim($_POST['last-name']) !== '') {

		$values['last-name'] = trim($_POST['last-name']);

	} else {
		$errors['last-name'] = 'Last name field is empty';
	}

	// email validation

	if (isset($_POST['email']) && trim($_POST['email']) !== '') {

		$values['email'] = trim($_POST['email']);

		if (filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {

			if (email_exist($values['email'])) {
				$errors['email'] = 'Email already exist';
			}

		} else {
			$errors['email'] = 'Email field is not valid';
		}

	} else {
		$errors['email'] = 'Email field is empty';
	}

	//type validation

	if (isset($_POST['type']) && trim($_POST['type']) !== '') {
		$values['type'] = trim($_POST['type']);
	} else {
		$errors['type'] = 'Define your type of user';
	}

	// password validation

	if (isset($_POST['password']) && trim($_POST['password']) !== '') {

		$values['password'] = trim($_POST['password']);

		if (strlen($values['password']) >= 8) {
			if (!validate_password($values['password'])) {
				$errors['password'] = 'Password min length 8 characters and at least one number and one letter';
			}

		} else {
			$errors['password'] = 'Password min length 8 characters and at least one number and one letter';
		}
	} else {

		$errors['password'] = 'Password field is empty';
	}

	if (isset($_POST['repeat-password']) && trim($_POST['repeat-password']) !== '') {

		$values['repeat-password'] = trim($_POST['repeat-password']);

		if ($values['repeat-password'] !== $values['password']) {
			$errors['repeat-password'] = 'Passwords are not match';
		}
	} else {
		$errors['repeat-password'] = 'Please repeat password';
	}

	if (count($errors) === 0) {
		$result = upload_user($values);
		if ($result) {
			$values = [];
			$active = '';
		} else {
			$active = 'active';
			$values = $values;
		}
	} else {
		$active = 'active';
		$values = $values;
	}
}

$users = get_isi_users();

get_header('users');

?>

 <main id="primary" class="site-main  users-page">
	<div class="container">
	
	    <div class="entry-content">
    
		    <div class="entry-content__inner-wrap">

		        <button class="btn  btn--create-user">Create User</button>

		        <!--users-table-->
				<div class="users-table">
					<div class="users-table__headers-row">
						<div class="users-table__headers-cell  users-table__headers-cell--username">
							<span>Username</span>
						</div>
						<div class="users-table__headers-cell  users-table__headers-cell--firstname">
							<span>First name</span>
						</div>
						<div class="users-table__headers-cell  users-table__headers-cell--lastname">
							<span>Last name</span>
						</div>
						<div class="users-table__headers-cell  users-table__headers-cell--email">
							<span>Email</span>
						</div>
						<div class="users-table__headers-cell  users-table__headers-cell--type">
							<span>Type</span>
						</div>
					</div>

					<?php if ($users) : ?>
						
						<?php foreach ($users as $key => $user) : ?>
							
							<div class="users-table__row" data-position="<?=$key?>"
								data-id="<?=$user->id?>">
								<div class="users-table__cell  users-table__cell--username">
									<span><?=$user->user_name;?></span>
								</div>
								<div class="users-table__cell  users-table__cell--firstname">
									<span><?=$user->first_name;?></span>
								</div>
								<div class="users-table__cell  users-table__cell--lastname">
									<span><?=$user->last_name;?></span>
								</div>
								<div class="users-table__cell  users-table__cell--email">
									<span><?=$user->email;?></span>
								</div>
								<div class="users-table__cell  users-table__cell--type">
									<span><?=$user->type;?></span>
								</div>
							</div>
						<?php endforeach; ?>
						
					<?php endif; ?>
					
				</div><!--.table-->

			</div> <!--.entry-content__inner-wrap-->

			<!--.add-user-form-->
            <div class="users-page__form-container">
			<form  id="add-user" class="add-user-form <?=$active;?>"
			    method="POST">
			    <button class="add-user-form__close">
			    	<span></span>
			    </button>
				<h3 class="add-user-form__title">Create new user</h3>

				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="user-name">Username*</label>
					<input class="add-user-form__input
					<?=isset($errors['user-name'])? 'add-user-form__input-error': ''?>" type="text" name="user-name" id="user-name"
						value="<?=isset($values['user-name']) ? $values['user-name'] : ''?>">
					<?php if (isset($errors['user-name'])) : ?>
						<p class="add-user-form__error"><?=$errors['user-name'];?></p>
					<?php endif; ?>
				</div>
				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="first-name">First name*</label>
					<input class="add-user-form__input
					<?=isset($errors['first-name'])? 'add-user-form__input-error': ''?>" type="text" name="first-name"  id="first-name"
					value="<?=isset($values['first-name']) ? $values['first-name'] : ''?>">

					<?php if (isset($errors['first-name'])) : ?>
						<p class="add-user-form__error"><?=$errors['first-name'];?></p>
					<?php endif; ?>
				</div>
				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="last-name">Last name*</label>
					<input class="add-user-form__input
					<?=isset($errors['last-name'])? 'add-user-form__input-error' : ''?>" type="text" name="last-name" id="last-name"
					value="<?=isset($values['last-name']) ? $values['last-name'] : ''?>">

					<?php if (isset($errors['last-name'])) : ?>
						<p class="add-user-form__error"><?=$errors['last-name'];?></p>
					<?php endif; ?>
				</div>
				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="email">Email*</label>
					<div class="add-user-form__email-input-wrap">
						<input class="add-user-form__input  add-user-form__input--email
						<?=isset($errors['email'])? 'add-user-form__input-error' : ''?>" type="text" name="email" id="email"
						value="<?=isset($values['email']) ? $values['email'] : ''?>">
					</div>

					<?php if (isset($errors['email'])) : ?>
						<p class="add-user-form__error"><?=$errors['email'];?></p>
					<?php endif; ?>
				</div>

				<!--select-->

				<div class="add-user-form__inner-wrap  add-user-form__inner-wrap--type">
					<span class="add-user-form__label">Type*</span>

					<div class="add-user-form__select" data-state="">
						<div class="add-user-form__select-input
						<?=isset($errors['type'])? 'add-user-form__input-error':''?>">
							
						</div>
						<div class="add-user-form__select-content">
							<input class="add-user-form__input" id="selectType0" type="radio" value="" name="type" checked>
						    
						    <input class="add-user-form__input" id="selectType1" type="radio" value="Administrator" name="type">
						    <label class="add-user-form__label" for="selectType1">Administrator</label>
						    <input class="add-user-form__input" id="selectType2" type="radio" value="Driver" name="type">
						    <label class="add-user-form__label" for="selectType2">Driver</label>
						</div>
					</div>

					<?php if (isset($errors['type'])) : ?>
						<p class="add-user-form__error"><?=$errors['type'];?></p>
					<?php endif; ?>
				</div> <!--select-->

				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="password">Password*</label>
					<input class="add-user-form__input
					<?=isset($errors['password'])? 'add-user-form__input-error':'';?>" type="password" name="password" id="password"
					value="<?=isset($values['password']) ? $values['password'] : '' ?>">

					<?php if (isset($errors['password'])) : ?>
						<p class="add-user-form__error"><?=$errors['password'];?></p>
					<?php endif; ?>
				</div>
				<div class="add-user-form__inner-wrap">
					<label class="add-user-form__label" for="repeat-password">Repeat password*</label>
					<input class="add-user-form__input
					<?=isset($errors['repeat-password'])? 'add-user-form__input-error':'';?>" type="password" name="repeat-password" id="repeat-password"
					value="<?=isset($values['repeat-password']) ? $values['repeat-password'] : '' ?>">

					<?php if (isset($errors['repeat-password'])) : ?>
						<p class="add-user-form__error"><?=$errors['repeat-password'];?></p>
					<?php endif; ?>
				</div>
			    <button class="btn  btn--create  add-user-form__btn" type="submit" name="add-user">Create</button>

			</form>
		    </div>
	
		</div><!-- .entry-content -->

	</div><!--.container -->

</main><!-- #main -->

<?php

get_footer();
