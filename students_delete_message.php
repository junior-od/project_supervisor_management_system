<?php 
	include("db_connect.php");
	session_start();
	echo $id=$_GET['id'];


	$user_name=$_SESSION['supervisor_user_name'];
	$update_delete= $connect->prepare("UPDATE message_$user_name SET sender_delete='1' WHERE id='".$id."'  ");
	$update_delete->execute();

	header("location:students_chat_room.php");



?>