<?php require_once("header.php");?>
<body>
<?php require_once("NavBar.php");
    
    $qry = mysqli_query($conn,"select * from tbl_slider");
    $res = mysqli_fetch_array($qry);

    if(isset($_REQUEST['submit']))
    {
        $qry = mysqli_query($conn,"select slider1 from tbl_slider");
        $rs = mysqli_fetch_array($qry);
        $eimg = $rs['slider1'];

        $output_dir = "slider_images/";
        $img = $_FILES['image']['name'];
        if($img != '')
        {
        $ext = pathinfo($img,PATHINFO_EXTENSION);
        $img = $eimg;
        move_uploaded_file($_FILES['image']['tmp_name'],$output_dir.$img);
        }       
        else
        {
            $img = $eimg;
        }
    }

    if(isset($_REQUEST['submit1']))
    {
        $qry = mysqli_query($conn,"select slider2 from tbl_slider");
        $rs = mysqli_fetch_array($qry);
        $eimg = $rs['slider2'];

        $output_dir = "slider_images/";
        $img = $_FILES['image']['name'];
        if($img != '')
        {
        $ext = pathinfo($img,PATHINFO_EXTENSION);
        $img = $eimg;
        move_uploaded_file($_FILES['image']['tmp_name'],$output_dir.$img);
        }       
        else
        {
            $img = $eimg;
        }
    }

    if(isset($_REQUEST['submit2']))
    {
        $qry = mysqli_query($conn,"select slider3 from tbl_slider");
        $rs = mysqli_fetch_array($qry);
        $eimg = $rs['slider3'];

        $output_dir = "slider_images/";
        $img = $_FILES['image']['name'];
        if($img != '')
        {
        $ext = pathinfo($img,PATHINFO_EXTENSION);
        $img = $eimg;
        move_uploaded_file($_FILES['image']['tmp_name'],$output_dir.$img);
        }       
        else
        {
            $img = $eimg;
        }
    }
          
?>
<div class="container-fluid">
    <div class="container" id="heading">
     <h4>Update Slider <span>Image Size should be in <span style="color: #f4416b;"><b>1600x774</span></b></span></span></h4>        
    </div>
</div>
<div class="container" id="content" style="">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-10">
                        <div class="form-group">
                        <label for="yop" class="col-sm-3 control-label"> Slider Image 1:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type = "file" id="image" name = "image" onchange="image_preview(this)" />
                        </div>
                        <div class="col-sm-4">
                            <img src="slider_images/<?php echo $res['slider1'];?>" height="100px" id="img">
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" value="submit" name="submit" class="btn btn-success"> Update </button>        
                            </div>
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-10">
                        <div class="form-group">
                        <label for="yop" class="col-sm-3 control-label"> Slider Image 2:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type = "file" id="image" name = "image" onchange="image_preview1(this)" />
                        </div>
                        <div class="col-sm-4">
                            <img src="slider_images/<?php echo $res['slider2'];?>" height="100px" id="img1">
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" value="submit1" name="submit1" class="btn btn-success"> Update </button>        
                            </div>
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-10">
                        <div class="form-group">
                        <label for="yop" class="col-sm-3 control-label"> Slider Image 3:</label>
                        <div class="col-sm-4">
                            <input class="form-control" type = "file" id="image" name = "image" onchange="image_preview2(this)" />
                        </div>
                        <div class="col-sm-4">
                            <img src="slider_images/<?php echo $res['slider3'];?>" height="100px" id="img2">
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" value="submit2" name="submit2" class="btn btn-success"> Update </button>        
                            </div>
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
    function image_preview1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img1')
                        .attr('src', e.target.result)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    function image_preview2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img2')
                        .attr('src', e.target.result)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>