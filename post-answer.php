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

$A_body = $_POST["A_body"];
$A_user_id = $_SESSION['username'];
$qid = $_SESSION['qid'];
$likes = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($A_body) && $A_body!='Enter Answer Body'){
        // Prepare an insert statement
        $sql = "INSERT INTO Answers (Q_id, A_user_id, A_body, likes) VALUES (?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $qid, $A_user_id, $A_body, $likes);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo ("Answer successfully posted to forum");

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    else {
        echo "Please fill up Answer body.";
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