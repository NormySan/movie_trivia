<?php
	global $db;
	
	define('DB_CONSTRING', 'mysql:host=localhost;dbname=movie_trivia'); // 127.0.0.1 is the same as localhost
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'aqogw357btyuj');

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

	$namearray=array('Loura','Arica','Lavonia','Christopher','Shay','Shavonne','Maria','Reynaldo','Berenice','Cris','Digna','Elenora','Shakita','Bernie','Keesha','Evette','Loriann','Shawanda','Myriam','Fae','Rosalba','Anton','Rodrick','Kyla','Raul','Belle','Trudi','Myrtis','Julienne','Marcelle','Eduardo','Carlton','Natosha','Basilia','Morris','Rosario','Evonne','Cheree','Stephnie','Petronila','Hailey','Keli','Abel','Danilo','Dwana','Marjo','ie','Ardith','Margherita','Tamica','Janiece','Gale','Delia','Evette','Sunday','Emmaline','Maudie','Donya','Modesto','Carl','Hilde','Golden','Felice','Darci','Temple','Ping','Ula','Sabina','Aliza','Breann','Terina','Keenan','Madge','Kary','Pennie','Kathlene','Golda','Rayford','Tiara','Leandra','Tiny','Angelia','Latasha','Moshe','Carlena','Weldon','Al','Myrtis','Trinidad','Ivory','Keiko','Hector','Imogene','Danyelle','Shalanda','Lurline','Twyla','Janetta','Angelique','Rueben','Larae');
	$namearray = array_map('strtolower', $namearray);
	foreach ($namearray as $name) 
	{
		$statement = $db->prepare('INSERT INTO users(username,password,highscore,userlevel) VALUES (:username,:username,:highscore,:userlevel)');							 
		
		$statement->execute(array('username' => $name,'highscore'=> rand(10000, 150000),'userlevel' =>'2'));
	}