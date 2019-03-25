<!DOCTYPE html>
<?php
session_start();
require_once("connection.php");
if(isset($_REQUEST['ulogin']))
{
		header("Location:admin/index.php");

	
}
?>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="custom.css"/>
  </head>
  <body style="">
	<div class="container">
	 <div class="panel panel-default LoginPanel" id="">
	  <div class="panel-heading"><h3 style="text-align: center;color: #0e00af">Efficient Web-based Software Project Monitoring, Tracking and Control System</h3></div>
	  <div class="panel-body">
	   <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
		  <div class="form-group" >
			<label class="control-label col-sm-3" for="uname" style="font-size: 2.2vmin;">User Name :</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter Your Name">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-3" for="pwd" style="font-size: 2.2vmin;">Password :</label>
			<div class="col-sm-7"> 
			  <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
			</div>
		  </div>
		  
		  <div class="form-group">
		   <div class="col-sm-offset-2 col-sm-5" style="text-align: center;">
		   	 <a href="#" style="line-height: 2.5;">'Employee Login'</a>
		   </div> 
			<div class="col-sm-2" style="text-align: center;">
			  <input type="submit" name="ulogin" value="Login" class="btn btn-primary btn-md" style="font-weight: bolder;">
			</div>
		  </div>
	  </form>
	  </div>
	 </div>
	</div>
  </body>
</html>