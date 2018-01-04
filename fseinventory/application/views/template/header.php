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
					<a style="position: absolute;" href="<?php echo base_url('usermanagement/create_new_user'); ?>">Create Account</a>
				<?php 
				}

				// show all navigation for admins
				if(isset($auth_role) && $auth_role == 'admin')
				{
			?>
					<nav id="nav_main">
						<ul>
							<li><a href="<?php echo base_url('home'); ?>" class="<?php echo strtolower($this->uri->segment(1)) == 'home' ? 'active' : '' ?>">Home</a></li>
							<li><a class="divider">|</a></li> <!-- le pipe -->
							<li><a href="<?php echo base_url('tools'); ?>" class="<?php echo strtolower($this->uri->segment(1)) == 'tools' ? 'active' : '' ?>">Tools</a></li>
							<li><a href="<?php echo base_url('offices'); ?>" class="<?php echo strtolower($this->uri->segment(1)) == 'offices' ? 'active' : '' ?>">Office Equipment</a></li>
							<li><a href="<?php echo base_url('vehicles'); ?>" class="<?php echo strtolower($this->uri->segment(1)) == 'vehicles' ? 'active' : '' ?>">Vehicles</a></li>
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
								<a href="<?php echo base_url('usermanagement/profile/' . $auth_username); ?>"><?php echo $auth_username; ?></a>
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