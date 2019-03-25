<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");?>

    <div class="container-fluid">
        <div class="container" id="heading">
        <h4><?php echo  'EMPLOYEE  REPORT' ?></h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
             

                 <?php 
                  $qry="select * from Employee";
                  $exe=mysqli_query($conn,$qry);
               ?>
                <select name="Employee_Name" class="form-controlS">
                <option>--Select Employee--</option>
                <?php while($fth=mysqli_fetch_array($exe)) { 
                  if ($res['Employee_Name']==$fth['Employee_Name']) {
                    ?>
                    <option selected><?php echo $res['Employee_Name'] ?></option>
					
                    <?php
                  } else {
                    ?>
                    <option><?php echo $fth['Employee_Name']; ?></option>
					
					
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
            <th>#</th><th>Employee Id</th><th>Employee Name</th><th>Technical Skills</th><th>Experience</th><th>Email</th>
         </tr>
      </thead>
      <tbody>
         <?php 
          $count = 0;
			$Employee_Name=$_POST["Employee_Name"];
			 $qry = mysqli_query($conn,"select * from employee where Employee_Name='".$Employee_Name."'");
             while($res=mysqli_fetch_array($qry)){ $count++;
         ?>
         <tr>
         <td><?php echo $count;?></td>
                <td><?php echo $res['Employee_Id'];?></td>
         <td><?php echo $res['Employee_Name'];?></td>
		 <td><?php echo $res['Technical_Skills'];?></td>
		 		   <td><?php echo $res['Experience'];?></td>
		  <td><?php echo $res['Email'];?></td>

          
         </tr>
         <?php }?>
      </tbody>
     </table>
    </div>

</body>

</html>