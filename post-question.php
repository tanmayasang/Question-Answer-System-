
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
echo ("POST A QUESTION");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<script>
var subjectObject = {
  "database systems": 
    ["sql",
    "php"  ]
  ,
  "computer networks": [
    "wired",
    "wireless"
  ],
  "algorithms":[
    "searching",
    "sorting"
  ]
}
window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  //var chapterSel = document.getElementById("chapter");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    //chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    var y = subjectObject[this.value];
    for (var i = 0; i < y.length; i++) {
      topicSel.options[topicSel.options.length] = new Option(y[i], y[i]);
    }
  }
}
</script>
</head>
<body>

    <FORM NAME ="form1" METHOD ="POST" ACTION = "submit-question.php">

        <INPUT TYPE = "TEXT" VALUE ="Enter Question Title" name="title">
        <INPUT TYPE = "TEXT" VALUE ="Enter Question Body" name="q_body">
        <br><br>
        <br><br>
        Subject: <select name="subject" id="subject">
        <option value="" selected="selected">Select subject</option>
            </select>
            <br><br>
        Topic: <select name="topic" id="topic">
            <option value="" selected="selected">Please select subject first</option>
        </select>
        <br><br>
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Submit">

    </FORM>
    <br><br>
    <br><br>
    <a href="welcome.php" class="btn btn-danger ml-3">Home Page</a>
    <br><br>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</body>
</html>