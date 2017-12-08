<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container ">
	<div class="row justify-content-center padding_large">
		<div class="col-sm-8">
			<h1>Account Recovery</h1>
			<hr>
		</div>
	</div>

	<?php
		if(isset($disabled))
		{ ?>
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<p>
						Account Recovery is Disabled.
					</p>
					<p>
						If you have exceeded the maximum login attempts, or exceeded
						the allowed number of password recovery attempts, account recovery 
						will be disabled for a short period of time. 
						Please wait <?php echo ((int)config_item('seconds_on_hold') / 60 ); ?> 
						minutes, or contact an administrator if you require assistance gaining access to your account.
					</p>
				</div>
			</div>
	<?php
		}
		else if(isset($banned))
		{
	?>
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<p>
						Account Locked.
					</p>
					<p>
						You have attempted to use the password recovery system using 
						an email address that belongs to an account that has been 
						purposely denied access to the authenticated areas of this website. 
						If you feel this is an error, you may contact an administrator  
						to make an inquiry regarding the status of the account.
					</p>
				</div>
			</div>
	<?php
		}
		else if(isset($confirmation))
		{ 
	?>
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<p>
						Congratulations, you have created an account recovery link.
					</p>
					<p>
						<b>Please note</b>: The account recovery link would normally be placed in an email, 
						and you would not see it here on the screen. This is to limit the code in the 
						Examples controller, and keep your focus on learning Community Auth, but give you 
						an idea of how to implement account recovery. <b>When you do end up writing code to send 
						the recovery link to an email address, you will want to delete it from this view, 
						delete these instructions, and instead have a simple message similar to the following</b>:
					</p>
					
					<p>"We have sent you an email with instructions on how to recover your account."</p>

					<p>Please click the following link so we can help you access your account:</p>
					<?php echo $special_link; ?>
				</div>
			</div>
	<?php
		}
		else if(isset($no_match)) // BOOTSTRAP NOTIFY
		{
	?>
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<p class="feedback_header">
						Supplied email did not match any record.
					</p>
				</div>
			</div>
	<?php
			$show_form = 1;
		}
		else
		{
	?>
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<br>
					<p>
						If you've forgotten your password and/or username, 
						enter the email address used for your account, 
						and we will send you an e-mail 
						with instructions on how to access your account.
					</p>
					<br>
				</div>
			</div>
	<?php
			$show_form = 1;
		}
		if(isset($show_form))
		{
	?>
			<div class="row justify-content-center">
				<div class="col-sm-6 form_styled_container">
					<!-- NEED EMAIL FEATURE BUILT -->
					<?php echo form_open(); ?>
						<div class="row justify-content-center">
							<fieldset>
								<legend class="padding_medium">Enter your account's email address</legend>

								<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address">
							</fieldset>
						</div>
						
						<div class="row justify-content-center padding_top_large">
							<button type="submit" id="submit_button" class="btn btn-primary">Send Email</button>
						</div>

					</form>
				</div>

				<div class="row justify-content-center">
					<div class="col-sm-8">
						<p class="lightgrey">If you do not remember the email your account is associated with, please contact administrative support.</p>
					</div>
				</div>

			</div>

	<?php
		}
	?>

</div>