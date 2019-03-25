<?php
session_start();
session_unset();
session_destroy();
//echo "<script>window.location='./Login.php';</script>";	
//echo "<script>window.location='./index.php';</script>";	
	header("Location:/time/index.php");
?>