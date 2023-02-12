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



// Processing form data when form is submitted

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Edit Profile</h2>
        <p>Please enter details to update profile info </p>
        <form action="write_changes.php" method="post">
            <div class="form-group">
                <label>Username <span style="color:#ff0000">*</span> </label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            </div>    
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Profile</label>
                <input type="text" name="profile" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            
        </form>
    </div>    
</body>
</html>