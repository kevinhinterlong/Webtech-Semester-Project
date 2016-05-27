<?php
    //start session
    if (session_status() === PHP_SESSION_NONE){session_start();}

    //extract and initialize variables
    $username = isset($_POST["username"]) ? $_POST["username"] : "" ;
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $config = include("config.php");

    if(ctype_space($username)) {
        echo "Your name has formatting errors." . ctype_space($username);
	return;
    }

    //get a connection to the database
    $conn = getConnection();
    $username = $conn->real_escape_string($username); //escape username
    $userDetails = getUser($conn,$username); //retrieve details for user if they exist
    $row = $userDetails->fetch_array(MYSQLI_ASSOC);

    if($_POST["method"] == "logout") {//check if user wants to logout
	session_destroy();
	echo "success";
	//maybe log something
    } else if($_POST["method"] == "attemptRegister") { //if no results then see if the account is available
    	if($userDetails->num_rows == 0  ) {
    	    echo "success";
    	} else {
    	    echo "fail";
    	}
    } else if($_POST["method"] == "register"){ //check if the account is being registered
	if($userDetails->num_rows == 0 ) {
	    register($conn,$username,$password);
	    login($conn,$username,$password); //login the user to set the session variables
	} else {
	    echo "fail";
	}
    } else if($_POST["method"] == "login" || $userDetails->num_rows == 1) { //if no results login
	login($conn,$username,$password);
    } else {
	echo "No account found! Please register";
    }

    //close connection
    $conn->close();


//insert the user into the database
function register($conn, $username, $password) {
    $config = include("config.php");
    if(getUser($conn,$username)->num_rows == 0 ) {
	$hash = password_hash($password, PASSWORD_BCRYPT);
	$hash = $conn->real_escape_string($hash);
	$sql = "INSERT INTO " . $config["userTable"] . "(`userName`, `userHash`) VALUES ('$username','$hash')";
	$result = $conn->query($sql);
    }
    echo "REGISTERED";
}

//attempt to log the user in to the website
function login($conn,$username,$password) {
    $row = getUser($conn,$username)->fetch_array(MYSQLI_ASSOC);
    //if computed hash = stored hash then allow the user to login
    if( password_verify($password, $row["userHash"]) ) {
	$_SESSION['username'] = $username;
	echo "success";
	//probably set other session variables
    } else {
	echo "fail";
    }
}

//return the details of the user currently in the database
function getUser($conn,$username) {
    $config = include("config.php");
    $sql = "SELECT * FROM {$config["userTable"]} WHERE userName='$username'";
    $result = $conn->query($sql);
    return $result;
}

//attempt to get a connection to the mysql database and create database/table if needed
function getConnection() {
    $config = include("config.php");
    //connect to database
    $failed = false;
    $conn = getRawConnection();
    if ($conn->connect_error) { // Check connection
	$failed = true;
	initializeDatabase(); //create table if not exists
    }
    $conn = getRawConnection();
    if ($conn->connect_error) { // Check connection
	die("Connection failed: " . $conn->connect_error);
    }
    $tableExists = $conn->query("SELECT 1 FROM {$config["userTable"]} LIMIT 1");
    if($tableExists == false) {
	initializeTable();
    }
    return $conn;
}

//create database if not exists
function initializeDatabase() {
    $config = include("config.php");
    $conn = new mysqli($config["servername"], $config["username"], $config["password"]); // Create connection
    $sql= "CREATE DATABASE IF NOT EXISTS {$config["database"]}";
    if ($conn->query($sql) === TRUE) {
	echo "db created successfully";
    } else {
	echo "Error creating db: " . $conn->error;
    }
    $conn->query("USE {$config["database"]}");
}

//create table if not exists
function initializeTable() {
    $config = include("config.php");
    $conn = getRawConnection();
    $sql = "CREATE TABLE IF NOT EXISTS " . $config["userTable"] . " (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30) NOT NULL,
    userHash VARCHAR(100) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
	echo "Table created successfully";
    } else {
	echo "Error creating table" . $config["userTable"] . ": " . $conn->error;
    }
}

function getRawConnection() {
    $config = include("config.php");
    return new mysqli($config["servername"], $config["username"], $config["password"], $config["database"]); // Create connection
}
