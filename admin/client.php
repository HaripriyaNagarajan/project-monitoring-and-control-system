<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");?>
 <div class="container">
	<div class="pull-right">
		<a href="add_client.php" class="btn btn-success btn-sm"> + New Client </a>
	</div>
 </div>
 <div class="container-fluid tblarea">
  <table id="table" class="table table-bordered table-hover table-responsive">
  	<thead>
  		<tr>
  			<th>Id</th><th>Client Name</th><th>Company Name</th><th>Email</th><th>Mobile</th><th>Project Name</th><th>Address</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php 
  			$qry = mysqli_query($conn,"select * from Client");
  			while($res=mysqli_fetch_array($qry)){
  		?>
  		<tr>
      <td><?php echo $res['Client_Id'];?></td>
        <td><?php echo $res['Client_Name'];?></td>
        <td><?php echo $res['Company_Name'];?></td>
		   <td><?php echo $res['Email'];?></td>
                <td><?php echo $res['Mobile'];?></td>
                 <td><?php echo $res['Project_Name'];?></td>
				 <td><?php echo $res['Address'];?></td>
  			<td class="dropdown">
  				<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu dropdown-menu-right">
			      <li><a href="add_client.php?Edit=<?php echo $res['Client_Id'];?>">Edit</a></li>
			    </ul>
  			</td>
  		</tr>
  		<?php }?>
  	</tbody>
  </table>
 </div>
 <?php
 if (isset($_REQUEST['did'])) {
  $qry = mysqli_query($conn,"update Client set flag='1' where id='".$_REQUEST['did']."'");
  mysqli_fetch_array($qry);
  echo "<script>alert('Deleteed Successfully');
  window.location='Client.php';</script>";
 }
 ?>
</body>
</html>