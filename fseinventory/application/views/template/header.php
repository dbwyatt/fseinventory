<!-- begin header -->

<body>
	<div id="body-wrapper">
		<header id="header_main">

			<nav class="navbar fixed-top navbar-expand-md navbar-light">
				<a class="navbar-brand" href="<?php echo base_url('home'); ?>">
					<img src="http://files.fseinfo.net/fse_logo.jpg" height="50">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						
						<?php if(! isset($auth_role)) { ?>
							<li class="nav-item">
								<a href="<?php echo base_url('usermanagement/create_new_user'); ?>">Create Account</a>
							</li>
						<?php } ?>

						<?php if(isset($auth_role) && $auth_role == 'admin') { ?>
							<li class="nav-item <?php echo strtolower($this->uri->segment(1)) == 'home' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link divider">|</a>
							</li> <!-- le pipe -->
							<li class="nav-item <?php echo strtolower($this->uri->segment(1)) == 'tools' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url('tools'); ?>">Tools</a>
							</li>
							<li class="nav-item <?php echo strtolower($this->uri->segment(1)) == 'offices' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url('offices'); ?>">Office Equipment</a>
							</li>
							<li class="nav-item <?php echo strtolower($this->uri->segment(1)) == 'vehicles' ? 'active' : '' ?>">
								<a class="nav-link" href="<?php echo base_url('vehicles'); ?>">Vehicles</a>
							</li>
						<?php } ?>
					</ul>

					<!-- USER CONTROLS -->
					<?php if(isset($auth_username)) { ?>
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
					<?php }	?>
					
					<!-- NAV SEARCH -->
					<?php if(isset($auth_role) && $auth_role == 'admin') { ?>
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Search">
	    					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					<?php } ?>
				
				</div>
			</nav>

			<!-- <div class="active_hr"></div> -->

		</header>

		<div id="body-content">

<!-- end header -->