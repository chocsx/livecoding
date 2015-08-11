<?php

require 'vendor/autoload.php';

	try{
		$pdo = new PDO("mysql:host=localhost;dbname=livecoding","root","");
		echo "connected";
	}catch(PDOException $e){
		$e->getMessage( );
	}