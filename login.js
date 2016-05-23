function initialize() {
    // Get the modal
    var modal = document.getElementById('register');

    // Get the button that opens the modal
    var btn = document.getElementById('registerButton');

    // Get the <close> element that closes the modal
    var close = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <close> (x), close the modal
    close.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
	if (event.target == modal) {
	    modal.style.display = "none";
	}
    }

}

function checkLogin(username,password,verifypassword) {
    if(password !== verifypassword) {
	return false;
    }

    if(username.length ==0 || password.length == 0) {
	return false;
    }

    if(hasWhiteSpace(username)) {
	return false;
    }

    return checkName(username);
}

function getUser() {
    return document.getElementById('registerUsername');
}

function getPass() {
    return document.getElementById('registerPassword');
}

function register() {
    var username = getUser(); 
    var password = getPass();
    var verifypassword = document.getElementById('confirmPassword');
    if(checkLogin(username,password,verifypassword)) {
	register(username,password);
    }

}

//Tell the server to logout the current user
function logout() {
    var xhttp = new XMLHttpRequest();
    var result = "";
    xhttp.onreadystatechange = function() {
	if (xhttp.readyState == 4 && xhttp.status == 200) {
	    result = xhttp.responseText;
	    if(result === "success") {
		window.location.replace("index.php");
	    }
	}
    };
    xhttp.open("POST", "login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("method=logout");
}

//attempt to login the current username with the current password
//this is basically the same as attemptRegister() except that it redirects to game.php on successful login
function attemptLogin(username,password) {
    var xhttp = new XMLHttpRequest();
    var result = "";
    xhttp.onreadystatechange = function() {
	if (xhttp.readyState == 4 && xhttp.status == 200) {
	    result = xhttp.responseText;
	    if(result === "success") {
		window.location.replace("game.php");
	    } else {
		document.getElementById("response").innerHTML = "Failed to log in. Please try again";
	    }
	}
    };
    xhttp.open("POST", "login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&password=" + password);
}

//check with the server to see if a username is avialable
function checkName(username) {
    attemptRegister("attemptRegister",username);
}

//actually register the user
function register(username,password) {
    attemptRegister("register",username,password);
}

//used to see if a name is available and 
function attemptRegister(mode,username,password) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
	    document.getElementById("response").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&password=" + password + "&method=" + mode);
    if(mode == "register") {
	window.location.replace("game.php");
    }
}

//check if a string has whitespace with regex
function hasWhiteSpace(s) {
    return /\s/g.test(s);
}


