<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");?>

    <div class="container-fluid">
        <div class="container" id="heading">
        <h4><?php echo  'PROJECT  REPORT' ?></h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
             

                 <?php 
                  $qry="select distinct(Project_Name) from project";
                  $exe=mysqli_query($conn,$qry);
               ?>
                <select name="Project_Name" class="form-controlS">
                <option>--Select Project--</option>
                <?php while($fth=mysqli_fetch_array($exe)) { 
                  if ($res['Project_Name']==$fth['Project_Name']) {
                    ?>
                    <option selected><?php echo $res['Project_Name'] ?></option>
					
                    <?php
                  } else {
                    ?>
                    <option><?php echo $fth['Project_Name']; ?></option>
					
					
                    <?php
                  }
                  ?>
                <?php } ?>
                </select>
              
				
               </div>
         

        
			   
               <div class="col-sm-2">
                 <input type="submit" name="<?php echo  'Display' ?>" Value="<?php echo  'Display' ?>" class="btn btn-primary">
               </div>
            </div>  
        </form>
    </div>
    <div class="container tblarea">
     <table id="table" class="table table-bordered table-hover table-responsive">
      <thead>
         <tr>
            <th>Project Name</th><th>Client Name </th><th>Technology</th><th>Duration</th><th>Budget</th><th>Status of Project</th>
         </tr>
      </thead>
      <tbody>
                <?php 
          $count = 0;
			$Project_Name=$_POST["Project_Name"];
			 $qry = mysqli_query($conn,"select * from project where Project_Name='".$Project_Name."'");
             while($res=mysqli_fetch_array($qry))
			 { 
				$count++;
				$stat=$res['flag'];
				if($stat=='1')
				{
				$Status="Completed";
				}
				else
				{
					$Status="In-Progress Stage";
				}
         ?>
         <tr>
     
                <td><?php echo $res['Project_Name'];?></td>
         <td><?php echo $res['Client_Name'];?></td>
		 <td><?php echo $res['Technology'];?></td>
		 		   <td><?php echo $res['Duration'];?></td>
		  <td><?php echo $res['Budget'];?></td>
		  
                  <td><?php echo $Status;?></td>
          
         </tr>
         <?php }?>
      </tbody>
     </table>
    </div>

</body>

</html>