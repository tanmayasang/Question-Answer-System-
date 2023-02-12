<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


// Include config file
require_once "config.php";

$title = $_POST['title'];
$q_body = $_POST['q_body'];
$topic_name = $_POST['topic'];
$username = $_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($title) && !empty($q_body) && $title!='Enter Question Title' && $q_body!='Enter Question Body'){
        // Prepare an insert statement
        $sql = "INSERT INTO questions (q_user_id, title, q_body, topic_name,resolved) VALUES (?,?,?,?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            $resolved = 'no';
            mysqli_stmt_bind_param($stmt, "sssss", $username, $title, $q_body, $topic_name, $resolved);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo ("Question successfully posted to forum");
                #header("location: welcome.php");

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    else {
        echo "Please fill up question title and body.";
    }
}
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