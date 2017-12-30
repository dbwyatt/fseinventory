<!-- begin header -->

<body>
	<div id="body-wrapper">
		<header id="header_main">
			<div id="logo_container">
				<a href="<?php echo base_url('home'); ?>"><img src="http://files.fseinfo.net/fse_logo.jpg"></a>
			</div>

			<?php
				//TEMP create_user access
				if(! isset($auth_role)) { ?>
					<a style="position: absolute;" href="<?php echo base_url('user_management/create_new_user'); ?>">Create Account</a>
				<?php 
				}

				// show all navigation for admins
				if(isset($auth_role) && $auth_role == 'admin')
				{
			?>
					<nav id="nav_main">
						<ul>
							<li><a href="<?php echo base_url('home'); ?>">Home</a></li>
							<li><a class="divider">|</a></li> <!-- le pipe -->
							<li><a href="<?php echo base_url('all_tools'); ?>">Tools</a></li>
							<li><a href="<?php echo base_url('all_office'); ?>">Office Equipment</a></li>
							<li><a href="<?php echo base_url('all_vehicles'); ?>">Vehicles</a></li>
						</ul>
					</nav>
			<?php
				}
			?>

			<?php
				if(isset($auth_username))
				{
			?>
					<div class="user_tools">	
						<ul>
							<li>
								<!-- ACCOUNT / USER -->
								<a href="<?php echo base_url('user_management/profile/' . $auth_username); ?>"><?php echo $auth_username; ?></a>
							</li>
							<li>
								<!-- LOGOUT -->
								<a href="<?php echo base_url('authenticate/logout'); ?>">Logout</a>
							</li>
						</ul>
					</div>
			<?php
				}
			?>

		</header>

		<div id="body-content">

<!-- end header -->