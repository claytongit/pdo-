<?php 

session_start();
require '../controllers/connection.php';
$con = new Connect;
$con->conn('localhost', 'cadastro', 'root', '');


if(isset($_GET['id'])){
	$id = addslashes($_GET['id']);

	$con->delete($id);
	header("Location: ../index.php");
}

 ?>