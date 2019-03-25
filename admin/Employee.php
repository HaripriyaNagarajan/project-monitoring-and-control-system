<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");?>
 <div class="container">
	<div class="pull-right">
		<a href="add_employee.php" class="btn btn-success btn-sm"> + New Employee </a>
	</div>
 </div>
 <div class="container-fluid tblarea">
  <table id="table" class="table table-bordered table-hover table-responsive">
  	<thead>
  		<tr>
  			<th>Id</th><th>Employee Name</th><th>Address</th><th>Email</th><th>Mobile</th><th>Technical Skills</th><th>Experience</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php 
  			$qry = mysqli_query($conn,"select * from Employee");
  			while($res=mysqli_fetch_array($qry)){
  		?>
  		<tr>
      <td><?php echo $res['Employee_Id'];?></td>
        <td><?php echo $res['Employee_Name'];?></td>
        <td><?php echo $res['Address'];?></td>
		   <td><?php echo $res['Email'];?></td>
                <td><?php echo $res['Mobile'];?></td>
                 <td><?php echo $res['Technical_Skills'];?></td>
				 <td><?php echo $res['Experience'];?></td>
  			<td class="dropdown">
  				<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu dropdown-menu-right">
			      <li><a href="add_employee.php?Edit=<?php echo $res['Employee_Id'];?>">Edit</a></li>
			    </ul>
  			</td>
  		</tr>
  		<?php }?>
  	</tbody>
  </table>
 </div>
 <?php
 if (isset($_REQUEST['did'])) {
  $qry = mysqli_query($conn,"update Employee set flag='1' where id='".$_REQUEST['did']."'");
  mysqli_fetch_array($qry);
  echo "<script>alert('Deleteed Successfully');
  window.location='Employee.php';</script>";
 }
 ?>
</body>
</html>