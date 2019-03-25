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
			
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
			  	
			     <li>
				<a href="client.php">Client</a>
			   </li>
			   <li>
				<a href="Project.php">Project</a>
			   </li>
			   
			      <li>
				<a href="Employee.php">Employee</a>
			   </li>
			   <li>
				<a href="Project_Schedule.php">Project Scheduling</a>
			   </li>
			   <li>
				<a href="project_time_track.php">Time Track</a>
			   </li>
			   
		      <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo 'Reports';?></a>
				<ul class="dropdown-menu">
				  <li><a href="Employee_Report.php" style="color:blue">Employee Report</a></li>
				  <li><a href="Employee_Allocation.php" style="color:blue">Employee_Allocation Report</a></li>
				    <li><a href="project_report.php" style="color:blue">Project Report</a></li>
				  <li><a href="client_report.php" style="color:blue">Client Report</a></li>
				</ul>
			
			  </ul>
			  </li>
			  <ul class="nav navbar-nav navbar-right">
			  
				<li><a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			  </ul>
			</div>
		</div>
	</nav>
</div>
   <!-- /Nav Bar -->