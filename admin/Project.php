<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");

if (isset($_REQUEST['Submit'])) 
{
   $qry=mysqli_query($conn,"select ifnull(max(Id),10) from Project");
   list($id)=mysqli_fetch_array($qry);
   $id = $id+1;
   $Project_Id = "Project_".$id;

$qer="insert into Project set Id='".$id."', Project_Id='".$Project_Id."' , Project_Name='".inp('Project_Name')."', Client_Name='".inp('Client_Name')."' , Technology='".inp('Technology')."', Budget='".inp('Budget')."' , Duration='".inp('Duration')."',flag_allocate='0'";
  if(mysqli_query($conn,$qer))
  {
 
     $client_flag="update client set flag_allocate='1' where Project_Name='".inp('Project_Name')."'";
	mysqli_query($conn,$client_flag);
      header("Location:Project.php");
  }
   else
   { 
      die("Error : ".mysqli_error($conn));
   }
}
$Project_Id = inp('Edit');

if(isset($_REQUEST['Edit']))
{
  $qry = mysqli_query($conn,"select * from Project where Project_Id='".$Project_Id."'");
        $res = mysqli_fetch_array($qry);
}

if(isset($_REQUEST['Update']))
{
  $Project_Id = inp('Project_Id');

$qry="update Project set  Technology='".inp('Technology')."', Budget='".inp('Budget')."' , Duration='".inp('Duration')."' where  Project_Id='". $Project_Id."'";
   if(mysqli_query($conn,$qry))
      header("Location:Project.php");
   else
      die("Error : ".mysqli_error($conn));
}

if (isset($_REQUEST['Delete'])) {
  $qry = mysqli_query($conn,"delete from Project where Project_Id = '".inp('Delete')."'");
  $res = mysqli_fetch_array($qry);
  
     $client_flag="update client set flag='0' where Project_Name='".inp('Project_Name')."'";
	 mysqli_query($conn,$client_flag);
  header("Location:Project.php");
}

?>
    <div class="container-fluid">
        <div class="container" id="heading">
        <h4><?php echo (isset($_REQUEST['Edit'])) ? 'Update Project' : 'Add New Project_' ?></h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <div class="col-sm-3">
                <input type="hidden" name="Project_Id" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Project_Id'] : '' ?>">
                  <input type="text" name="Technology" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Technology'] : '' ?>" placeholder="Technology">
				      <input type="text" name="Budget" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Budget'] : '' ?>" placeholder="Budget">
				    <input type="text" name="Duration" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Duration'] : '' ?>" placeholder="Duration(Hrs.)">
				    
				  
               </div>
<?php echo $res['Project_Name']; ?>
               <div class="col-sm-2">
               <?php 
                  $qry="select * from Client where flag_allocate='0'";
                  $exe=mysqli_query($conn,$qry);
               ?>
                <select name="Project_Name" class="form-control">
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
			<?php 
			
			//echo "prj name".$_POST['Project_Id'];
		
						
				?>
			<! <input type="text" name="Client_Name" class="form-control" value="<?php echo  $Project_Name ?>" >
               </div>
         

              
               <?php if(isset($_REQUEST['Edit'])){?>

               <?php }?>
			   
               <div class="col-sm-2">
                 <input type="submit" name="<?php echo (isset($_REQUEST['Edit'])) ? 'Update' : 'Submit' ?>" Value="<?php echo (isset($_REQUEST['Edit'])) ? 'UPDATE' : 'INSERT' ?>" class="btn btn-primary">
               </div>
            </div>  
        </form>
    </div>
    <div class="container tblarea">

     <table id="table" class="table table-bordered table-hover table-responsive">
      <thead>
         <tr>
            <th>#</th><th>Project Id</th><th>Project Name</th><th>Technology</th><th>Duration(Hrs.)</th><th>Budget(Rs.)</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $count = 0;
            $qry = mysqli_query($conn,"select * from Project where flag='0' order by Id Desc");
            while($res=mysqli_fetch_array($qry)){ $count++;
         ?>
         <tr>
         <td><?php echo $count;?></td>
		 
		 
         <td><?php echo $res['Project_Id'];?></td>
           <td><?php echo $res['Project_Name'];?></td>

		 <td><?php echo $res['Technology'];?></td>
		  <td><?php echo $res['Duration'];?></td>
		   <td><?php echo $res['Budget'];?></td>
            <td class="dropdown">
               <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="Project.php?Edit=<?php echo $res['Project_Id'];?>">Edit</a></li>
                           
               
                </ul>
            </td>
         </tr>
         <?php }?>
      </tbody>
     </table>
    </div>

</body>

</html>