<?php 

session_start();
require '../controllers/connection.php';
$con = new Connect;
$con->conn('localhost', 'cadastro', 'root', '');


if(isset($_GET['id']) && !empty($_GET['id'])){

	$id = addslashes($_GET['id']);

	$user = addslashes($_POST['user']);
	$email = addslashes($_POST['email']);

	$con->update($id, $user, $email);
	header("Location: ../editar.php");
}