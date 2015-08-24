<?php

	// CRUD WITH PDO - READ
	try{
		//connect to database
			$pdo = new PDO("mysql:host=localhost;dbname=livecoding","root","");
		//prepare to insert on table 'user'
			$select = $pdo->prepare("SELECT * FROM user");
		//execute the query above
			$select->execute();
			$result = $select->fetch(PDO::FETCH_OBJ);
		//if no errors found
			var_dump($result);

			foreach ($result as $key=>$value) {
				echo 	$key." - ".
					 	$value."<br />";
			}
	}catch(PDOException $e){
		$e->getMessage( );
	}


?>

