
<form action="<?php echo base_url('authenticate/create_user'); ?>">
	
	<label id="new_user_username" for="login_string" class="form_label">Username</label>
	<br>
	<input type="text" name="login_string" id="login_string" class="form_input" maxlength="255" />
	
	<label id="login_password_label" for="login_pass" class="form_label">Password</label>
	<br>
	<input type="password" name="login_pass" id="login_pass" class="form_input password" 
		<?php if( config_item('max_chars_for_password') > 0 )
				echo 'maxlength="' . config_item('max_chars_for_password') . '"'; ?> 
			readonly="readonly" onfocus="this.removeAttribute('readonly');" />

	<!-- <input type="submit">
	<input type="submit">
	<input type="submit">
	<input type="submit"> -->
	<input type="submit">
</form>