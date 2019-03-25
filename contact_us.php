<?php require("header.php");

if(isset($_REQUEST['email']))
{
  $From = date("d-m-Y", strtotime($_REQUEST['From']));
  $To = date("d-m-Y", strtotime($_REQUEST['To']));
   # Send Mail To Customer
  $email = "sales@xploreholidays.in";
  //$email = "siva.ks1391@gmail.com";
  $tbl = "<!DOCTYPE html>
    <html>
    <head>
      <style type='text/css'>
      table{
        width: 80%;
      }
        table,th,td
        {
          border:1px solid #e0e1e2;
          padding: 1%;
        }
        th
        {
          width: 15%;text-align:left;
        }
      </style>
    </head>
    <body>
      <p>Dear Sales Team</p>
      <p>Enquiry Details given below for your reference</p>
      <table>
        <tr>
          <th>Name</th><td>".$_REQUEST['Name']."</td>
          <th>Gender</th><td>".$_REQUEST['Gend']."</td>
        </tr>
        <tr>
          <th>Phone No</th><td>".$_REQUEST['Phoneno']."</td>
          <th>Email</th><td>".$_REQUEST['Email']."</td>
        </tr>
        <tr>
          <th>City</th><td>".$_REQUEST['City']."</td>
          <th>Planned Destination</th><td>".$_REQUEST['Plan']."</td>
        </tr>
        <tr>
          <th>Adults</th><td>".$_REQUEST['Adults']."</td>
          <th>Children</th><td>".$_REQUEST['Children']."</td>
        </tr>
        <tr>
          <th>Date-From</th><td>".$From."</td>
          <th>Date-To</th><td>".$To."</td>
        </tr>
        <tr>
          <th>Planned Days</th><td>".$_REQUEST['Travel']."</td>
          <th>Planned Itenary</th><td>".$_REQUEST['Plan-Itinerary']."</td>
        </tr>
      </table>
    </body>
    </html>";
  require_once 'PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->setFrom('no-reply@xploreholidays.in', 'Xploreholidays');
  $mail->addAddress($email, 'Sales');
  $mail->isHTML(true);
  $mail->Subject  = 'Enquiry Details';
  $mail->Body     = $tbl;
  if($mail->send())
  {
    echo "<script>alert('Enquiry Sent Successfully');window.location='contact_us.php';</script>";
  } 
  else
  {
    die("Error : ".$mail->ErrorInfo);
  }
}
?>

<div class="row">
  <img src="img/outbound/nature3.jpg" alt="m1" class="head_img"> 
</div>
<!-- database connection -->

	<!-- database ends -->
            
   <!-- [/OUTBOUND TOURS]
 ============================================================================================================================--> 
 <div class="row container-fluid">
    <div class="row heading_font" id="about">
     <h3>CONTACT <span id="span">&nbsp;US</span></h3>
    </div>   
    
    <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="form-horizontal">
          <h3 class="heading_font">My Tour Request :<span id="span"></span></h3>
          <div class="form-group">
            <div class="col-sm-6">
              <input name="Name" type="text" class="form-control" placeholder="Your Name" />
            </div>
            <div class="col-sm-6">
              <input name="Plan" type="text" class="form-control" placeholder="Planned Destination" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label class="radio-inline"><input type="radio" name="Gend" value="Male">Male</label>
              <label class="radio-inline"><input type="radio" name="Gend" value="Female">Female</label>
            </div>
            <div class="col-sm-3">
              <input type="number" name="Adults" class="form-control" placeholder="Adults">
            </div>
            <div class="col-sm-3">
              <input type="number" name="Children" class="form-control" placeholder="Children">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <input name="Phoneno" type="text" class="form-control" placeholder="Phone No.(include extension)" />
            </div>
            <div class="col-sm-3">
              <input name="From" id="fromdate" type="text" class="form-control" placeholder="Estimate Travel Date From:" />
            </div>
            <div class="col-sm-3">
              <input name="To" id="todate" type="text" class="form-control" placeholder="To." />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <input name="Email" type="text" class="form-control" placeholder="Email" />
            </div>
            <div class="col-sm-6">
              <input name="Travel" type="text" class="form-control" placeholder="Length of Travlling in Days"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <input name="City" type="text" class="form-control" placeholder="City" />
            </div>
            <div class="col-sm-6">
              <input name="Plan-Itinerary" type="text" class="form-control" placeholder="Your planned itinerary"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12 text-center">
              <input type="submit" value="SEND" class="btn btn-primary" name="email" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- [/OUTBOUND MAIN-HEADING ENDS]
 ============================================================================================================================-->
	

<?php require("footer.php");?>
<script type="text/javascript">
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#fromdate" )
        .datepicker({
          numberOfMonths: 2,
          minDate: 'Today'
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#todate" ).datepicker({
        numberOfMonths: 2
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
</script>
</body>
</html>