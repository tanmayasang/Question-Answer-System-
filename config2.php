<?php
$mysqli = new mysqli("localhost", "tanmaya", "yolo", "qasystem");

/* check connection object oriented style of connection*/
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>