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
$sql = "Select Q_id, A_id, A_body, likes, a_timestamp from Answers where A_user_id = '" . $username . "' order by a_timestamp desc";
$result = $mysqli->query($sql);

#echo($result->num_rows);
if ($result->num_rows > 0) {
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) { 
        echo ("Q_id: ");
        echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "expand-question.php">
            <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["Q_id"] .
    
        '"></FORM> ');
            
        echo "<br> A_id: " . $row["A_id"] . "<br> Answer: ".
        $row["A_body"]. "<br>likes: " . $row["likes"]. "<br> Timestamp: " . $row["a_timestamp"]. "<br><bs>";
        echo "-----------------------------------------------------------------------------------------<br>";
    }

    
                    
} 
else {
echo "No Answers have been posted by you";
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