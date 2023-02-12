<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";

$A_id = $_POST['A_id'];

$sql = "UPDATE answers SET likes = likes +1 Where A_id =" . $A_id;
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    #mysqli_stmt_bind_param($stmt, "sssss", $username, $title, $q_body, $topic_name, $resolved);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Redirect to login page
        echo ("Number of likes updated");
        
        #header("location: expand-question.php");
        #header("location: welcome.php");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
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
    <br><br>
    <a href="welcome.php" class="btn btn-warning">Home Page</a>
    <br><br>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</body>
</html>