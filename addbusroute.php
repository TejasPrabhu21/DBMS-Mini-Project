<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/form.css">


  <title>College bus management</title>
</head>

<body>

  <?php
  require_once('methods/connect.php');

  if (isset($_POST['addbtn'])) {
    $routeno = $_POST['routeno'];
    $startloc = $_POST['startloc'];
    $endloc = $_POST['endloc'];

    $query = "INSERT INTO ROUTE(Route_no,Start_loc,End_loc) VALUES ('$routeno','$startloc','$endloc')";
    $result = mysqli_query($conn, $query);

    foreach ($_POST['pickuppoint'] as $element) {
      $name = $element;
      $query1 = "INSERT INTO LOCATION (Route_no , Loc) VALUES ('$routeno', '$name')";
      $result1 = $conn->query($query1);
      if (!$result1) {
        die('Error: ' . $conn->error);
      }
    }
    if ($result) {
      $_SESSION['success'] = "Added successfully";
      echo "<script>window.alert('Successfully added new Route $routeno.')</script>";
    } else {
      $_SESSION['status'] = "Not Added successfully";
    }

  }
  ?>

  <!-- -----------------Body------------------------>
  <div class="wrapper d-flex align-items-stretch">
    <?php require_once('components/sidenavbar.php') ?>

    <!-- Page Content  -->
    <div id="content" class="container-sm col-md-6 pt-4">
      <h2 class="mb-4">ADD BUS ROUTE</h2>
      <hr style="height:2px;border:0;color:gray;background-color:gray;width:100%;">
      <div class=" col-md-6 position-relative start-0">
        <div class="address">
          <form method="post">
            <div class="row g-3 w-80">
              <div class="col-sm-12 form-item">
                <label for="inputrrouteno" class="form-label">Route No</label>
                <input type="text" class="contactus form-control" id="inputrouteno" placeholder="Route No"
                  name="routeno" required>
              </div>
              <div class="col-sm-12 form-item">
                <label for="inputstartloc" class="form-label">Starting Point</label>
                <input type="text" class="textarea form-control" id="inputcapacity" placeholder="Start Point"
                  name="startloc" required>
              </div>
              <div class="col-sm-12 form-item">
                <label for="inputendloc" class="form-label">End Location</label>
                <input type="text" class="contactus form-control" id="inputendloc" placeholder="End Point" name="endloc"
                  required>
              </div>
              <!------------ intermediate stops ------------->
              <div class="locations d-block">
                <div class="loc col-sm-12 form-item">
                  <label for="pickuppoint[]" class="form-label">Pick-up point</label>
                  <input type="text" class="contactus form-control" id="pickuppoint" placeholder="pickup point 1"
                    name="pickuppoint[]">
                </div>
              </div>
              <div class="col-md-2 py-3 additembtn btn btn-outline-warning d-grid" style="width:auto;">
                <p style="margin:0;">+</p>
              </div>
            </div>
            <div class="col-sm-12 buttons">
              <button class="send btn btn-warning" name="addbtn">Add</button><br><br>
              <a href="adminhome.php"
                style="color:#FFC107;border-radius:3px;border:2px solid #FFC107;padding:5px 3px;">See List</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- --------------------Script ------------- -->
  <script>
    var i = 2; // Global Variable for Name

    const item = document.querySelector('.locations');
    const additem = document.querySelector('.additembtn');

    function Create() {
      var y = document.createElement("INPUT");
      y.setAttribute("type", "text");
      y.setAttribute("Placeholder", "pickup point " + i);
      y.setAttribute("Name", "pickuppoint[]");
      // y.setAttribute("Name", "pickuppoint" + i);
      y.classList.add("form-control");
      y.style.margin = '20px 0 0 auto';
      y.style.width = '270px';
      item.appendChild(y);

      i++;
    }
    additem.addEventListener('click', function () {
      Create();
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
<!-- <script>
    var i = 2; // Global Variable for Name

    const item = document.querySelector('.locations');
    const additem = document.querySelector('.additembtn');

    function Create(){
      var y = document.createElement("INPUT");
      y.setAttribute("type", "text");
      y.setAttribute("Placeholder", "pickup point " + i);
      y.setAttribute("Name", "pickuppoint[]");
      // y.setAttribute("Name", "pickuppoint" + i);
      y.classList.add("form-control");
      y.style.margin = '20px 0 0 auto';
      y.style.width = '270px';
      item.appendChild(y);

      i++;
    }
    additem.addEventListener('click',function(){
      Create();
    });
  </script>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>
</html> -->