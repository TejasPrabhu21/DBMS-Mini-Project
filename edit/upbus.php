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
    echo "<script> alert('hello);</script>";
    if (isset($_POST['upb'])) {
        $busno = $_POST['busno'];
        $drid = $_POST['did'];
        $cap = $_POST['cap'];
        $coid = $_POST['coid'];
        $rtno = $_POST['rno'];
        $stu = $_POST['stu'];
        echo '<div class="modal-body w-50 p-5 m-5 mx-auto" style="background-color:#111;color:white;">
        <h3>Update Bus Details:</h3>
                        <form method="post" >
                          <div class="row g-3 w-80">
                            <div class="col-sm-12 form-item">
                              <label for="inputbusno" class="form-label">Bus no</label>
                              <input readonly class="textarea form-control" id="inputbusno"
                                value="' . $busno . '" name="busno">
                            </div>
                            <div class="col-sm-12 form-item">
                              <label for="inputdid" class="form-label">Driver ID</label>
                              <input type="number" class="textarea form-control" id="inputdid"
                                value="' . $drid . '" name="did">
                            </div>
                            <div class="col-sm-12 form-item">
                              <label for="inputcoid" class="form-label">Coordinator ID</label>
                              <input type="number" class="textarea form-control" id="inputcoid"
                                value="' . $coid . '" name="coid">
                            </div>
                            <div class="col-sm-12 form-item">
                              <label for="inputrno" class="form-label">Route no</label>
                              <input type="number" class="textarea form-control" id="inputrno"
                                value="' . $rtno . '" name="rno">
                            </div>
                            <div class="col-sm-12 form-item">
                              <label for="inputcap" class="form-label">Capacity</label>
                              <input type="number" class="textarea form-control" id="inputcap"
                                value="' . $cap . '" name="cap">
                            </div>
                            <div class="col-sm-12 form-item">
                              <label for="inputstu" class="form-label">No of Students</label>
                              <input readonly type="number" class="contactus form-control" id="inputstu"
                                value="' . $stu . '" name="stu">
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
        $bno = $_POST['busno'];
        $did = $_POST['did'];
        $cp = $_POST['cap'];
        $cid = $_POST['coid'];
        $rno = $_POST['rno'];
        $st = $_POST['stu'];
        $query1 = "CALL updatebusdata('$bno','$did','$cid','$rno','$cp','$st')";
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
<!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    
                    
                    </div>
                  </div>
                </div> -->