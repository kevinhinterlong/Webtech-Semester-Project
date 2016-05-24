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

    var loginPassword = document.getElementById("loginPassword");
    loginPassword.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {
	    login();
	}
    });
    
    var confirmPassword = document.getElementById("confirmPassword");
    confirmPassword.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {
	    register();
	}
    });
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) { //not working
	if (event.target == modal) {
	    modal.style.display = "none";
	}
    }

}

function checkLogin(username,password,verifypassword,successFunction) {
    if(password != verifypassword) {
	return false;
    }

    if(username.length ==0 || password.length == 0) {
	return false;
    }

    if(hasWhiteSpace(username)) {
	return false;
    }
    nameAvailable(username,successFunction);
}

function login() {
    var form = document.getElementById("loginForm");
    var username = form[0].value;
    var password = form[1].value;
    loginUser(username,password,function() {
	window.location.replace("task.php");
    });
}

function register() {
    var username = document.getElementById('registerUsername').value;
    var password = document.getElementById('registerPassword').value;
    var verifypassword = document.getElementById('confirmPassword').value;
    checkLogin(username,password,verifypassword, function() { 
	registerUser(username,password,function() {
	    alert("account made and logged in");
	    // window.location.replace("task.php");	
	}); 
    });
}

//check with the server to see if a username is avialable
function nameAvailable(username,successFunction) {
    serverRequest("attemptRegister",username,undefined,successFunction);
}

//actually register the user
function loginUser(username,password,successFunction) {
    serverRequest("login",username,password,successFunction);
}

//actually register the user
function registerUser(username,password,successFunction) {
    serverRequest("register",username,password,successFunction);
}

//used to see if a name is available and 
function serverRequest(mode,username,password,successFunction) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
	    var result = xhttp.responseText;
	    if(result === "success") {
		successFunction();
	    }
	    else {
		alert(result + " failed with u: " + username + " ; p: " + password + " ; m: " + mode);
	    }
        }
    };
    xhttp.open("POST", "login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("method=" + mode + "&username=" + username + "&password=" + password);
    }

//check if a string has whitespace with regex
function hasWhiteSpace(s) {
    return /\s/g.test(s);
}


