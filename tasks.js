function submitTask() {
  var taskInput = document.getElementById("taskInput");
  var assigner = taskInput[1].value;
  var assignee = taskInput[2].value;
  var title = taskInput[3].value;
  var description = taskInput[4].value;
  var percentCompleted = taskInput[5].value;
  addTask(assigner,assignee,title,description,percentCompleted,function() {
     location.reload();
  });
}

function addTask(assigner,assignee,title,description,percentCompleted,success) {
  serverTaskRequest("add",assigner,assignee,title,description,percentCompleted,success);
}

//used to see if a name is available and
function serverTaskRequest(mode,assigner,assignee,title,description,percentCompleted,successFunction) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
      	    var result = xhttp.responseText;
      	    if(result === "success") {
      		      successFunction();
      	    }
      	    else {
      	    }
        }
    };
    xhttp.open("POST", "tasker.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("method=" + mode + "&assigner=" + assigner + "&assignee=" + assignee+ "&title=" + title
              + "&description=" + description+ "&percentCompleted=" + percentCompleted);
    }
