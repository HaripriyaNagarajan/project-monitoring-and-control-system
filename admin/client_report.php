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
                  $qry="select distinct(Client_Name) from client";
                  $exe=mysqli_query($conn,$qry);
               ?>
                <select name="Client_Name" class="form-controlS">
                <option>--Select Client Name--</option>
                <?php while($fth=mysqli_fetch_array($exe)) { 
                  if ($res['Client_Name']==$fth['Client_Name']) {
                    ?>
                    <option selected><?php echo $res['Client_Name'] ?></option>
					
                    <?php
                  } else {
                    ?>
                    <option><?php echo $fth['Client_Name']; ?></option>
					
					
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
            <th>Client Name</th><th>Project Name </th><th>Company Name</th><th>Address</th><th>Status of Project</th>
         </tr>
      </thead>
      <tbody>
                <?php 
          $count = 0;
			$Client_Name=$_POST["Client_Name"];
			 $qry = mysqli_query($conn,"select * from client where Client_Name='".$Client_Name."'");
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
     
                <td><?php echo $res['Client_Name'];?></td>
         <td><?php echo $res['Project_Name'];?></td>
		 <td><?php echo $res['Company_Name'];?></td>
		 		   <td><?php echo $res['Address'];?></td>

		  
                  <td><?php echo $Status;?></td>
          
         </tr>
         <?php }?>
      </tbody>
     </table>
    </div>

</body>

</html>