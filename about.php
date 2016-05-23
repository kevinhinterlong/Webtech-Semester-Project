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
				Username: <input type="text" id="registerUsername" />
				Password: <input type="password" id="registerPassword" />
				Confirm Password: <input type="password" id="confirmPassword" />
				<input type="submit" value="Register" />
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

	<div class="main">
	    <div id="intro" class="content-pane">
		<div class="description left">
		    <h1>Who are we?</h1>
		    <p><?php echo $config["websiteName"]; ?> is a growing company started at IMSA.</p>
		    <p>Our goal is to create a user friendly way of assigning tasks and keeping track of tasks.</p>
		</div>
    
		<div class="feature right">
		    <div class="feature-image">
			<img src="https://pixabay.com/static/uploads/photo/2015/01/08/18/25/startup-593327_960_720.jpg" style="height:20%;" alt="computer">
		    </div>
		    <div class="feature-description">
			<h2>Description</h2>
		    </div>
		</div>
    
	    </div>


	    <div class="disclaimer">
		<div class="warning-picture">
		    <i class="material-icons">warning</i>
		</div>
		<div class="warning-preview">
		    Disclaimer!
		</div>
		<div class="warning-content">
		    Please note that this project was made for a school project and the above statements do not represent me or any company.</p>
		</div>
	    </div>

	</div>
	
	
	<script>

	    $( "#loginButton" ).click(function(event) {
		event.stopPropagation();
		$( "#loginForm" ).slideToggle();
	    });

	    $( "#loginForm" ).click( function(event) {
		event.stopPropagation();
	    });


	    $(document).click(function() {
		$("#loginForm").slideUp();
	    });

	    $( ".warning-content" ).hide();

	    $( ".disclaimer" ).hover(function() {
		$( ".warning-preview" ).toggle();
		$( ".warning-content" ).toggle();
	    });

	</script>
    </body>
</html>
