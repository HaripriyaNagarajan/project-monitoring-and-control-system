<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<title>Time Track System</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/Redmond/jquery-ui.css">
  <link rel="stylesheet" href="style1.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="container-fluid">
	
<nav class="navbar">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img id="img_logo" src="img/title.jpg" alt="logo">
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav navbar-right">
       <li class="active"><a href="index.php">Home</a></li>
       <li><a href="admin/login.php">Admin</a></li>
       <li><a href="employee/Login_Employee.php">Employee</a></li>

       <?php if(isset($_SESSION['User_Login'])){?>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['User'];?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>
       <?php }?>
     </ul>   
    </div>
</nav>