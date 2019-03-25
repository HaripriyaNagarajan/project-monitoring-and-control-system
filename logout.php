<?php
session_start();
session_unset();
session_destroy();
header("Location:/time/index.php");	
	
?>