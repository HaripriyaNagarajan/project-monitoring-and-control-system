<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");

if (isset($_REQUEST['submit'])) 
{

      $query="select ifnull(max(Id),10) from Client";
      $execute=mysqli_query($conn,$query);
      list($id)=mysqli_fetch_array($execute);
      $id = $id+1;
      $act_id = "CL_".$id;
	  $flag=0;

      
           
      $query = "INSERT INTO Client SET Id='".$id."', flag='".$flag."', Client_Id='".$act_id."', Client_Name='".inp('Client_Name')."', Mobile='".inp('Mobile')."', Email='".inp('Email')."', Project_Name='".inp('Project_Name')."', Company_Name='".inp('Company_Name')."', Address='".inp('Address')."',flag_allocate='0'";
      if(mysqli_query($conn,$query))
      {
         echo "<script>alert('Inserted Successfully');window.location='Client.php'</script>";
      }
      else
      {
         die("Error : ".mysqli_error($conn));
      }
   }
       $edi=$_REQUEST["Edit"];
       $del=$_REQUEST["delete"];
   if(isset($edit))
   {
	
	
      $qry = mysqli_query($conn,"select * from Client where Client_Id = '".$edit."'");
      $res = mysqli_fetch_array($qry);
	  }
    if(isset($delete))
   {
  
  
      $qry = mysqli_query($conn,"delete from Client where Client_Id = '".$delete."'");
      $res = mysqli_fetch_array($qry);
    
    
    
   
   }

   if(isset($_REQUEST["update"]))
   {
		
	 $sqlt = "update Client SET  Mobile='".inp('Mobile')."', Email='".inp('Email')."', Project_Name='".inp('Project_Name')."', Company_Name='".inp('Company_Name')."', Address='".inp('Address')."' where  Client_Name='".inp('Client_Name')."'";
      if(mysqli_query($conn,$sqlt))
      {
        header("location:client.php");
	  
      }
      else
      {
        die("Error : ".mysql_error($conn));
      }
	  

   }

?>
<script>
  function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
    <div class="container-fluid">
        <div class="container" id="heading">
         <h4>Add Client</h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Cient Name: </label>
                <div class="col-sm-5" required>
                  
                    <input type="text" name="Client_Name" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Client_Name'] : '' ?>">
                </div>
            </div>
			
			  <div class="form-group">
                <label class="control-label col-sm-3">Mobile No.: </label>
                <div class="col-sm-5" required>
                  <input type="text" name="Mobile" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Mobile'] : '' ?>">
                </div>
            </div>
			
			  <div class="form-group">
                <label class="control-label col-sm-3">Email: </label>
                <div class="col-sm-5" required>
                  <input type="text" name="Email" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Email'] : '' ?>">
                </div>
            </div>
			
			 <div class="form-group">
                <label class="control-label col-sm-3">Project Name: </label>
                <div class="col-sm-5" required>
                  <input type="text" name="Project_Name" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Project_Name'] : '' ?>">
                </div>
            </div>
			
			 <div class="form-group">
                <label class="control-label col-sm-3">Company Name: </label>
                <div class="col-sm-5" required>
                  <input type="text" name="Company_Name" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Company_Name'] : '' ?>">
                </div>
            </div>
			
            <div class="form-group">
                <label class="control-label col-sm-3">Address : </label>
                <div class="col-sm-5" required>
                    <textarea name="Address" class="form-control" rows="5"><?php echo (isset($_REQUEST['Edit'])) ? $res['Address'] : '' ?></textarea>
                </div>
            </div>
      
	      <div class="col-sm-2">
                 
	  
           
            <div class="form-group">                
                <div class="col-sm-offset-5 col-sm-2">
                    <input type="submit" name="<?php echo (isset($_REQUEST['Edit'])) ? 'update' : 'submit' ?>" value="<?php echo (isset($_REQUEST['Edit'])) ? 'update' : 'Insert' ?>" class="btn btn-primary">
                </div>
            </div>
			 
     
        </form>
    </div>

</body>
</html>