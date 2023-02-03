<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">

    <title>College bus management</title>
</head>

<body>

    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'bus');
    if (isset($_POST['upstu'])) {

        $usn = $_POST['usnno'];
        $nam = $_POST['name'];
        $bno = $_POST['busno'];
        $adrs = $_POST['ads'];
        $cont = $_POST['con'];
        $gen = $_POST['gender'];
        $pwd = $_POST['pword'];
        echo '
    <div class="modal-body w-50 h-75 p-5 m-5 mx-auto" style="background-color:#111;color:white;">
    <h3>Update Student Details:</h3>
    <form method="post">
      <div class="row g-3 w-80">
        <div class="col-sm-12 form-item">
          <label for="inputusn" class="form-label">USN</label>
          <input readonly class="textarea form-control" id="inputusn" value="' . $usn . '"
            name="usnno">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputname" class="form-label">Name</label>
          <input type="text" class="textarea form-control" id="inputname"
            value="' . $nam . '" name="name">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputbusno" class="form-label">Bus_no</label>
          <input type="number" class="textarea form-control" id="inputbusno"
            value="' . $bno . '" name="busno">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputads" class="form-label">Address</label>
          <input type="text" class="textarea form-control" id="inputads"
            value="' . $adrs . '" name="ads">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputg" class="form-label">Gender</label>
          <input type="text" class="textarea form-control" id="inputg"
            value="' . $gen . '" name="gender">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputpword" class="form-label">Password</label>
          <input type="text" class="textarea form-control" id="inputpword"
            value="' . $pwd . '" name="pword">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputcon" class="form-label">Contact</label>
          <input type="text" class="contactus form-control" id="inputcon"
            value="' . $cont . '" name="con">
        </div>
      </div>

      <div class="modal-footer">
      <a href="../adminhome.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button class="btn btn-secondary" style="background-color:green" name="up">Save
          changes</button><br>
      </div>
    </form>
  </div>
    ';



    }
    if (isset($_POST['up'])) {
        $usnno = $_POST['usnno'];
        $name = $_POST['name'];
        $busno = $_POST['busno'];
        $ads = $_POST['ads'];
        $con = $_POST['con'];
        $gender = $_POST['gender'];
        $pword = $_POST['pword'];

        $query1 = "CALL updatestudentdata('$usnno','$name','$busno','$ads','$con','$gender','$pword')";
        $result1 = mysqli_query($connection, $query1);

        if ($result1) {
            $_SESSION['success'] = "Updated successfully";
            header("Location: ../adminhome.php");
        } else {
            $_SESSION['status'] = "Not Updated successfully";

        }
    }
    ?>
    <!-- --------------------Script ------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>