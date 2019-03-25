<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");?>

    <div class="container-fluid">
        <div class="container" id="heading">
        <h4><?php echo  'CLIENT  REPORT' ?></h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
             

                 <?php 
                  $qry="select distinct(Project_Name) from project_Work";
                  $exe=mysqli_query($conn,$qry);
               ?>
                <select name="Project_Name" class="form-controlS">
                <option>--Select Project Name--</option>
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
        <th>Project Name </th><th>Technology</th><th>Allocated Duration(Hrs.)</th><th>Time Work Load Taken(Hrs.)</th><th>Project-Status</th><th> Deviation(Hrs.) </th><th>Profit/Loss Info </th>
         </tr>
      </thead>
      <tbody>
                <?php 
				$time_taken=0;
          $count = 0;
			$Project_Name=$_POST["Project_Name"];
			 $qry = mysqli_query($conn,"select * from project_Work where Project_Name='".$Project_Name."'");
             while($res=mysqli_fetch_array($qry))
			 { 
				$count++;
				$time_taken=$time_taken + $res['Work_Duration'];
				$total_duration=$res['Total_Duration'];
				
				$stat=$res['Project_Status'];
				if($stat=='Completed')
				{
				$Status="Completed";
				}
				else
				{
				$Status="In-Progress";
				}
			 }
			 $deviation=$total_duration-$time_taken;
			 if($stat=='Completed' and $deviation<0)
			 {
					  $project_info="Project in Red Alert...Exceeds the Budget..";
			 }
			 else  if($stat=='Completed' and $deviation>=0)
			 {
				  $project_info="Profit Completed with in Duration..";
				   $deviation=0;
	
			 }
			 else  if($stat=='In-Progress' and $deviation<0)
			 {
				  $project_info="Project in Red Alert...Exceeds the Budget...Project In Development Stage";
	
			 }
			  else  if($stat=='In-Progress' and $deviation>0)
			 {
				  $project_info="Project In Development Stage";
	
			 $deviation=0;
			 }
				
         ?>
		 
		        <?php 
			
          $count = 0;
			$Project_Name=$_POST["Project_Name"];
			if($stat=='Completed')
			{
			 $qry = mysqli_query($conn,"select * from project_Work where Project_Name='".$Project_Name."' and Project_Status='Completed'");
             while($res=mysqli_fetch_array($qry))
			 { 
				$count++;
				
				$stat=$res['Project_Status'];
			 
         ?>
         <tr>
     
                <td><?php echo $res['Project_Name'];?></td>
         <td><?php echo $res['Technology'];?></td>
		 <td><?php echo $res['Total_Duration'];?></td>
		 		   <td><?php echo $time_taken;?></td>

		  
                  <td><?php echo $Status;?></td>
				   <td><?php echo $deviation;?></td>
                       <td><?php echo $project_info;?></td>
         </tr>
			<?php }
						
			}
			else
			{
		$qry = mysqli_query($conn,"select * from project_Work where Project_Name='".$Project_Name."' and Project_Status='In-Progress'");
		$res=mysqli_fetch_array($qry);
			  
		         $stat=$res['Project_Status'];
				?>  <tr>
     
                <td><?php echo $res['Project_Name'];?></td>
         <td><?php echo $res['Technology'];?></td>
		 <td><?php echo $res['Total_Duration'];?></td>
		 		   <td><?php echo $time_taken;?></td>

		  
                  <td><?php echo $Status;?></td>
				  <td><?php echo $deviation;?></td>
				     <td><?php echo $project_info;?></td>
          
         </tr>
			 <?php
			 }
				 
				
			?>
      </tbody>
     </table>
    </div>

</body>

</html>