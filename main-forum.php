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
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to QA Forum.</h1>
    <FORM NAME ="form1" METHOD ="POST" ACTION = "expand-all.php">
        <INPUT TYPE = "Submit" class="btn btn-danger ml-3" Name = "parent_topic_name" VALUE = "database systems">
        <br><br>
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "php">
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "sql">
        <br><br>
        <br><br>
        <INPUT TYPE = "Submit" class="btn btn-danger ml-3" Name = "parent_topic_name" VALUE = "computer networks">
        <br><br>
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "wired">
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "wireless">
        <br><br>
        <br><br>
        <INPUT TYPE = "Submit" class="btn btn-danger ml-3" Name = "parent_topic_name" VALUE = "algorithms">
        <br><br>
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "sorting">
        <INPUT TYPE = "Submit" class="btn btn-warning" Name = "topic_name" VALUE = "searching">
        <br><br>
        <br><br>
    </FORM>
    <p>
        <a href="welcome.php" class="btn btn-danger ml-3">Home Page</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>