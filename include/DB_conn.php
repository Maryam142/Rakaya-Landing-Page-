<?php

// connect to database
$conn = mysqli_connect('localhost','root','','rakayatest');

// check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
}