<!-- begin header -->

<body>
	<div id="body-wrapper">
		<header id="header_main">
			<div id="logo_container">
				<img src="http://fseinc.net/images/01_home_03.gif">
			</div>

			<?php
				// this checks if a user is logged in and an admin
				// else do not show the admin navigation options
				if( isset($user_array) && $user_array['user_role'] == 'admin')
				{
			?>
				<nav id="nav_main">
					<ul>
						<li><a href="home.php">Home</a></li>
						<li><a class="divider">|</a></li> <!-- le pipe -->
						<li><a href="home.php">Tools</a></li>
						<li><a href="home.php">Office Equipment</a></li>
						<li><a href="home.php">Vehicles</a></li>
					</ul>
				</nav>
			<?php
				}
			?>

			
			<?php
				// this is where a logged in user will be able to
				// logout or go to their profile, etc., the user tools
				if(isset($user_aray))
				{
			?>
					<div class="user_tools">	
					
						<!-- ACCOUNT / USER -->
						<a href="<?php base_url($user_array['username']); ?>"><?php $user_array['username']; ?></a>

						<!-- LOGOUT -->
						<a href="<?php base_url('authenticate/logout'); ?>">Logout</a>

					</div>
			<?php
				}
			?>

		</header>

		<div id="body-content">

<!-- end header -->