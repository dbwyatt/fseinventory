<!-- begin header -->

<body>
	<div id="body-wrapper">
		<header id="header_main" class="container">

			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="<?php echo base_url('home'); ?>">
					<img src="http://files.fseinfo.net/fse_logo.jpg" width="200" height="50">
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
								<a class="divider">|</a>
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

						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li> -->

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
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>

			<div class="active_hr"></div>

		</header>

		<div id="body-content">

<!-- end header -->