<?php
    //start session
    if (session_status() === PHP_SESSION_NONE){session_start();}

    //extract and initialize variables
    $assigner = isset($_POST["assigner"]) ? $_POST["assigner"] : "" ;
    $assignee = isset($_POST["assignee"]) ? $_POST["assignee"] : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $percentCompleted = isset($_POST["percentCompleted"]) ? $_POST["percentCompleted"] : "";
    $config = include("config.php");

    $conn = getConnection();

    if(isset($_POST["title"])) {
        addTask($conn,$assigner,$assignee,$title,$description,$percentCompleted);
    }

  function addTask($conn,$assigner,$assignee,$title,$description,$percentCompleted) {
    $config = include("config.php");
    $assigner = $conn->real_escape_string($assigner);
    $assignee = $conn->real_escape_string($assignee);
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $percentCompleted = $conn->real_escape_string($percentCompleted);
    $sql = "INSERT INTO " . $config["assignmentsTable"] . "(`assigner`, `assignee`, `title`, `description`, `percentCompleted`) VALUES ('$assigner','$assignee', '$title', '$description','$percentCompleted')";
    $result = $conn->query($sql);
    echo "success";
    return $result;
  }

  function printTasks($tasks) {
    echo '<ul class="tasks">';
    while($row = $tasks->fetch_assoc()) {
      echo '<li class="task">' . $row["assigner"] . " -> " . $row["assignee"] . " '" . $row["title"] . "' " . $row["percentCompleted"] . "%";
    }
    echo '</ul>';
    //iterate through each and output them in the div
  }

  //return the details of the user currently in the database
  function getUnfinishedTasks($assignee) {
      $conn = getConnection();
      $config = include("config.php");
      $sql = "SELECT * FROM {$config["assignmentsTable"]} WHERE assignee='$assignee' AND percentCompleted<>'100'";
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
      $tableExists = $conn->query("SELECT 1 FROM {$config["assignmentsTable"]} LIMIT 1");
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
      $sql = "CREATE TABLE IF NOT EXISTS " . $config["assignmentsTable"] . " (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        assigner VARCHAR(100),
        assignee VARCHAR(100) NOT NULL,
        dateAssigned TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        title VARCHAR(100) NOT NULL,
        description VARCHAR(400) NOT NULL,
        percentCompleted INT(6) UNSIGNED
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
