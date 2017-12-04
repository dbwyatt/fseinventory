<!-- begin header -->

<?php //test variables
	
	$user_array = array('first_name' => 'John',
				   		'last_name' => 'Goodman',
				   		'username' => 'johnbgood22',
				  		'user_role' => 'admin');

	$active_user = FALSE;

	if($user_array['username'])
		$active_user = TRUE;

	//print_r($user_array);
?>

<body>
	<div id="body-wrapper">
		<header id="header_main">
			<div id="logo_container">
				<img src="http://fseinc.net/images/01_home_03.gif">
			</div>

			<!-- <div class="navbar"> -->
			<nav id="nav_main">
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a class="divider">|</a></li> <!-- le pipe -->
					<li><a href="home.php">Tools</a></li>
					<li><a href="home.php">Office Equipment</a></li>
					<li><a href="home.php">Vehicles</a></li>
				</ul>
			</nav>
			<!-- </div> -->
			
			<div class='user_tools'>
				<?php 
					if($active_user)
					{
						echo "<a href='" . base_url($user_array['username']) . "'>" . $user_array['username'] . "</a>";
					}
					else
					{
						echo "<ul>
								<li><a href='login.php'>Login</a></li>
							  	<li><a href='register.php'>Register</a></li>
							  </ul>";
					}
				?>
			</div>

		</header>

		<div id="body-content">

<!-- end header -->