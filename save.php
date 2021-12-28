<?php

$host = 'localhost';
$username= 'root';
$password = '';
$database = 'ajax';

$conn = new mysqli($host,$username,$password,$database);

$name = $_POST['mamu'];
$email = $_POST['your_email'];
$phone = $_POST['your_phone'];

$sql = "INSERT INTO students (fname,email,phone) VALUES ('$name','$email','$phone')";
$output = $conn->query($sql);

if($output == true){
    echo 'Form data insert success.';
}





