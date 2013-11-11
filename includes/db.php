<?php

global $db;

// Try to create a new PDO connection
try {
	// Create a new connection to the MySQL database
  	$db = new PDO(DB_CONSTRING, DB_USERNAME, DB_PASSWORD);

  	// Set the error reporting attribute of PDO
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  	// Set the PDO character set
  	$db->exec("SET CHARACTER SET utf8");


} catch (PDOException $e) {
  echo $e->getMessage();
}