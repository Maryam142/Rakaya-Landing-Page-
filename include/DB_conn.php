<?php

// connect to database
$conn = mysqli_connect('localhost','root','','rakaya');

// check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
}