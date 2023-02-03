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
    if (isset($_POST['updr'])) {
        $drname = $_POST['drname'];
        $drcon = $_POST['drcontact'];
        $drid = $_POST['did'];

        echo '
    <div class="modal-body w-50 h-75 p-5 m-5 mx-auto" style="background-color:#111;color:white;">
    <h3>Update Driver Details:</h3>

    <form method="post">
      <div class="row g-3 w-80">
        <div class="col-sm-12 form-item">
          <label for="inputdrid" class="form-label">Driver ID</label>
          <input readonly class="textarea form-control" id="inputdrid"
            value="' . $drid . '" name="did">
        </div>
        <div class="col-sm-12 form-item">=
          <label for="inputdrname" class="form-label">Driver Name</label>
          <input type="text" class="textarea form-control" id="inputdrname"
            value="' . $drname . '" name="drname">
        </div>
        <div class="col-sm-12 form-item">
          <label for="inputdrcontact" class="form-label">Driver Contact</label>
          <input type="text" class="contactus form-control" id="inputdrcontact"
            value="' . $drcon . '" name="drcontact">
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
        $dname = $_POST['drname'];
        $dcontact = $_POST['drcontact'];
        $did = $_POST['did'];

        $query = "CALL updatedriverdata('$did','$dname','$dcontact')";
        $result = mysqli_query($connection, $query);

        if ($result) {
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