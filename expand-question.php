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

//Function to upvote likes

$qid = $_POST['Q_id'];
$sql = "Select Q_id, title, q_body, topic_name, q_timestamp, resolved from questions where Q_id = " . $qid;
$result1 = $mysqli->query($sql);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        echo "Q_id: " . $row["Q_id"].
        "<br> title: " . $row["title"] . "<br> Body: ".
        $row["q_body"]. "<br>Topic_name: " . $row["topic_name"]. "<br> Timestamp: " . $row["q_timestamp"]. "<br> resolved: " . 
        $row["resolved"] . "<br><br>";
        echo "-----------------------------------------------------------------------------------------<br>";
    }
}
else{
    echo "No question with this qid";
}
$sql2 = "Select A_id, A_body, likes, a_timestamp from Answers where Q_id = " . $qid . " Order By a_timestamp desc";
$result2 = $mysqli->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    echo "Answers <br>";
    while($row = $result2->fetch_assoc()) {
           
        echo "<br> A_id: " . $row["A_id"] . "<br> Answer: ".
        $row["A_body"]. "<br>likes: " . $row["likes"]. "<br> Timestamp: " . $row["a_timestamp"]. "<br><br>";
        echo ("Upvote A_id: ");
        echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "like-answer.php" >
            <INPUT TYPE = "Submit" name = "A_id"  style="height:20px; width:300px" VALUE = "' . $row["A_id"] . '"
    
        ></FORM> ');
         
        echo "-----------------------------------------------------------------------------------------<br>";
    }
                    
}else {
    echo "0 answers for this question";
}

$_SESSION["qid"] = $qid;
$mysqli->close();
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
    <FORM NAME ="form1" METHOD ="POST" ACTION = "post-answer.php">
        <INPUT TYPE = "TEXT" VALUE ="Enter Answer Body" name="A_body">
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Submit">
    </FORM>
    <br><br>
    <a href="welcome.php" class="btn btn-warning">Home Page</a>
    <br><br>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</body>
</html>