<?php

	// CRUD WITH PDO - READ
	try{
		//connect to database
			$pdo = new PDO("mysql:host=localhost;dbname=livecoding","root","");
		//prepare to insert on table 'user'
			$select = $pdo->prepare("SELECT * FROM user");
		//execute the query above
			$select->execute();
			$results = $select->fetchAll(PDO::FETCH_ASSOC);
		//if no errors found
			foreach($results as $row) {
				var_dump($row);
			}
			
	}catch(PDOException $e){
		$e->getMessage( );
	}


?>

