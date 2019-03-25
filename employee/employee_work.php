<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");
$e_nam= $_SESSION['UName'];
$qry = mysqli_query($conn,"select * from project_schedule where Employee_name = '".$e_nam."' and flag='0'");
 if($res=mysqli_fetch_array($qry))
 {
  			//while($res=mysqli_fetch_array($qry)){
				$Employee_Name=$res['Employee_Name'];
				$Project_Name=$res['Project_Name'];
				$Technology=$res['Technology'];
				$Activity=$res['Activity'];
				$Total_Duration=$res['Duration'];
				$Work_Duration=$res['Work_Duration'];
				$Work_Status=$res['Work_Status'];
				
			}
			else
			{
			 echo "<script>alert('Project Not assigned ');window.location='Login_Employee.php'</script>";
			}

		  //}

if (isset($_REQUEST['submit'])) 
{

      $query="select ifnull(max(Id),10) from project_work";
      $execute=mysqli_query($conn,$query);
      list($id)=mysqli_fetch_array($execute);
      $id = $id+1;
   //   $act_id = "Emp_".$id;
	  //$flag=0;
		$stat=$_POST["Project_Status"];
		if($stat=="Completed")
		{
		//$stat="C";
		$update_schedule="update project_schedule set flag='1' where Employee_Name='".inp('Employee_Name')."'";
		mysqli_query($conn,$update_schedule);
		
			$update_employee="update employee set flag='0' where Employee_Name='".inp('Employee_Name')."'";
		mysqli_query($conn,$update_employee);
		
			    $qry2 = mysqli_query($conn,"update Client set flag='1' where Project_Name='".inp('Project_Name')."'");
  mysqli_fetch_array($qry2);
  
   $qry3 = mysqli_query($conn,"update Project set flag='1' where Project_Name='".inp('Project_Name')."'");
  mysqli_fetch_array($qry2);
		
		}
		 $query = "INSERT INTO project_work SET Id='".$id."',Employee_Name='".inp('Employee_Name')."', Project_Name='".inp('Project_Name')."',  Technology='".inp('Technology')."', Activity='".inp('Activity')."', Total_Duration='".inp('Total_Duration')."', Work_Duration='".inp('Work_Duration')."', Work_Status='".inp('Work_Status')."',Project_Status='".$stat."'";
   //  $query = "INSERT INTO project_work SET Id='".$id."',Employee_Name='".inp('Employee_Name')."', Project_Name='".inp('Project_Name')."',  Technology='".inp('Technology')."', Activity='".inp('Activity')."', Total_Duration='".inp('Total_Duration')."', Work_Duration='".inp('Work_Duration')."', Work_Status='".inp('Work_Status')."',Project_Status='".inp('Project_Status')."'";
      if(mysqli_query($conn,$query))
      {
		 
	
		  mysqli_query($conn,$sql);
          echo "<script>alert('Inserted Successfully');window.location='employee_work.php'</script>";
      }
      else
      {
         die("Error : ".mysqli_error($conn));
      }
	  
	  
   }
       $edi=$_REQUEST["Edit"];
  // if(isset($edi))
   //{
	   $e_nam= $_SESSION['UName'];
	    $qry = mysqli_query($conn,"select * from project-schedule");
    //  $qry = mysqli_query($conn,"select * from project-schedule where Employee_name = '".$e_nam."'");
      $res = mysqli_fetch_array($qry);


  // }

   if(isset($_REQUEST["update"]))
   {
		
	 $sql = "update Employee SET  Password='".inp('Password')."' where  Employee_Name = '".inp('$Employee_Name')."'";
      if(mysqli_query($conn,$sql))
      {
        header("location:employee_work.php");
      }
      else
      {
        die("Error : ".mysql_error($conn));
      }

   }

?>
    <div class="container-fluid">
        <div class="container" id="heading">
         <h4>Add Employee</h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
           <div class="container-fluid">
        <div class="container" id="heading">
         <h4>Employee Time Sheet :</h4>        
        </div> 
    </div>
			
			<div class="form-group">
                <label class="control-label col-sm-3">Employee Name: </label>
                <div class="col-sm-5">
                  
                    <input type="text" name="Employee_Name" class="form-control" value="<?php echo  $Employee_Name;?>">
                </div>
            </div>
				<div class="form-group">
                <label class="control-label col-sm-3">Project Name : </label>
                <div class="col-sm-5">
                  
                    <input type="text" name="Project_Name" class="form-control" value="<?php echo  $Project_Name; ?>">
                </div>
            </div>
			
			  <div class="form-group">
                <label class="control-label col-sm-3">Technologylogy : </label>
                <div class="col-sm-5">
                  <input type="text" name="Technology" class="form-control" value="<?php echo $Technology; ?>">
                </div>
            </div>
			
			  <div class="form-group">
                <label class="control-label col-sm-3">Activity : </label>
                <div class="col-sm-5">
                  <input type="text" name="Activity" class="form-control" value="<?php echo $Activity; ?>">
                </div>
            </div>
			
			 <div class="form-group">
                <label class="control-label col-sm-3">Duration : </label>
                <div class="col-sm-5">
                  <input type="text" name="Total_Duration" class="form-control" value="<?php echo $Total_Duration; ?>">
                </div>
            </div>
			
			 <div class="form-group">
                <label class="control-label col-sm-3">Time Used (in Hrs): </label>
                <div class="col-sm-5">
                  <input type="text" name="Work_Duration" class="form-control" value="<?php echo  $Work_Duration; ?>">
                </div>
            </div>
			
            <div class="form-group">
                <label class="control-label col-sm-3">Work Status : </label>
                <div class="col-sm-5">
                    <textarea name="Work_Status" class="form-control" rows="5"><?php echo $Work_Status; ?></textarea>
                </div>
            </div>
			
			  <div class="form-group">
			   <label class="control-label col-sm-3">Status of Project : </label>
               <div class="col-sm-5">
			   <select  name="Project_Status" class="form-control">
					<option value="In-Progress">In-Progress</option>
					<option value="Completed">Completed</option>

				</select>
				 </div>
            </div>
     
           
            <div class="form-group">                
                <div class="col-sm-offset-5 col-sm-2">
                    <input type="submit" name="<?php echo (isset($_REQUEST['Edit'])) ? 'update' : 'submit' ?>" value="<?php echo (isset($_REQUEST['Edit'])) ? 'update' : 'Insert' ?>" class="btn btn-primary">
                </div>
            </div>
			 
     
        </form>
    </div>

</body>
</html>