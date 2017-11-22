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

<style>
	@font-face
	{
		font-family: "San Francisco";
    	src: url(../fonts/SanFranciscoText-Regular.otf);
	}
	/*@font-face
	{
		font-family: San Francisco Regular;
    	src: url(../sanfranciscoreg.rtf);
	}
	@font-face
	{
		font-family: San Francisco Regular;
    	src: url(../sanfranciscoreg.rtf);
	}
	@font-face
	{
		font-family: San Francisco Regular;
    	src: url(../sanfranciscoreg.rtf);
	}*/


	body
	{
		margin: 0;
		padding: 0;
	}

	#header_main
	{
		display: flex;
		width: 100%;
		justify-content: center;
	    border-bottom: 1px solid #009933;
	}
	#logo_container
	{
		display: flex;
		order: 1;
		padding-bottom: 20px;
	}
	#nav_main 
	{
		display: flex;
		order: 2;
		margin: auto 0;
		/*flex-grow: 2;*/
		/*padding-top: 22px;*/
	}
	#nav_main ul
	{
		list-style: none;
		display: flex;
	}
	#nav_main ul li
	{
		/*padding: 5px 7.5px;*/
		padding: 30px;
		transition: .25s;
	}
	#nav_main ul li:hover
	{
		background-color: #009933;
		color: white;
	}
	#nav_main ul li a
	{
		text-decoration: none;
		/*transition: .25s;*/
	}
	#nav_main ul li a:hover 
	{
		/*background-color: #009933;
		color: white;*/
	}
	.user_tools
	{
		display: flex;
		order: 3;
		margin: auto 0 auto 50px;
		padding: 20px 40px;
		background-color: lightgrey;
	}
</style>

<header id="header_main">
	<div id="logo_container">
		<img src="http://fseinc.net/images/01_home_03.gif">
	</div>

	<!-- <div class="navbar"> -->
	<nav id="nav_main">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li> | </li> <!-- le pipe -->
			<li><a href="home.php">Test1</a></li>
			<li><a href="home.php">Test2</a></li>
			<li><a href="home.php">Test3</a></li>
			<li><a href="home.php">Test4</a></li>
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

<!-- end header -->