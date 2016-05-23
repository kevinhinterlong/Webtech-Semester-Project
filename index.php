<!DOCTYPE html>
<!-- Kevin Hinterlong May 22, 2015 The index of the task assigner website -->
<html>
<?php $config = include("config.php"); ?>
    <head>
	<title>
	    <?php echo $config["websiteName"];  ?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="login.js" type="text/javascript"></script>
    </head>

    <body onload="initialize();">
	<div class="header">
	    <h1>Welcome to <?php echo $config["websiteName"]; ?>!</h1>
	    <div id="login">
		<button id="loginButton">Login</button>
		<form class="vertical-form" id="loginForm">
		    <input type="text" placeholder="username" />
		    <input type="password" />
		    <input type="button" value="Login" />
		    <span id="registerButton">Or Register Here</span>
		    <div id="register" class="modal">
			<div class="modal-content">
			    <span class="close"></span>
			    <form class="vertical-form">
				<input type="text" id="registerUsername" />
				<input type="password" id="registerPassword" />
				<input type="password" id="confirmPassword" />
				<input type="submit" value="Register" />
			    </form>
			</div>
		    </div>
		</form>
	    </div>

	    <div class="linkBar">
		<ul>
		    <li><a href="index.html"> <i class="material-icons">home</i> Home</a></li>
		    <li><a href="about.html"> <i class="material-icons">info</i> About</a></li>
		</ul>
	    </div>
	</div>

	<div class="main">
	    <div id="intro" class="content-pane">
		<div class="description">
		    <p>Do you ever feel like keeping track of your family is impossible?</p>
		    <p>Is it getting too difficult to keep track of what you need to do?</p>
		    <p>With <?php echo $config["websiteName"]; ?>, you'll be able to do all that and more!</p>
		</div>
    
		<div class="feature">
		    <div class="feature-image">
			<img src="https://pixabay.com/static/uploads/photo/2013/07/12/18/22/checklist-153371_960_720.png" alt="checklist">
		    </div>
		    <div class="feature-description">
			<h2>"I use this product all the time. It's fantastic!"</h2>
		    </div>
		</div>
    
	    </div>

	</div>
	
	
	<script>

	    $( "#loginButton" ).click(function() {
	      $( "#loginForm" ).slideToggle();
	    });
	</script>
    </body>
</html>
