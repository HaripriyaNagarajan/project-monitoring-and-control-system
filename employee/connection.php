<?php
error_reporting(0);
$hostname_localhost ="localhost";
$database_localhost="xplore";
$username_localhost="root";
$password_localhost="";

$conn = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

if(!$conn)
{
	die("Connection Error : ".mysqli_connect_error());
}

function inp($data)
{
	$data = $_REQUEST[$data];
	
	$data = filter_var($data, FILTER_SANITIZE_STRING);
	return $data;
}
?>

