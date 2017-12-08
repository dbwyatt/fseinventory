<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row justify-content-center padding_large">
		<div class="col-sm-8">
			<h1>Account Recovery</h1>
			<hr>
		</div>
	</div>


		<?php
			
			$showform = 1;

			if(isset($validation_errors))
			{
		?>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<p>The following error occurred while changing your password:</p>
						<ul>
							<?php echo $validation_errors; ?>
						</ul>
						<p>PASSWORD NOT UPDATED</p>
					</div>
				</div>
		<?php
			}
			else
			{
				$display_instructions = 1;
			}

			if(isset($validation_passed))
			{
		?>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<p>You have successfully changed your password.</p>
						<p>You can now <a href="<?php echo base_url(LOGIN_PAGE); ?>">login</a></p>
					</div>
				</div>
		<?php

				$showform = 0;

			}
			if(isset($recovery_error))
			{
		?>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<p>No usable data for account recovery.</p>
						<p>
							Account recovery links expire after <?php echo ((int)config_item('recovery_code_expiration') / ( 60 * 60 )); ?> hours.
							<br>
							You will need to use the <a href="<?php echo base_url('authenticate/recover'); ?>">Account Recovery</a> form to send yourself a new link.
						</p>
					</div>
				</div>
		<?php

				$showform = 0;

			}
			if(isset($disabled))
			{
		?>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<p>Account recovery is disabled.</p>
						<p>You have exceeded the maximum login attempts or exceeded the allowed number of password recovery attempts. Please wait <?php echo ((int)config_item('seconds_on_hold') / 60); ?> minutes, or contact an administrator if you require assistance gaining access to your account.</p>
					</div>
				</div>
		<?php

				$showform = 0;

			}
			if($showform == 1)
			{
				if(isset($recovery_code, $user_id))
				{
					if(isset($display_instructions))
					{
						if(isset($username))
						{
		?>
					<div class="row justify-content-center">
						<div class="col-sm-8">
							<p>Your login user name is <i><?php echo $username; ?></i></p>
							<p>Please write this down, and change your password now:</p>
						</div>
					</div>
		<?php	
						}
						else
						{
		?>
							<div class="row justify-content-center">
								<div class="col-sm-8">
									<p>Please change your password now:</p>
								</div>
							</div>
		<?php
						}
					}

		?>
					<div class="row justify-content-center">
						<div class="col-sm-8 form_styled_container">
							
							<?php echo form_open(); ?>
								
								<div class="row justify-content-center">
									<fieldset>
										<legend>Choose your new password</legend>

										<!-- New Password Field -->
										<label for="passwd" class="col-form-label">New Password</label>
									    <input class="form-control" type="password" id="passwd" name="passwd" placeholder="New password" maxlength="<?php echo config_item('max_chars_for_password'); ?>">

									    <br>

										<!-- New Password Field -->
										<label for="passwd_confirm" class="col-form-label">Confirm New Password</label>
									    <input class="form-control" type="password" id="passwd_confirm" name="passwd_confirm" placeholder="Confirm new password" maxlength="<?php echo config_item('max_chars_for_password'); ?>">

									</fieldset>
								</div>
								
								<div class="row justify-content-center">
									<div class="col-sm-8">

										<?php
											// RECOVERY CODE *****************************************************************
											echo form_hidden('recovery_code',$recovery_code);

											// USER ID *****************************************************************
											echo form_hidden('user_identification',$user_id);

											// SUBMIT BUTTON **************************************************************
										?>
										
										<div class="row justify-content-center padding_top_large">
											<button type="submit" id="submit_button" class="btn btn-primary">Change Password</button>
										</div>

									</div>
								</div>
							</form>
						</div>
					</div>

		<?php
				}
			}
		?>
	</div>
</div>