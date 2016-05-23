<!DOCTYPE html>
<!-- Kevin Hinterlong May 22, 2015 The index of the task assigner website -->
<html>
<?php $config = include("config.php"); ?>
    <head>
	<title>
	    <?php echo $config["websiteName"];  ?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="login.js" type="text/javascript"></script>
    </head>

    <body>
	<div id="header">
	    <div id="login">
		<input type="text" placeholder="username" />
		<input type="password" />
		<input type="button" value="Login" />
		<span id="registerButton">Or Register Here</span>
		<div id="register" class="modal">
		    <div class="modal-content">
		        <span class="close">x</span>
			<p>Some text in the Modal..</p>
		    </div>
		</div>
	    </div>
	</div>
    </body>
</html>
