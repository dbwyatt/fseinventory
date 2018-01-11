<div class="container">
	
	<div class="row justify-content-center padding_large">
		<div class="col-sm-8">
			<h1>Create New User Account</h1>
			<hr>
			Create a new valid user by filling out the form below.
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-6 form_styled_container">
			<form action="<?php echo base_url('authenticate/create_user'); ?>">
				
				<div class="row">
					<div class="col-sm-6">
						<!-- FIRST NAME -->
						<label for="new_firstname" class="col-form-label">First Name</label><br>
						<input type="text" name="new_firstname" id="new_firstname" class="form-control" placeholder="John">
					</div>
					<div class="col-sm-6">
						<!-- LAST NAME -->
						<label for="new_lastname" class="col-form-label">Last Name</label><br>
						<input type="text" name="new_lastname" id="new_lastname" class="form-control" placeholder="Doe">
					</div>
				</div>

				<br>

				<!-- EMAIL -->
				<label for="new_email" class="col-form-label">Email</label><br>
				<input type="email" class="form-control" id="new_email" name="new_email" aria-describedby="emailHelp" placeholder="example@example.com" required>

				<br>

				<!-- USERNAME -->
				<label for="new_username" class="col-form-label">Username</label><br>
				<input type="text" name="new_username" id="new_username" class="form-control" maxlength="20" placeholder="johndoe6" required>
				
				<br>

				<!-- PASSWORD -->
				<label for="new_password" class="col-form-label">Password</label><br>
				<input type="password" name="new_password" id="new_password" class="form-control" <?php if(config_item('max_chars_for_password') > 0){echo 'maxlength="'.config_item('max_chars_for_password').'"';} ?> placeholder="Password" required>

				<br>

				<!-- CONFIRM PASSWORD -->
				<label for="new_confirmpassword" class="col-form-label">Confirm Password</label><br>
				<input type="password" name="new_confirmpassword" id="new_confirmpassword" class="form-control" <?php if(config_item('max_chars_for_password') > 0){echo 'maxlength="'.config_item('max_chars_for_password').'"';} ?> placeholder="Confirm password" required>

				<br>

				<!-- ROLE PERMISSIONS -->
				<label for="new_userrolepermissions">User Role</label>
    			<select class="form-control" id="new_userrolepermissions">
			    	<option>Full Admin Rights</option>
			    	<option>Limited Admin Rights</option>
			    	<option>Viewing Rights Only</option>
			    </select>

			    <!-- SUBMIT -->
				<div class="row justify-content-center padding_top_medium">
					<button type="submit" class="btn btn-primary" id="creatue_user">Create User</button>
				</div>

			</form>

		</div>
	</div>

</div>