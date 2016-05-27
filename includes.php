<?php

    function getLoginBar() {
	echo '<div id="login">
		<button class="pretty-button" id="logoutButton">Logout</button>
	    </div>

	    <div class="linkBar">
		<ul>
		    <li><a href="index.php"> <i class="material-icons">home</i> Home</a></li>
		    <li><a href="about.php"> <i class="material-icons">info</i> About</a></li>
		    <li><a href="task.php"> <i class="material-icons">playlist_add_check</i> Tasks</a></li>
		</ul>
	    </div> ';
    }

    function getDefaultBar() {
	echo '
	    <div id="login">
		<button class="pretty-button" id="loginButton">Login</button>
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
	    </div>';

    }
