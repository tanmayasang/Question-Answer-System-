<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$keyword = $_POST["keyword"];


// Include config file
require_once "config2.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($keyword) || $keyword=='Enter a search keyword'){
        die ("Please enter a keyword to search.");
    }
    elseif (!empty($keyword) &&  $keyword!='Enter a search keyword' && !empty($_POST["topic"])){
        $parent_topic_name = $_POST["subject"];
        $topic_name = $_POST["topic"];
        $sql = "with temp as 
        (SELECT q_id, title, q_body, '3' as relevance FROM questions natural join answers
        WHERE MATCH (q_body)
            AGAINST ('" . $keyword . "' IN NATURAL LANGUAGE MODE) and topic_name = '" . $topic_name . "'
        UNION
        SELECT q_id, title, q_body, '2' as relevance  FROM questions natural join answers
        WHERE MATCH (title)
            AGAINST ('". $keyword . "' IN NATURAL LANGUAGE MODE) and topic_name = '".$topic_name. "'
        UNION
        SELECT q_id, title, q_body, '1' as relevance FROM questions natural join answers 
        WHERE MATCH (a_body)
            AGAINST ('" . $keyword. "' IN NATURAL LANGUAGE MODE) and topic_name = '" . $topic_name . "')
            
        select q_id, title, q_body, sum(relevance) as fin_relevance from temp group by q_id order by fin_relevance desc ";
        
        $result = $mysqli->query($sql);

        #echo($result->num_rows);
        
       
    }
    elseif (empty($topic_name)){
        $sql = "with temp as 
        (SELECT q_id, title, q_body, '3' as relevance FROM questions natural join answers
        WHERE MATCH (q_body)
            AGAINST ('" . $keyword . "' IN NATURAL LANGUAGE MODE)
        UNION
        SELECT q_id, title, q_body, '2' as relevance  FROM questions natural join answers
        WHERE MATCH (title)
            AGAINST ('". $keyword . "' IN NATURAL LANGUAGE MODE) 
        UNION
        SELECT q_id, title, q_body, '1' as relevance FROM questions natural join answers 
        WHERE MATCH (a_body)
            AGAINST ('" . $keyword. "' IN NATURAL LANGUAGE MODE) )
            
        select q_id, title, q_body, sum(relevance) as fin_relevance from temp group by q_id order by fin_relevance desc ";
        
        $result = $mysqli->query($sql);
        
    }
    

    if ($result->num_rows > 0) {
        // output data of each row
        
        
        while($row = $result->fetch_assoc()) { 
            echo ("Q_id: ");
            echo ('<FORM NAME ="form2" METHOD ="POST" ACTION = "expand-question.php">
                <INPUT TYPE = "Submit" Name = "Q_id" style="height:20px; width:300px" VALUE = "'. $row["q_id"] .
        
            '"></FORM> ');
                
            echo "<br> title: " . $row["title"] . "<br> Body: ".
            $row["q_body"] . "<br><br>";
            echo "-----------------------------------------------------------------------------------------<br>";
        }

        
                        
    } 
    else {
        echo "Keyword not found in database";
    }
    $mysqli->close();
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