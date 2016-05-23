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

    <body onload="initialize();" style="background-image: url(bg.png)">
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
		    <p>Do you ever feel like keeping track of your family is impossible?</p>
		    <p>Is it getting too difficult to keep track of what you need to do?</p>
		    <p>With <?php echo $config["websiteName"]; ?>, you'll be able to do all that and more!</p>
		</div>
    
		<div class="feature right">
		    <div class="feature-image">
			<img src="https://pixabay.com/static/uploads/photo/2013/07/12/18/22/checklist-153371_960_720.png" alt="checklist">
		    </div>
		    <div class="feature-description">
			<h2>"I use this product all the time. It's fantastic!" - Kevin Hinterlong</h2>
		    </div>
		</div>
    
	    </div>


	    <div id="moreDetails" class="content-pane">
		<div class="description right">
		    <p><?php echo $config["websiteName"]; ?>'s original purpose was to present chores and work in a task based system.</p>
		    <p>With our active development team, you'll soon be able to create a reward system for the tasks you assign.</p>
		    <p><?php echo $config["websiteName"]; ?> can be used by parents, grade schools, even development teams!</p>
		</div>
    
		<div class="feature left">
		    <div class="feature-image">
			<img src="https://pixabay.com/static/uploads/photo/2013/07/12/19/04/swiss-army-knife-154314_960_720.png" alt="versatility">
		    </div>
		    <div class="feature-description">
			<h2>"This app has so many uses it's insane!" - John Valin</h2>
		    </div>
		</div>
    
	    </div>


	    <div id="more" class="content-pane">
		<div class="description left">
		    <p>Our product will be completely free to host yourself, but we also plan to offer low-cost hosting.</p>
		    <p>Please feel free to contact our development team if you have any issues or suggestions.</p>
		</div>
    
		<div class="feature right">
		    <div class="feature-image">
			<img src="https://pixabay.com/static/uploads/photo/2016/03/31/20/40/arrow-1295953_960_720.png" alt="graph">
		    </div>
		    <div class="feature-description">
			<h2>"I feel so much more productive using this!" - Daniel Martin</h2>
		    </div>
		</div>
    
	    </div>

	    <div class="disclaimer">
		<div class="warning-picture">
		    <i class="material-icons">warning</i>
		</div>
		<div class="warning-preview"> Disclaimer!</div>
		<div class="warning-content"> Please note that this project was made for a school project and the above statements do not represent me or any company.</p> </div>
	    </div>

	</div>
	
<!-- make snackbars to show successful or unsuccessful login	http://www.w3schools.com/howto/howto_js_snackbar.asp -->
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
