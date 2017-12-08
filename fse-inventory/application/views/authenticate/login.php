
<div class="container">
	
	<?php

	// if the user is good to go, allow the to try logging in
	if(!isset($on_hold_message))
	{
		if(isset($login_error_mesg))
		{
	?>
			<div class="row justify-content-center padding_medium">
				<div class="col-sm-6">
					<p>
						Login Error #<?php echo $this->authentication->login_errors_count; ?>/<?php echo config_item('max_allowed_attempts'); ?>: Invalid Username, Email Address, or Password.
					</p>
					<p>
						Username, email address and password are all case sensitive.
					</p>
				</div>
			</div>
	<?php
		}

		if($this->input->get(AUTH_LOGOUT_PARAM))
		{
			//display logout notification BOOTSTRAP NOTIFY
	?>
			<div class="row justify-content-center padding_medium">
				<div class="col-sm-6">
					<div id="logout_status_message" class="alert alert-primary alert-dismissable" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						You have successfully logged out.
					</div>
				</div>
			</div>
	<?php
		}


		// <form> begin
		echo form_open($login_url, ['class' => 'std-form']);
	?>
			<div class="row justify-content-center padding_large">
				<div class="col-sm-9 col-md-5 form_styled_container">
					<!-- Username Field -->
					<label for="login_string" class="col-form-label">Username or Email</label>
					<input type="text" name="login_string" class="form-control" id="login_string" maxlength="255" placeholder="Username or email">

					<br>

					<!-- Password Field -->
					<label for="login_pass" class="col-form-label">Password</label>
				    <input class="form-control" name="login_pass" type="password" id="login_pass" placeholder="Password"
					    <?php if(config_item('max_chars_for_password') > 0)
								echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
						?>>

					<br>

					<?php
						if(config_item('allow_remember_me'))
						{
					?>
							<input type="checkbox" id="remember_me" name="remember_me" value="yes" />
							<label id="login_rememberme_label" for="remember_me" class="form_label">Remember Me</label>
					<?php
						}
					?>

					<br>

					<div class="row justify-content-center padding_top_medium">
						<button type="submit" class="btn btn-primary" id="submit_button">Login</button>
					</div>

					<div class="row justify-content-center padding_top_medium">
						<a class="lightgrey" href="<?php echo site_url('authenticate/recover'); ?>">Can't access your account?</a>
					</div>

				</div>
			</div>
		</form>

	<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
	?>
			
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<p>Excessive Login Attempts</p>
				<p>You have exceeded the maximum number of failed login attempts that this website will allow.</p>
				<p>
					Your access to login and account recovery has been blocked for <?php echo ((int)config_item('seconds_on_hold') / 60); ?> minutes.
				</p>
				<p>
					Please use the <a href="/examples/recover">Account Recovery</a> after <?php echo ((int)config_item('seconds_on_hold') / 60); ?> minutes has passed or contact an administrator if you require assistance gaining access to your account.
				</p>
			</div>
		</div>
	<?php
	}
	?>

</div>