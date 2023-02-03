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
  <link rel="stylesheet" href="css/form.css">

  <title>College bus management</title>
</head>

<body>
  <?php include_once('components/topnavbar.php') ?>
  <?php
  session_start();
  require_once('methods/connect.php');
  ?>

  <div class="d-flex">
    <img class="ps-5" src="assets/adminlogin.jpg" alt="" style="max-height:90vh;">
    <div class="container-sm col-md-6" style="padding-top: 225px;">
      <h1>Admin Login</h1>
      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
      <form class="row g-3 w-50 pt-3" method="POST">
        <div class="col-12 form-item ">
          <label for="inputuname" class="form-label">Username</label>
          <input type="text" class="form-control" id="inputuname" name="uname" required>
        </div>
        <div class="col-12 form-item">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="inputPassword" required>
        </div>

        <?php
        if (isset($_POST['uname']) && isset($_POST['inputPassword'])) {
          $uname = $_POST['uname'];
          $pass = $_POST['inputPassword'];
          if ($uname == "admin" && $pass == "321") {
            $_SESSION['adname'] = "admin";
            header("Location: adminhome.php");
          } else {
            echo "<p style='font-size:1rem;color:red; background-color:#fefae0;padding:15px;border-radius:5px;'>Incorrect Username or Password !!</p>";
          }
        }
        ?>
        
        <div class="col-12 mt-3">
          <button type="submit" name="submitbtn" class="btn btn-warning">Log in</button>
        </div>
      </form>
    </div>
  </div>
  <!-- --------------------Script ------------- -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>