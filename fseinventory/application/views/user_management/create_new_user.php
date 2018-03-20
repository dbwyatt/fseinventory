
<div class="container">
	
	<div class="row justify-content-center padding_large">
		<div class="col-md-8">
			<h1>Create New User Account</h1>
			<hr>
			Create a new valid user by filling out the form below.
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-6 form_styled_container">
			<form method="post" action="<?php echo base_url('authenticate/create_user'); ?>">
				
				<div class="row">
					<div class="col-md-6">
						<!-- FIRST NAME -->
						<label for="first_name" class="col-form-label">First Name</label><br>
						<input type="text" name="first_name" class="form-control" placeholder="John">
					</div>
					<div class="col-md-6">
						<!-- LAST NAME -->
						<label for="last_name" class="col-form-label">Last Name</label><br>
						<input type="text" name="last_name" class="form-control" placeholder="Doe">
					</div>
				</div>

				<br>

				<!-- EMAIL -->
				<label for="email" class="col-form-label">Email</label><br>
				<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@example.com" required>

				<br>

				<!-- USERNAME -->
				<label for="username" class="col-form-label">Username</label><br>
				<input type="text" name="username"  class="form-control" maxlength="20" placeholder="johndoe6" required>
				
				<br>

				<!-- PASSWORD -->
				<label for="passwd" class="col-form-label">Password</label><br>
				<input type="password" name="passwd" class="form-control" <?php if(config_item('max_chars_for_password') > 0){echo 'maxlength="'.config_item('max_chars_for_password').'"';} ?> placeholder="Password" required>

				<br>

				<!-- CONFIRM PASSWORD -->
				<label for="confirm_passwd" class="col-form-label">Confirm Password</label><br>
				<input type="password" id="confirm_passwd" class="form-control" <?php if(config_item('max_chars_for_password') > 0){echo 'maxlength="'.config_item('max_chars_for_password').'"';} ?> placeholder="Confirm password" required>

				<br>

				<!-- ROLE PERMISSIONS -->
				<label for="auth_level">User Role</label>
    			<select class="form-control" name="auth_level">
			    	<option value="9">Full Admin Rights</option>
			    	<option value="6">Limited Admin Rights</option>
			    	<option value="3">Viewing Rights Only</option>
			    </select>

			    <!-- SUBMIT -->
				<div class="row justify-content-center padding_top_medium">
					<button type="submit" class="btn btn-primary">Create User</button>
				</div>

			</form>

		</div>
	</div>

</div>