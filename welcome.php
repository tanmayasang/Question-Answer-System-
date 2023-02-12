<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>

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
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to QA Forum.</h1>
    <p>
        <a href="main-forum.php" class="btn btn-warning">Main Forum</a>
        <br><br>
        <a href="post-question.php" class="btn btn-warning">Post Question</a>
        <br><br>
        <a href="your-questions.php" class="btn btn-warning">Your Questions</a>
        <br><br>
        <a href="your-answers.php" class="btn btn-warning">Your Answers</a>
        <br><br>
        <FORM NAME ="form1" METHOD ="POST" ACTION = "keysearch.php">

        <INPUT TYPE = "TEXT" VALUE ="Enter a search keyword" name="keyword">
        <br><br>
        Subject: <select name="subject" id="subject">
        <option value="" selected="selected">Select subject</option>
            </select>
            <br><br>
        Topic: <select name="topic" id="topic">
            <option value="" selected="selected">Please select subject first</option>
        </select>
        <br><br>
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Search by Relevance">
        <input type="submit" formaction="keysearch2.php" value = "Search by Time">

        </FORM>
        <br><br>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account </a>
        <a href="edit_profile.php" class="btn btn-warning"> Change Profile</a>
    </p>
</body>
</html>
