<!DOCTYPE html>
<!-- Kevin Hinterlong DATE DESCRIPTION -->
<html>
<?php 
    session_start();
    $config = include("config.php");
    include 'includes.php';
    if(isset($_SESSION['username']) && $_POST["action"] == "logout") {
	session_destroy();
    }
    if(!isset($_SESSION['username'])){//only allow logged in users
	header("Location:index.php");
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

	

    </body>
</html>
