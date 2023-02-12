<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if ( isset($_POST['topic_name']))  {
    $topic_name = $_POST['topic_name'];
}
if (isset($_POST['parent_topic_name'])){
    $parent_topic_name = $_POST['parent_topic_name'];
}

// Include config file
require_once "config2.php";

//display all questions and answers within a sub topic
if (!empty($topic_name)){
    $sql = "Select Q_id, title, q_body, topic_name, q_timestamp, resolved from questions where topic_name = '" . $topic_name. "'";
    $result1 = $mysqli->query($sql);
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            echo ("Q_id: ");
            echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "expand-question.php">
                <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["Q_id"] .
        
            '"></FORM> ');
                
            echo "<br> title: " . $row["title"] . "<br> Body: ".
            $row["q_body"]. "<br>Topic_name: " . $row["topic_name"]. "<br> Timestamp: " . $row["q_timestamp"]. "<br> resolved: " . 
            $row["resolved"] . "<br><br>";
            echo "-----------------------------------------------------------------------------------------<br>";
        }
    }
    else {
        echo "No questions under this topic";
    }
}

if (!empty($parent_topic_name)){
    $sql = "Select Q_id, title, q_body, topic_name, q_timestamp, resolved from questions natural join topics where parent_topic_name = '" 
    . $parent_topic_name . "'";
    $result1 = $mysqli->query($sql);
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            echo ("Q_id: ");
            echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "expand-question.php">
                <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["Q_id"] .
        
            '"></FORM> ');
                
            echo "<br> title: " . $row["title"] . "<br> Body: ".
            $row["q_body"]. "<br>Topic_name: " . $row["topic_name"]. "<br> Timestamp: " . $row["q_timestamp"]. "<br> resolved: " . 
            $row["resolved"] . "<br><br>";
            echo "-----------------------------------------------------------------------------------------<br>";
        }
    }
    else {
        echo "No questions under this topic";
    }
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