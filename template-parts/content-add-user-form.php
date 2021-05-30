<?php


?>

<form  class="add-user-form  
    <?php
        if (isset($errors)): ?>
        <?='active';?>
        <?php endif; ?>" method="POST" action="#">
	<h3 class="add-user-form__title">Create new user</h3>

	<div class="add-user-form__inner-wrap">
		<label class="add-user-form__label" for="user-name">Username*</label>
		<input class="add-user-form__input  
		<?=isset($errors['user-name'])? 'add-user-form__input-error':'';?>" type="text" name="user-name" id="user-name"
		value="<?=isset($user['user-name']) ? $user['user-name'] : '' ?>">

		<?php if (isset($errors['user-name'])) : ?>
			<p class="add-user-form__error"><?=$errors['user-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="add-user-form__inner-wrap">
		<label class="add-user-form__label" for="first-name">First name*</label>
		<input class="add-user-form__input
		<?=isset($errors['first-name'])? 'add-user-form__input-error':'';?>" type="text" name="first-name"  id="first-name"
		value="<?=isset($user['first-name']) ? $user['first-name'] : '' ?>">

		<?php if (isset($errors['first-name'])) : ?>
			<p class="add-user-form__error"><?=$errors['first-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="add-user-form__inner-wrap">
		<label class="add-user-form__label" for="last-name">Last name*</label>
		<input class="add-user-form__input
		<?=isset($errors['last-name'])? 'add-user-form__input-error':'';?>" type="text" name="last-name" id="last-name"
		value="<?=isset($user['last-name']) ? $user['last-name'] : '' ?>">

		<?php if (isset($errors['last-name'])) : ?>
			<p class="add-user-form__error"><?=$errors['last-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="add-user-form__inner-wrap">
		<label class="add-user-form__label" for="email">Email*</label>
		<input class="add-user-form__input
		<?=isset($errors['email'])? 'add-user-form__input-error':'';?>" type="text" name="email" id="email"
		value="<?=isset($user['email']) ? $user['email'] : '' ?>">

		<?php if (isset($errors['email'])) : ?>
			<p class="add-user-form__error"><?=$errors['email'];?></p>
		<?php endif; ?>
	</div>

	<!--select-->

	<div class="add-user-form__inner-wrap  add-user-form__inner-wrap--type">
		<span class="add-user-form__label">Type*</span>

		<div class="add-user-form__select" data-state="">
			<div class="add-user-form__select-input
			<?=isset($errors['type'])? 'add-user-form__input-error':'';?>">
				<?php if (isset($user['type'])) :
					echo $user['type'];
					endif; ?>
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
		value="<?=isset($user['password']) ? $user['password'] : '' ?>">

		<?php if (isset($errors['password'])) : ?>
			<p class="add-user-form__error"><?=$errors['password'];?></p>
		<?php endif; ?>
	</div>
	<div class="add-user-form__inner-wrap">
		<label class="add-user-form__label" for="repeat-password">Repeat password*</label>
		<input class="add-user-form__input
		<?=isset($errors['repeat-password'])? 'add-user-form__input-error':'';?>" type="password" name="repeat-password" id="repeat-password"
		value="<?=isset($user['repeat-password']) ? $user['repeat-password'] : '' ?>">

		<?php if (isset($errors['repeat-password'])) : ?>
			<p class="add-user-form__error"><?=$errors['repeat-password'];?></p>
		<?php endif; ?>
	</div>
    <button class="btn  btn--create  add-user-form__btn" type="submit" name="add-user">Create</button>
</form>


