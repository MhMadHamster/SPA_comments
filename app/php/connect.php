<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  $HOST = 'test';
  $LOGIN = 'root';
  $PASSWORD = '1qaZ2wsX';
  $DB_NAME = 'mydb';

  $connection = new mysqli($HOST, $LOGIN, $PASSWORD, $DB_NAME);

  if (!$connection) {
    die('Could not connect: ' . mysqli_error());
  } else {
    
  }
  
  $connection->query("SET NAMES utf8");
  $connection->query("SET CHARACTER SET utf8");
  $connection->query("SET SESSION collation_connection = utf8_general_ci"); 

  $posts = 'posts';
  $links = 'links';

?>