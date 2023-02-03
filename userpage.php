<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- <link rel="stylesheet" href="css/styles.css"> -->
  <!-- <link rel="stylesheet" href="css/navbar.css"> -->
  <!-- <link rel="stylesheet" href="css/form.css"> -->
  <!-- <link rel="stylesheet" href="css/userpage.css"> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <title>College bus management</title>
</head>

<body style="background-color: whitesmoke;">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">COLLEGE BUS </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse pe-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item  mx-sm-auto">
          <a class="nav-link active pe-4" aria-current="page" href="pdf.php">BusPass</a>
        </li>
        <li class="nav-item  mx-sm-auto">
          <a class="nav-link d-flex" href="logout.php"><span class="fa fa-sign-out mr-3 pe-2"></span>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  session_start();
  require_once('methods/connect.php');
  if ($_SESSION['usn'] == null) {
    header('Location:index.php');
  }
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
  <!-- ---------------------------------profile page------------------------------------ -->
  <div class="container-sm card mt-5 w-50 p-3">
    <div class="text-center">
      <h3>Notificatiions!!</h3>
    </div>
    <div class="card p-3" style="height:150px;overflow-y:scroll;">
      <?php
      $query = "select * from NOTIFICATION ORDER BY date desc";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
        while ($row0 = mysqli_fetch_assoc($result)) {
          //notification table 
          echo "  " . $row0["date"];
          echo "-\t" . $row0["text"] . "<hr>";
        }
      }
      ?>
    </div>
  </div>

  <div class="container mt-5">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="assets/avatar.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
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
                    <?php echo "$issued"; ?>
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><span class="fa fa-calendar-times-o mr-3 pe-2"></span>Valid Till</h6>
                  <span class="text-secondary">
                    <?php echo "$validity"; ?>
                  </span>
                </li>
              </ul>
              <div class="mt-4">
                <!-- <button type="button" class="btn btn-primary" name="insert" data-bs-toggle="modal"
                  data-bs-target="#studentedit">Update Details</button> -->
                <!-- <button class="btn btn-outline-primary">Change Password</button> -->

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
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
                  <h6 class="mb-4">Driver Contact:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <p>
                    <?php echo "$drivername"; ?>
                  </p>
                  <p>
                    <?php echo "$drivercontact"; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-4 mt-2">Coordinator Name:</h6>
                  <h6 class="mb-4">Coordinator Contact:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <p>
                    <?php echo "$coordname"; ?>
                  </p>
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
                        echo "- " . $row1['Loc'] . " -";
                      }
                      echo $row["End_loc"];
                    }
                  }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-info"><a href="pdf.php">Download BusPass</a> </button>
                  <!-- <button class="btn btn-info" id="button">Download BusPass</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- --------------------------------modal-------------------- -->
  <!-- <div class="modal fade" id="studentedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit/upstudent.php">
            <div class="row g-3 w-80">
              <div class="col-sm-12 form-item">
                <label for="inputusn" class="form-label">USN: </label>
                <?php echo "$usn"; ?>
              </div>
              <div class="col-sm-12 form-item">
                <label for="inputname" class="form-label">Name</label>
                <input type="text" class="textarea form-control" id="inputname" value="<?php echo "$name"; ?>"
                  name="name" required>
              </div>
              <div class="col-sm-12 form-item">
                <label for="inputgender" class="form-label">Gender</label>
                <input type="text" class="contactus form-control" id="inputgender" value="<?php echo "$gender"; ?>"
                  name="gender" required>
              </div>
              <div class="col-sm-12 form-item">
                <label for="inputphone" class="form-label">Phone</label>
                <input type="number" class="contactus form-control" id="inputphone" value="<?php echo "$contact"; ?>"
                  name="phone" required>
              </div>
              <div class="col-sm-12">
                <button class="send btn btn-warning" name="upstu">Update</button><br></br>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->


  <!-- -----------------------------------Bus Pass PDF--------------------------------- -->
  <div class="container mb-5">
    <h4 class="mx-auto">Bus Pass</h4>
    <div class="pass card" id="makepdf">
      <div class="d-flex p-3">
        <div class="card d-flex flex-column align-items-center text-center p-5">
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
          <hr class="my-4">
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
                <?php echo "  $issued"; ?>
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
                          echo "- " . $row1['Loc'] . " -";
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
            <p>Students must carry this bus pass without fail,while travelling in the bus</p>
          </li>
          <li>
            <p>Ths card must be produced by the student for verification by the concerned authorities whenever asked</p>
          </li>
          <li>
            <p>Any misbehavior or indicipline by the student will attract a fine</p>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <script>
    var button = document.getElementById("button");
    var makepdf = document.getElementById("makepdf");
    button.addEventListener("click", function () {
      var mywindow = window.open("", "PRINT");
      mywindow.document.write(makepdf.innerHTML);
      mywindow.document.close();
      mywindow.focus();
      mywindow.print();
      mywindow.close();

      return true;
    });
  </script>

  <!-- --------------------Script ------------- -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>