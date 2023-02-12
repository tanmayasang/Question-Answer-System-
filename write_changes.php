<?php
// Initialize the session
session_start();
require_once "config.php"; 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file

$username= $_POST['username'];
//$posture = $_POST['email'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$profile = $_POST['profile'];

// Processing form data when form is submitted
if ($fname != ""){
    $sql = "UPDATE Users SET first_name= '$fname' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("First name is updated ");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}
if ($lname != ""){
    $sql = "UPDATE Users SET last_name= '$lname' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("Last Name is updated ");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}

if ($city != ""){
    $sql = "UPDATE Users SET city= '$city' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("City is updated ");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}

if ($state != ""){
    $sql = "UPDATE Users SET state= '$state' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("State is updated  ");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}
if ($country != ""){
    $sql = "UPDATE Users SET country= '$country' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("Country is updated ");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}
if ($profile != ""){
    $sql = "UPDATE Users SET uprofile= '$profile' where User_id = '$username' ";
    if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        echo ("Profile is updated");

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);

}
}

?>