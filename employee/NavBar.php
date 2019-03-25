<?php session_start();
require_once("connection.php");
?>
<!-- Nav Bar -->
<div class="container-fluid" style="margin-bottom: 5%;">
 <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #080266;">
		<div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#" style="color:yellow;">Efficient Web-based Software Project Monitoring, Tracking and Control System</a>
			</div>
			
			<div class="collapse navbar-collapse" id="myNavbar" >
			  <ul class="nav navbar-nav" >
			  
			   
			      <li >
				<a href="employee_work.php" style="color:white;">Employee Work - Dashboard</a>
			   </li>
			   <li>
				<a href="employee_individual_report.php" style="color:white;">Employee Report</a>
			   </li>
			   <li>
				<a href="employee_individual_allocation.php">Project Allocation Dashboard</a>
			   </li>
			   
			  
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			   <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION['UName']?></a>
				
			   </li>
				<li><a href="logout.php" style="color:white;" ><span style="color:white;" class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			  </ul>
			</div>
		</div>
	</nav>
</div>
   <!-- /Nav Bar -->