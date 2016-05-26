<!DOCTYPE html>
<!-- Kevin Hinterlong DATE DESCRIPTION -->
<html>
<?php 
    $config = include("config.php");
    if(isset($_SESSION['username']) && $_POST["action"] == "logout") {
	session_destroy();
    }
    if(!isset($_SESSION['username'])){//only allow logged in users
	// header("Location:index.php");
    }
    echo "username" . $_SESSION['username'];
?>
    <head>
	<title>
	    <?php echo $config["websiteName"];  ?> - Tasks    
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="login.js" type="text/javascript"></script>
    </head>

    <body>
	<div class="header">
	    <h1>Welcome to <?php echo $config["websiteName"]; ?>!</h1>
	    <div id="login">
		<button id="loginButton">Login</button>
		<form class="vertical-form" id="loginForm" method="post">
		    <input type="text" placeholder="username" id="loginUsername" />
		    <input type="password" id="loginPassword" />
		    <input type="button" value="Login" onclick="login();" />
		    <span id="registerButton">Or Register Here</span>
		    <div id="register" class="modal">
			<div class="modal-content">
			    <span class="close"></span>
			    <form class="vertical-form" method="post">
				Username: <input type="text" id="registerUsername" />
				Password: <input type="password" id="registerPassword" />
				Confirm Password: <input type="password" id="confirmPassword" />
				<input type="button" value="Register" onclick="register();"/>
			    </form>
			</div>
		    </div>
		</form>
	    </div>

	    <div class="linkBar">
		<ul>
		    <li><a href="index.php"> <i class="material-icons">home</i> Home</a></li>
		    <li><a href="about.php"> <i class="material-icons">info</i> About</a></li>
		</ul>
	    </div>
	</div>

    </body>
</html>
