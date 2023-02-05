<?php
//initializing variables to store databse connection
$host = 'db'; //hostname of database serevr
$dbname = 'assignment1'; //name of database
$username = 'admin'; //username of database
$password = 'admin'; //password of database

//establishing datacase connection using PDO
  $connects = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  //for thrwoing exceptions or errrors
  $connects->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
