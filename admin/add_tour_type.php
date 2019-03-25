<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");

if (isset($_REQUEST['submit'])) 
{

      $query="select ifnull(max(Id),10) from tbl_tour_type";
      $execute=mysqli_query($conn,$query);
      list($id)=mysqli_fetch_array($execute);
      $id = $id+1;
      $act_id = "TR_".$id;

      $output_dir = "tour_images/";
      $img = $_FILES['Images']['name'];
      $ext = pathinfo($img,PATHINFO_EXTENSION);
      $img = $act_id.".".$ext;
      move_uploaded_file($_FILES['Images']['tmp_name'],$output_dir.$img);

           
      $query = "INSERT INTO tbl_tour_type SET Id='".$id."', Tour_Id='".$act_id."',Tour_Type='".inp('Tour_Type')."',Tour_Desc='".inp('Tour_Desc')."',Tour_Img='".$img."'";
      if(mysqli_query($conn,$query))
      {
         echo "<script>alert('Inserted Successfully');window.location='tour_type.php'</script>";
      }
      else
      {
         die("Error : ".mysqli_error($conn));
      }
   }

   if(isset($_REQUEST["Edit"]))
   {
      $qry = mysqli_query($conn,"select * from tbl_tour_type where Tour_Id = '".inp('Edit')."'");
      $res = mysqli_fetch_array($qry);
   }

   if(isset($_REQUEST["update"]))
   {
	        echo "<script>alert('upd Successfully');window.location='tour_type.php'</script>";
	   
      $output_dir = "tour_images/";
      $img = $_FILES['Images']['name'];
      if($img != "")
      {
        $ext = pathinfo($img,PATHINFO_EXTENSION);
        $img = inp('Tour_Id').".".$ext;
        if(!(move_uploaded_file($_FILES['Images']['tmp_name'],$output_dir.$img)))
        {
          die("Error Moving Files : ".$_FILES['Images']['error']);
        }
      }
      else
      {
        $img = inp('Tour_Img');
      }

      $sql = "update tbl_tour_type SET Tour_Type='".inp('Tour_Type')."',Tour_Desc='".inp('Tour_Desc')."',Tour_Img='".$img."' where Tour_Id = '".inp('Tour_Id')."'";
      if(mysqli_query($conn,$sql))
      {
        header("location:tour_type.php");
      }
      else
      {
        die("Error : ".mysql_error($conn));
      }

   }

?>
    <div class="container-fluid">
        <div class="container" id="heading">
         <h4>Add New Tour Type</h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Tour Type : </label>
                <div class="col-sm-5">
                  <input type="hidden" name="Tour_Id" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Tour_Id'] : '' ?>">
                    <input type="text" name="Tour_Type" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Tour_Type'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Description : </label>
                <div class="col-sm-5">
                    <textarea name="Tour_Desc" class="form-control" rows="10"><?php echo (isset($_REQUEST['Edit'])) ? $res['Tour_Desc'] : '' ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Preview : </label>
                <div class="col-sm-5">
                    <img src="tour_images/<?php echo (!isset($_REQUEST['Edit'])) ? 'preview.jpg' : $res['Tour_Img'] ?>" width="50%" id="img">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Image : </label>
                <div class="col-sm-5">
                  <input type="hidden" name="Tour_Img" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Tour_Img'] : '' ?>">
                    <input type="file" name="Images" class="form-control" onchange="image_preview(this)">
                    <p style="color:red;">Image Size 800 x 600</p>
                </div>
            </div>

            <div class="form-group">                
                <div class="col-sm-offset-5 col-sm-2">
                    <input type="submit" name="<?php echo (isset($_REQUEST['Edit'])) ? 'update' : 'submit' ?>" value="<?php echo (isset($_REQUEST['Edit'])) ? 'Update' : 'Insert' ?>" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
<script>
    function image_preview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img')
                        .attr('src', e.target.result)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>