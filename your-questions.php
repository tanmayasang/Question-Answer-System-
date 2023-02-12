<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config2.php";

$username = $_SESSION['username'];


// Prepare an insert statement
$sql = "Select Q_id, title, q_body, topic_name, q_timestamp, resolved from questions where q_user_id = '" . $username . "' order by q_timestamp desc";
$result = $mysqli->query($sql);

#echo($result->num_rows);
if ($result->num_rows > 0) {
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) { 
        echo ("Q_id: ");
        echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "expand-question.php">
            <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["Q_id"] .
    
        '"></FORM> ');
            
        echo "<br> title: " . $row["title"] . "<br> Body: ".
        $row["q_body"]. "<br>Topic_name: " . $row["topic_name"]. "<br> Timestamp: " . $row["q_timestamp"]. "<br> resolved: " . 
        $row["resolved"] . "<br><br>";
        echo ("Delete:");
        echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "delete-question.php">
            <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["Q_id"] .
    
        '"></FORM> ');
        echo "-----------------------------------------------------------------------------------------<br>";
    }

    
                    
} 
else {
echo "No questions have been posted by you";
}
$mysqli->close();
    

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