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
    if (isset($_POST['upps'])) {
        $psid = $_POST['passid'];
        $usn = $_POST['usnno'];
        $idate = $_POST['isdate'];
        $vdate = $_POST['valdate'];
        $fees = $_POST['fstatus'];


        echo '<div class="modal-body w-50 h-75 p-5 m-5 mx-auto" style="background-color:#111;color:white;">
        <h3>Update BusPass Details:</h3>
    <form method="post" >
    <div class="row g-3 w-80"> 
      <div class="col-sm-12 form-item">
        <label for="inputpassid" class="form-label">Pass ID</label> 
        <input  type="text" class="contactus form-control" id="inputpassid" value="' . $psid . '" name="pid">
      </div>
      <div class="col-sm-12 form-item">
        <label for="usnno" class="form-label">USN</label> 
        <input  type="text" class="textarea form-control" id="inusno" value="' . $usn . '"
          name="usno">
      </div>
      <div class="col-sm-12 form-item">
        <label for="inputisuuedate" class="form-label">Issued date</label>
        <input  type="date" class="contactus form-control" id="inputisuuedate"
        value="' . $idate . '" name="idate">
      </div>
      <div class="col-sm-12 form-item">
        <label for="inputvaliddate" class="form-label">Valid till</label>
        <input  type="date" class="contactus form-control" id="inputvaliddate"
        value="' . $vdate . '" name="vdate">
      </div>
      <div class="col-sm-12 form-item">
        <label for="inputstatus" class="form-label">Fee status</label>
        <input  type="text" class="contactus form-control" id="inputstatus"
        value="' . $fees . '" name="fs">
      </div>
      </div>
      <div class="modal-footer">
      <a href="../adminhome.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button class="btn btn-secondary" style="background-color:green" name="up1">Save
          changes</button><br>
      </div>
  </form>
    </div>';


    }
    
    if (isset($_POST['up1'])) {
        $pid = $_POST['pid'];
        $usnno = $_POST['usno'];
        $isdate = $_POST['idate'];
        $vldate = $_POST['vdate'];
        $fs = $_POST['fs'];
        
        $query1 = "CALL updatebuspassdata('$pid','$usnno','$isdate','$vldate','$fs')";
        $result10 = mysqli_query($connection, $query1);
    if ($result10) {
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