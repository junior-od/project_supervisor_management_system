<?php
	session_start();
	echo $_SESSION['sender']= $_GET['sender'];
	header("location:supervisor_chat_room.php");



?>