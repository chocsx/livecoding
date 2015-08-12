<form method="POST">
	USER<input type="text" name="username" placeholder="insert your username" required autofocus>
	PASS<input type="password" name="password" placeholder="insert your password" required>
	EMAIL<input type="text" name="email" placeholder="insert your email"required>
	<input type="submit" value="register" name='ok'>
</form>


<?php




if(isset($_POST['ok'])){
	// CRUD WITH PDO  - CREATE
	//post from form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	try{
		//connect to database
			$pdo = new PDO("mysql:host=localhost;dbname=livecoding","root","");
		//prepare to insert on table 'user'
			//$insert = $pdo->prepare("INSERT INTO user (user, pass, email)VALUES('live','coding','chocsx@livecoding.tv')");
			$insert = $pdo->prepare("INSERT INTO user (user, pass, email)VALUES(?,?,?)");
			$insert->bindValue('1', $user, PDO::PARAM_STR);
			$insert->bindValue('2', $pass, PDO::PARAM_STR);
			$insert->bindValue('3', $email, PDO::PARAM_STR);
			
		//execute the query above
			$insert->execute();
		//if no errors found
			echo "Registred";
	}catch(PDOException $e){
		$e->getMessage( );
	}

}
?>

