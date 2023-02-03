<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Convert HTML To Image</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
  </script>
</head>
<style media="screen">
  #htmlContent {
    /* background: lightblue; */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 90vh;
  }
</style>



<body onload="autoClick();">
  <?php
  session_start();
  require_once('methods/connect.php');
  $user_usn = $_SESSION['usn'];

  $querystudent = "SELECT* FROM STUDENT WHERE USN = '$user_usn' ";
  $result1 = $conn->query($querystudent);
  if ($result1->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
      $usn = $row['USN'];
      $name = $row['Name'];
      $busno = $row['Bus_no'];
      $address = $row['Address'];
      $contact = $row['Contact'];
      $gender = $row['Gender'];
    }
  }
  $querybus = "SELECT* FROM BUS WHERE Bus_no = '$busno' ";
  $result2 = $conn->query($querybus);
  if ($result2->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
      $busno = $row['Bus_no'];
      $driverid = $row['Driver_id'];
      $coordid = $row['Coordinator_id'];
      $routeno = $row['Route_no'];
    }
  }
  $querydriver = "SELECT* FROM DRIVER WHERE Driver_id = '$driverid' ";
  $result3 = $conn->query($querydriver);
  if ($result3->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result3)) {
      $drivername = $row['Driver_name'];
      $drivercontact = $row['Driver_contact'];
    }
  }
  $querycoord = "SELECT* FROM COORDINATOR WHERE Coordinator_id = '$coordid' ";
  $result4 = $conn->query($querycoord);
  if ($result4->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result4)) {
      $coordname = $row['Coordinator_name'];
      $coordcontact = $row['contact'];
    }
  }
  $querypass = "SELECT * from BUS_PASS WHERE USN = '$user_usn'";
  $result5 = $conn->query($querypass);
  if ($result5->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result5)) {
      $passno = $row['Pass_id'];
      $feestatus = $row['Fee_status'];
      $issued = $row['Issued_date'];
      $validity = $row['Valid_till'];
    }
  }
  ?>
  <div id="htmlContent">
    <div class="pass card" id="makepdf">
      <div class="d-flex p-3 t-4 ">
        <div class="card d-flex flex-column align-items-center text-center p-4">
          <h2>COLLEGE BUS PASS</h2>
          <div class="d-flex flex-column align-items-center text-center">
            <div class="mt-4 mb-3">
              <h4>
                <?php echo "$name"; ?>
              </h4>
              <p class="text-secondary mb-1">
                <?php echo "$usn"; ?>
              </p>

            </div>
          </div>
          <!-- <hr class="my-4"> -->
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-phone mr-3 pe-2"></span> Phone</h6>
              <span class="text-secondary">
                <?php echo "$contact"; ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-mars mr-3 pe-2"></span>Gender</h6>
              <span class="text-secondary">
                <?php echo "$gender"; ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-map-marker mr-3 pe-2"></span>Pickup Point</h6>
              <span class="text-secondary">
                <?php echo "$address"; ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-money mr-3 pe-2"></span>Fess Status</h6>
              <span class="text-secondary">
                <?php echo "$feestatus"; ?>
              </span>
            </li>
            <p class="mt-3 mb-0"><u>Pass Details:</u></p>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-calendar-check-o mr-3 pe-2"></span>Issued On</h6>
              <span class="text-secondary">
                <?php echo " $issued"; ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><span class="fa fa-calendar-times-o mr-3 pe-2"></span>Valid Till</h6>
              <span class="text-secondary">
                <?php echo "$validity"; ?>
              </span>
            </li>
          </ul>
        </div>
        <div>
          <div class="col-lg">
            <div class="card">
              <div class="card-body">
                <h3 class="mb-3">Bus Details</h3>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Bus No.</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo "$busno"; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Route No.</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo "$routeno"; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-4 mt-2">Driver Name:</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <p>
                      <?php echo "$drivername"; ?>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-4">Driver Contact:</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <p>
                      <?php echo "$drivercontact"; ?>
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-4 mt-2">Coordinator Name:</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <p>
                      <?php echo "$coordname"; ?>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-4">Coordinator Contact:</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <p>
                      <?php echo "$coordcontact"; ?>
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Bus Route</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    // require_once('methods/connect.php');
                    // $none="0 results";
                    $query = "select * from `ROUTE` WHERE Route_no = '$routeno'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                      // OUTPUT DATA OF EACH ROW
                      while ($row = mysqli_fetch_assoc($result)) {
                        //Route Location join-table 
                        $x = $row["Route_no"];
                        $query1 = "select * from `LOCATION` l where l.Route_no=$x";
                        $result1 = $conn->query($query1);
                        echo $row['Start_loc'];
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                          echo "- " . $row1['Loc'] . "-";
                        }
                        echo $row["End_loc"];
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <h5>BUS PASS-RULES</h5>
        <ul>
          <li>
            <p>This pass is <b>NOT TRANSFERABLE</b></p>
          </li>
          <li>
            <p>Ths pass must be produced by the student for verification by the concerned authorities whenever asked</p>
          </li>
          <li>
            <p>Any misbehavior or indicipline by the student will attract a fine</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="p-4 position-relative top-50 start-50">
    <a class="btn btn-primary " id="download">Download as image</a>
    <?php echo '<button onclick="window.print()" class="btn btn-warning m-5">Print</button>'; ?>
  </div>

  <script type="text/javascript">
    function autoClick() {
      $("#download").click();
    }

    $(document).ready(function () {
      var element = $("#htmlContent");

      $("#download").on('click', function () {

        html2canvas(element, {
          onrendered: function (canvas) {
            var imageData = canvas.toDataURL("image/jpg");
            var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
            $("#download").attr("download", "image.jpg").attr("href", newData);
          }
        });

      });
    });
  </script>
</body>

</html>