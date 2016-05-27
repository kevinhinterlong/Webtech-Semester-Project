<!DOCTYPE html>
<!-- Kevin Hinterlong DATE DESCRIPTION -->
<html>
<?php
    include 'includes.php';
    include 'tasker.php';

    if (session_status() === PHP_SESSION_NONE){session_start();}
    $config = include("config.php");

    if(!isset($_SESSION['username'])){//only allow logged in users
	     header("Location:index.php");
    }
?>
    <head>
	<title>
	    <?php echo $config["websiteName"];  ?> - Tasks
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="login.js" type="text/javascript"></script>
  <script src="tasks.js" type="text/javascript"></script>
    </head>

    <body onload="initialize();">
	<div class="header">
	    <h1>Welcome to <?php echo $config["websiteName"]; ?>!</h1>
	    <?php
      		if(isset($_SESSION['username'])) {
      		    getLoginBar();
      		} else {
      		    getDefaultBar();
      		}
	    ?>
	</div>
<!-- derived from w3schools example of price comparison chart -->
  <div class="main">
      <div class="columns">
        <ul class="price">
          <li class="title">Basic</li>
          <li class="grey">Free</li>
          <li>100MB Storage</li>
          <li>1000 Tasks</li>
          <li>10 Members</li>
          <li class="grey"><a href="#" class="pretty-button select">Sign Up</a></li>
        </ul>
      </div>

      <div class="columns">
        <ul class="price">
          <li class="title" style="background-color:#FBB83F">Pro</li>
          <li class="grey">$ 4.99 / year</li>
          <li>1GB Storage</li>
          <li>Unlimited Tasks</li>
          <li>Unlimited Tasks</li>
          <li class="grey"><a href="#" class="pretty-button select">Sign Up</a></li>
        </ul>
      </div>

      <div class="columns">
        <ul class="price">
          <li class="title">Premium</li>
          <li class="grey">$ 9.99 / year</li>
          <li>10GB Storage</li>
          <li>Unlimited Tasks AND Categories</li>
          <li>Unlimited Member AND Teams</li>
          <li class="grey"><a href="#" class="pretty-button select">Sign Up</a></li>
        </ul>
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

      $( ".warning-content" ).hide();

      $( ".disclaimer" ).hover(function() {
      $( ".warning-preview" ).toggle();
      $( ".warning-content" ).toggle();
      });

      </script>
    </body>
</html>
