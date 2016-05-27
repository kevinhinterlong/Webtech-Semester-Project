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


  <div id="taskList">
    <h1>Tasks</h1>
      <?php
          printTasks(getUnfinishedTasks($_SESSION['username']));
       ?>
  </div>

  <div id="taskMaker">
      <form id="taskInput">
          <fieldset>
              <legend>Enter a task:</legend>
              Assigner: <select name="assigner" >
                <?php
                    $config = include("config.php");
                    $conn = getConnection();
                    $sql = "SELECT userName FROM {$config["userTable"]}";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                      echo '<option value="' . $row["userName"] . '">' . $row["userName"] . "</option>";
                    }
                 ?>
              </select> <br />
              Assignee: <select name="assignee" >
                <?php
                    $config = include("config.php");
                    $conn = getConnection();
                    $sql = "SELECT userName FROM {$config["userTable"]}";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                      echo '<option value="' . $row["userName"] . '">' . $row["userName"] . "</option>";
                    }
                 ?>
              </select> <br />
              Enter a title: <input type="text" name="title"> <br />
              Enter a description: <textarea name="description" rows="6" cols="50"></textarea> <br />
              Enter percent completed: <input type="number" name="percentCompleted"> <br />
              <input type="button" value="submit task" onclick="submitTask();">
          </fieldset>
      </form>
  </div>

    </body>
</html>
