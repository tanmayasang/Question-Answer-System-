<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$Q_id = $_POST['Q_id'];

$sql = "Delete from questions where Q_id=" . $Q_id;
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    #mysqli_stmt_bind_param($stmt, "sssss", $username, $title, $q_body, $topic_name, $resolved);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Redirect to login page
        echo ("Question is deleted. ");
        
        #header("location: expand-question.php");
        #header("location: welcome.php");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    
}
mysqli_stmt_close($stmt);
$sql2 = "Delete from answers where Q_id =" . $Q_id;
if($stmt2 = mysqli_prepare($link, $sql2)){
    // Bind variables to the prepared statement as parameters
    #mysqli_stmt_bind_param($stmt, "sssss", $username, $title, $q_body, $topic_name, $resolved);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt2)){
        // Redirect to login page
        echo ("If there were Answers, they have been deleted too. ");
        
        #header("location: expand-question.php");
        #header("location: welcome.php");

    } else{
        echo "No answer for this question to delete";
    }

    
}
// Close statement
mysqli_stmt_close($stmt2);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <br><br>
    <a href="welcome.php" class="btn btn-danger ml-3">Home Page</a>
    <br><br>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</body>
</html>