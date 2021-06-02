<form  id="edit-user" class="form active" method="POST">
	<h3 class="form__title">Create new user</h3>
	<div id="edit-user-form-close" class="form__close">
    	<span></span>
    </div>

	<input type="hidden" name="user-id" value="<?=$update_user->id?>">

	<div class="form__inner-wrap">
		<label class="form__label" for="user-name">Username*</label>
		<input class="form__input  
		<?=isset($errors['user-name'])? 'form__input-error':'';?>" type="text" name="user-name" id="user-name"
		value="<?=isset($edit_user_data['user-name']) ? $edit_user_data['user-name'] : ''?>">

		<?php if (isset($errors['user-name'])) : ?>
			<p class="form__error"><?=$errors['user-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="form__inner-wrap">
		<label class="form__label" for="first-name">First name*</label>
		<input class="form__input
		<?=isset($errors['first-name'])? 'form__input-error':'';?>" type="text" name="first-name"  id="first-name"
		value="<?=isset($edit_user_data['first-name']) ? $edit_user_data['first-name'] : ''?>">

		<?php if (isset($errors['first-name'])) : ?>
			<p class="form__error"><?=$errors['first-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="form__inner-wrap">
		<label class="form__label" for="last-name">Last name*</label>
		<input class="form__input
		<?=isset($errors['last-name'])? 'form__input-error':'';?>" type="text" name="last-name" id="last-name"
		value="<?=isset($edit_user_data['last-name']) ? $edit_user_data['last-name'] : ''?>">

		<?php if (isset($errors['last-name'])) : ?>
			<p class="form__error"><?=$errors['last-name'];?></p>
		<?php endif; ?>
	</div>
	<div class="form__inner-wrap">
		<label class="form__label" for="email">Email*</label>
		<div class="form__email-input-wrap">
			<input class="form__input form__input--email
			<?=isset($errors['email'])? 'form__input-error':'';?>" type="text" name="email" id="email"
			value="<?=isset($edit_user_data['email']) ? $edit_user_data['email'] : '' ?>">
		</div>

		<?php if (isset($errors['email'])) : ?>
			<p class="form__error"><?=$errors['email'];?></p>
		<?php endif; ?>
	</div>

	<!--select-->

	<div class="form__inner-wrap  form__inner-wrap--type">
		<span class="form__label">Type*</span>

		<div class="form__select" data-state="">
			<div class="form__select-input
			<?=isset($errors['type'])? 'form__input-error':'';?>">
				<?=isset($edit_user_data['type']) ? $edit_user_data['type'] : ''?>
			</div>
			<div class="form__select-content">
				<input class="form__input" id="selectType0" type="radio" value="" name="type" checked>
			    
			    <input class="form__input" id="selectType1" type="radio" value="Administrator" name="type"
			    <?=($update_user->type === 'Administrator') ? 'checked' : ''?>>
			    <label class="form__label" for="selectType1">Administrator</label>
			    <input class="form__input" id="selectType2" type="radio" value="Driver" name="type"
			    <?=($update_user->type === 'Driver') ? 'checked' : ''?>>
			    <label class="form__label" for="selectType2">Driver</label>
			</div>
		</div>

		<?php if (isset($errors['type'])) : ?>
			<p class="form__error"><?=$errors['type'];?></p>
		<?php endif; ?>
	</div> <!--select-->

	<div class="form__inner-wrap">
		<label class="form__label" for="password">Password*</label>
		<input class="form__input
		<?=isset($errors['password'])? 'form__input-error':'';?>" type="password" name="password" id="password"
		value="<?=isset($edit_user_data['password']) ? $edit_user_data['password'] : ''?>">

		<?php if (isset($errors['password'])) : ?>
			<p class="form__error"><?=$errors['password'];?></p>
		<?php endif; ?>
	</div>
	<div class="form__inner-wrap">
		<label class="form__label" for="repeat-password">Repeat password*</label>
		<input class="form__input
		<?=isset($errors['repeat-password'])? 'form__input-error':'';?>" type="password" name="repeat-password" id="repeat-password"
		value="<?=isset($edit_user_data['repeat-password']) ? $edit_user_data['repeat-password'] : '' ?>">

		<?php if (isset($errors['repeat-password'])) : ?>
			<p class="form__error"><?=$errors['repeat-password'];?></p>
		<?php endif; ?>
	</div>
	<div class="form__inner-wrap  form__inner-wrap--button">
		<button id="delete" class="btn  form__btn  form__btn--delete" name="delete-user" 
		data="<?=$update_user->id?>" value="delete">Delete</button>
	    <button class="btn  form__btn  form__btn--update" type="submit" name="update-user"
	    data="<?=$update_user->id?>">Save</button>
	</div>
</form>
