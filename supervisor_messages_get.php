<?php
    session_start();
    $_SESSION['sender']= $_GET['sender'];
	header("location:supervisor_chat_room.php");


?>