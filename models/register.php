<?php 

session_start();
require '../controllers/connection.php';
$con = new Connect;

if(isset($_POST['user'])){
	$user = addslashes($_POST['user']);
	$email = addslashes($_POST['email']);

	if(!empty($user) && !empty($email)){
		$con->conn('localhost', 'cadastro', 'root', '');
		$con->register($user, $email); 
		
	}else{
		$_SESSION['not_success'] = true;
		header("Location: ../cadastro.php");
	}
}

?>

