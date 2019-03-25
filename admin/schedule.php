<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");

if (isset($_REQUEST['Submit'])) 
{
   $qry=mysqli_query($conn,"select ifnull(max(Id),10) from tbl_schedule");
   list($id)=mysqli_fetch_array($qry);
   $id = $id+1;
   $sch_id = "SCH_".$id;

   if(mysqli_query($conn,"insert into tbl_schedule set Pkg_Id='".inp('Pkg_Id')."', Id='".$id."', Sch_Id='".$sch_id."', Day='".inp('Day')."', Title='".inp('Title')."', Description='".inp('Description')."'"))
      header("Location:schedule.php?id=".inp('Pkg_Id'));
   else
      die("Error : ".mysqli_error($conn));
}

if(isset($_REQUEST['Edit']))
{
  $qry = mysqli_query($conn,"select * from tbl_schedule where Sch_Id = '".inp('Edit')."'");
  $res = mysqli_fetch_array($qry);
}

if(isset($_REQUEST['Update']))
{
  if(mysqli_query($conn,"update tbl_schedule set Day='".inp('Day')."', Title='".inp('Title')."', Description='".inp('Description')."' where Sch_Id = '".inp('Sch_Id')."'"))
      header("Location:schedule.php?id=".inp('Pkg_Id'));
   else
      die("Error : ".mysqli_error($conn));
}


?>
    <div class="container-fluid">
        <div class="container" id="heading">
        <h4><?php echo (isset($_REQUEST['Edit'])) ? 'Update Schedule' : 'Add Schedules' ?></h4>        
        </div> 
    </div>
    <div class="container" id="content">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label class="col-sm-2 control-label">Day : </label>
               <div class="col-sm-4">
                <input type="hidden" name="Pkg_Id" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Pkg_Id'] : inp('id') ?>">
                <input type="hidden" name="Sch_Id" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Sch_Id'] : '' ?>">
                  <input type="text" name="Day" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Day'] : 'Day-' ?>" autocomplete="off" autofocus required>
               </div>
               <label class="col-sm-2 control-label">Title : </label>
               <div class="col-sm-4">
                  <input type="text" name="Title" class="form-control" value="<?php echo (isset($_REQUEST['Edit'])) ? $res['Title'] : '' ?>">
               </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Desc : </label>
              <div class="col-sm-4">
                <textarea rows="5" class="form-control" name="Description" required><?php echo (isset($_REQUEST['Edit'])) ? $res['Description'] : '' ?></textarea>
              </div> 
              <div class="col-sm-4" style="text-align: center;">
                <input type="submit" name="<?php echo (isset($_REQUEST['Edit'])) ? 'Update' : 'Submit' ?>" value="<?php echo (isset($_REQUEST['Edit'])) ? 'UPDATE' : 'INSERT' ?>" class="btn btn-primary">
                <a href="inclusion.php?id=<?php echo inp('id')?>" class="btn btn-warning">Inclusion</a>
              </div>             
            </div> 
            <div class="form-group">
              
            </div> 
        </form>
    </div>
    <div class="container tblarea">
     <table id="table" class="table table-bordered table-hover table-responsive">
      <thead>
         <tr>
            <th>#</th><th style="width:5%;">Day</th><th>Title</th><th>Description</th><th style="width:5%;">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $count = 0;
            $qry = mysqli_query($conn,"select * from tbl_schedule where Pkg_Id = '".inp('id')."'");
            while($res=mysqli_fetch_array($qry)){ $count++;
         ?>
         <tr">
         <td><?php echo $count;?></td>
         <td><?php echo $res['Day'];?></td>
         <td><?php echo $res['Title'];?></td>
         <td><?php echo $res['Description'];?></td>
            <td class="dropup">
               <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="schedule.php?Edit=<?php echo $res['Sch_Id'];?>&id=<?php echo $res['Pkg_Id'];?>">Edit</a></li>
                  <li><a href="schedule.php?did=<?php echo $res['Sch_Id'];?>">Delete</a></li>
                </ul>
            </td>
         </tr>
         <?php }?>
      </tbody>
     </table>
    </div>

</body>
</html>