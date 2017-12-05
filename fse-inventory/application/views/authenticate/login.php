<?php

// if( ! isset( $optional_login ) )
// {
// 	echo '<h1>Login</h1>';
// }

// if the user is good to go, allow the to try logging in
if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
			<div style="border:1px solid red;">
				<p>
					Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
				</p>
				<p>
					Username, email address and password are all case sensitive.
				</p>
			</div>
		';
	}

	if( $this->input->get(AUTH_LOGOUT_PARAM) )
	{
		echo '
			<div style="border:1px solid green">
				<p>
					You have successfully logged out.
				</p>
			</div>
		';
	}



// <form> begin
echo form_open( $login_url, ['class' => 'std-form'] ); ?>

	<div>

		<!-- Username Field -->
		<label id="login_username_label" for="login_string" class="form_label">Username or Email</label>
		<br>
		<input type="text" name="login_string" id="login_string" class="form_input" maxlength="255" />

		<br>
		<br>

		<!-- Password Field -->
		<label id="login_password_label" for="login_pass" class="form_label">Password</label>
		<br>
		<input type="password" name="login_pass" id="login_pass" class="form_input password" 
			<?php if( config_item('max_chars_for_password') > 0 )
					echo 'maxlength="' . config_item('max_chars_for_password') . '"'; ?> 
				readonly="readonly" onfocus="this.removeAttribute('readonly');" />


		<?php
			if( config_item('allow_remember_me') )
			{
		?>

			<br />

			<label id="login_rememberme_label" for="remember_me" class="form_label">Remember Me</label>
			<input type="checkbox" id="remember_me" name="remember_me" value="yes" />

		<?php
			}
		?>

		<p>
			<a href="<?php echo site_url('authenticate/recover'); ?>">Can't access your account?</a>
		</p>


		<input type="submit" name="submit" value="Login" id="submit_button"  />

	</div>

</form>

<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
			<div style="border:1px solid red;">
				<p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p>
					Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
			</div>
		';
	}
