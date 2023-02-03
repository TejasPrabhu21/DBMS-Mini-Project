<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/form.css">

  <title>College Bus Management</title>
</head>

<body>
  <div class=" d-flex ">
    <?php require_once('components/sidenavbar.php') ?>

    <!-- Page Content  -->
    <div id="content" class="w-100" style="background-color: #fff;">
      <!-- --------------------scrollspy--------------------------- -->
      <nav id="navbar" class="navbar bg-dark pt-3 px-4 py-0  sticky-top">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <ul class="nav nav-tabs ">
          <li class="nav-item">
            <a class="nav-link px-5 active" id="linktab1" aria-current="page" href="#bustable"
              style="color: gray;">Bus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5" id="linktab2" href="#routetable"><span class="links"
                style="color: gray;">Routes</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5" id="linktab3" href="#studenttable" style="color: gray;">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5" id="linktab4" href="#coordinatortable" style="color: gray;">Coordinators</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-5" id="linktab5" href="#drivertable" style="color: gray;">Driver</a>
          </li>
        </ul>
      </nav>

      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" class="scrollspy-example bg-light  rounded-2" tabindex="0"></div>
      <!-- <h2 class="mb-4">ADMIN HOME PAGE</h2> -->
      <?php
      session_start();
      require_once('methods/connect.php');
      $none = "0 results";
      if ($_SESSION['adname'] == null) {
        header('Location:index.php');
      }
      ?>
      <!-- -----------------notifications---------- -->
      <div class="container-sm card mt-5 mx-3 pt-3 bg-dark" style="background-color: #edf6f9;width:95%;">
        <div class="text-center">
          <h3 style='color:white;'>Notificatiions!!</h3>
        </div>
        <div class="card">
          <table class="table table-light table-striped ">
            <thead>
              <th scope="col">Date</th>
              <th scope="col">Notification</th>
              <th scope="col">Delete</th>
            </thead>
            <tbody>
              <?php
              $query = "select * from NOTIFICATION order by date desc";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                while ($row0 = mysqli_fetch_assoc($result)) {
                  //notification table 
                  echo "<tr><td>" . $row0["date"];
                  echo "<td>" . $row0["text"] . "</td>";
                  ?>
                  <td>
                    <form action="methods/Delete/delnotification.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row0['id']; ?>">
                      <button type="submit" name="delete" class='btn'><i class='fa fa-trash'
                          aria-hidden='true'></i></button>
                    </form>
                  </td>
                  <?php
                }
              } else {
                echo "<tr><td>" . $none . "<td></td><td></td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="pt-3">
          <form action="methods/addnotification.php" method="post">
            <div class="col-sm-10 form-item d-flex flex-column">
              <label for="inputnot" class="form-label">Enter text:</label>
              <textarea rows="1" type="text" class="form-control" id="inputnot"
                placeholder="e.g:Buses will leave campus at 4:45 pm. " name="text" required></textarea>
            </div>
            <div class="pt-2">
              <button class="send btn btn-warning" name="post">Post</button><br></br>
            </div>
          </form>
        </div>
      </div>

      <!-- -----------BUS TABLE------------ -->
      <hr>
      <div class="head d-flex justify-content-sm-between pt-6 mb-3">
        <h4 class="pt-4 ps-4" id="bustable">Bus Entries</h4>
        <a href="addbus.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> Add Bus</button></a>
      </div>
      <div class="continer-lg mx-5 ">
        <table class="table table-light table-striped ">
          <thead>
            <tr>
              <th scope="col">Bus no</th>
              <th scope="col">Driver id</th>
              <th scope="col">Coordinator</th>
              <th scope="col">Route no</th>
              <th scope="col">Capacity</th>
              <th scope="col">No of students</th>
              <th scope="col">Edit</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // require_once('methods/connect.php');
            $query = "select * from BUS";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
              // OUTPUT DATA OF EACH ROW
              while ($row3 = mysqli_fetch_assoc($result)) {
                //Route Location join-table 
                echo "<tr><td>" . $row3["Bus_no"];
                echo "<td>" . $row3["Driver_id"] . "</td>";
                echo "<td>" . $row3["Coordinator_id"] . "</td>";
                echo "<td>" . $row3["Route_no"] . "</td>";
                echo "<td>" . $row3["Capacity"] . "</td>";
                echo "<td>" . $row3["No_of_Students"] . "</td>";
                ?>
                <td>
                  <form method="post" action="edit/upbus.php">
                    <div class="col-sm-12 form-item">
                      <input type="hidden" readonly class="textarea form-control" id="inputbusno"
                        value="<?php echo $row3["Bus_no"] ?>" name="busno">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="number" class="textarea form-control" id="inputdid"
                        value="<?php echo $row3["Driver_id"] ?>" name="did">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="number" class="textarea form-control" id="inputcoid"
                        value="<?php echo $row3["Coordinator_id"] ?>" name="coid">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="number" class="textarea form-control" id="inputrno"
                        value="<?php echo $row3["Route_no"] ?>" name="rno">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="number" class="textarea form-control" id="inputcap"
                        value="<?php echo $row3["Capacity"] ?>" name="cap">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input readonly type="hidden" type="number" class="contactus form-control" id="inputstu"
                        value="<?php echo $row3["No_of_Students"] ?>" name="stu">
                    </div>
                    <button class="btn btn-secondary" style="background-color:green" name="upb"><i class='fa fa-edit'
                        aria-hidden='true'></i></button><br>
                  </form>
                </td>

                <td>
                  <form action="methods/Delete/delBus.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row3['Bus_no'] ?>">
                    <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                  </form>
                </td>
                <?php
                echo "</tr>";
              }
            } else {
              echo "<tr><td>" . $none . "<td></td><td></td><td></td><td></td></td><td></td><td></td></tr>";
            }
            // $conn->close();
            ?>
          </tbody>
        </table>
      </div>

      <!-- --------------STUDENT TABLE------------- -->
      <hr>
      <div class="head d-flex justify-content-sm-between mt-6 mb-3">
        <h4 class="pt-4 ps-4" id="studenttable">Student Entries</h4>
        <a href="addstudent.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> Add
            Student</button></a>
      </div>
      <div class="continer-lg mx-5 ">
        <table class="table table-light table-striped ">
          <thead>
            <tr>
              <th scope="col">USN</th>
              <th scope="col">Name</th>
              <th scope="col">Bus no</th>
              <th scope="col">Address</th>
              <th scope="col">Contact</th>
              <th scope="col">Gender</th>
              <th scope="col">password</th>
              <!-- <th scope="col">BusPass</th> -->
              <th scope="col">Edit</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // require_once('methods/connect.php');
            $query1 = "select * from STUDENT";
            $result1 = $conn->query($query1);
            if ($result1->num_rows > 0) {
              // OUTPUT DATA OF EACH ROW
              while ($row4 = mysqli_fetch_assoc($result1)) {
                //Route Location join-table 
                echo "<tr><td>" . $row4["USN"];
                echo "<td>" . $row4["Name"] . "</td>";
                echo "<td>" . $row4["Bus_no"] . "</td>";
                echo "<td>" . $row4["Address"] . "</td>";
                echo "<td>" . $row4["Contact"] . "</td>";
                echo "<td>" . $row4["Gender"] . "</td>";
                echo "<td>" . $row4["Password"] . "</td>";
                ?>
                <td>
                  <form method="post" action="edit/upstudent.php">
                    <!-- <div class="row g-3 w-80"> -->
                    <div class="col-sm-12 form-item">
                      <input type="hidden" readonly class="textarea form-control" id="inputusn"
                        value="<?php echo $row4["USN"] ?>" name="usnno">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="text" class="textarea form-control" id="inputname"
                        value="<?php echo $row4["Name"] ?>" name="name">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="number" class="textarea form-control" id="inputbusno"
                        value="<?php echo $row4["Bus_no"] ?>" name="busno">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="text" class="textarea form-control" id="inputads"
                        value="<?php echo $row4["Address"] ?>" name="ads">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="text" class="textarea form-control" id="inputg"
                        value="<?php echo $row4["Gender"] ?>" name="gender">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="text" class="textarea form-control" id="inputpword"
                        value="<?php echo $row4["Password"] ?>" name="pword">
                    </div>
                    <div class="col-sm-12 form-item">
                      <input type="hidden" type="text" class="contactus form-control" id="inputcon"
                        value="<?php echo $row4["Contact"] ?>" name="con">
                    </div>
                    <button class="btn btn-secondary" style="background-color:green" name="upstu"><i class='fa fa-edit'
                        aria-hidden='true'></i></button><br>
                  </form>
                </td>

                <td>
                  <form action="methods/Delete/delStudent.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row4['USN'] ?>">
                    <input type="hidden" name="i" value="<?php echo $row4['Bus_no'] ?>">
                    <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                  </form>
                </td>
          </div>

          <?php
          echo "</td></tr>";
              }
            } else {
              echo "<tr><td>" . $none . "<td></td><td></td><td></td><td></td><td></td></td><td></td><td></td></tr>";
            }
            // $conn->close();
            ?>
      </tbody>
      </table>
    </div>
    <!----------- COORDINATOR TABLE ------------>
    <hr>
    <div class="head d-flex justify-content-sm-between mt-6 mb-3">
      <h4 class="pt-4 ps-4" id="coordinatortable">Coordinator Entries</h4>
      <a href="addcoordinator.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> Add
          Coordinator</button></a>
    </div>
    <div class="continer-lg mx-5 ">
      <table class="table table-light table-striped ">
        <thead>
          <tr>
            <th scope="col">Coordinator ID</th>
            <th scope="col">Coordinator name</th>
            <th scope="col">Contact</th>
            <th scope="col">Edit</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // require_once('methods/connect.php');
          $query = "select * from COORDINATOR";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
            // OUTPUT DATA OF EACH ROW
            while ($row2 = mysqli_fetch_assoc($result)) {
              //Route Location join-table 
              echo "<tr><td>" . $row2["Coordinator_id"];
              echo "<td>" . $row2["Coordinator_name"] . "</td>";
              echo "<td>" . $row2["contact"] . "</td>";
              ?>
              <td>
                <form method="post" action="edit/upcoordinator.php">
                  <div class="col-sm-12 form-item">
                    <input type="hidden" readonly class="textarea form-control" id="inputcoid"
                      value="<?php echo $row2["Coordinator_id"] ?>" name="cid">
                  </div>
                  <div class="col-sm-12 form-item">
                    <input type="hidden" type="text" class="textarea form-control" id="inputconame"
                      value="<?php echo $row2["Coordinator_name"] ?>" name="coname">
                  </div>
                  <div class="col-sm-12 form-item">
                    <input type="hidden" type="text" class="contactus form-control" id="inputcocontact"
                      value="<?php echo $row2["contact"] ?>" name="cocontact">
                  </div>
                  <button class="btn btn-secondary" style="background-color:green" name="upco"><i class='fa fa-edit'
                      aria-hidden='true'></i></button><br>
                </form>
              </td>

              <td>
                <form action="methods/Delete/delCoor.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row2['Coordinator_id'] ?>">
                  <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
              </td>
              <?php
              echo "</td></tr>";
            }
          } else {
            echo "<tr><td>" . $none . "</td><td></td><td></td><td></td></tr>";
          }
          // $conn->close();
          ?>
        </tbody>
      </table>
    </div>
    <!----------- DRIVER TABLE ------------>
    <hr>
    <div class="head d-flex justify-content-sm-between mt-6 mb-3">
      <h4 class="pt-4 ps-4" id="drivertable">Driver Entries</h4>
      <a href="adddriver.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> Add Driver</button></a>
    </div>
    <div class="continer-lg mx-5" id="drivertable">
      <table class="table table-light table-striped ">
        <thead>
          <tr>
            <th scope="col">Driver ID</th>
            <th scope="col">Driver name</th>
            <th scope="col">Contact</th>
            <th scope="col">Edit</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "select * from DRIVER";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
            // OUTPUT DATA OF EACH ROW
            while ($row = mysqli_fetch_assoc($result)) {
              //Route Location join-table 
              $x = $row["Driver_id"];
              echo "<tr><td>" . $row["Driver_id"];
              echo "<td>" . $row["Driver_name"] . "</td>";
              echo "<td>" . $row["Driver_contact"] . "</td>
                    <td>";
              ?>
              <form method="post" action="edit/updriver.php">
                <div class="col-sm-12 form-item">
                  <input type="hidden" readonly class="textarea form-control" id="inputdrid"
                    value="<?php echo $row["Driver_id"] ?>" name="did">
                </div>
                <div class="col-sm-12 form-item">
                  <input type="hidden" type="text" class="textarea form-control" id="inputdrname"
                    value="<?php echo $row["Driver_name"] ?>" name="drname">
                </div>
                <div class="col-sm-12 form-item">
                  <input type="hidden" type="text" class="contactus form-control" id="inputdrcontact"
                    value="<?php echo $row["Driver_contact"] ?>" name="drcontact">
                </div>
                <button class="btn btn-secondary" style="background-color:green" name="updr"><i class='fa fa-edit'
                    aria-hidden='true'></i></button><br>
              </form>
              </td>

              <td>
                <form action="methods/Delete/delDriver.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['Driver_id'] ?>">
                  <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
              </td>
              <?php
              echo "</tr>";
            }
          } else {
            echo "<tr><td>" . $none . "</td><td></td><td></td><td></td><td></td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!------------- Bus pass Entries--------------->
    <hr>
    <div class="head d-flex justify-content-sm-between mt-6 mb-3">
      <h4 class="pt-4 ps-4" id="coordinatortable">BussPass Entries</h4>
      <a href="addbuspass.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> AddBus Pass</button></a>
    </div>

    <div class="continer-lg mx-5 ">
      <table class="table table-light table-striped ">
        <thead>
          <tr>
            <th scope="col">Pass ID</th>
            <th scope="col">USN</th>
            <th scope="col">Issued date</th>
            <th scope="col">Valid till</th>
            <th scope="col">Fee status</th>
            <th scope="col"> Edit</th>
            <th colspan="10">Remove</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $db_hostname = "localhost";
          $db_username = "root";
          $db_password = "";
          $db_name = "bus";
          $none = "0 results";

          $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
          if (!$conn) {
            echo "Connection failed: " . mysqli_connect_error();
            exit;
          }

          $query1 = "select * from BUS_PASS";

          $result1 = $conn->query($query1);
          if ($result1->num_rows > 0) {

            // OUTPUT DATA OF EACH ROW
            while ($row = mysqli_fetch_assoc($result1)) {
              //Route Location join-table 
          

              echo "<tr><td>" . $row["Pass_id"];
              echo "<td>" . $row["USN"] . "</td>";
              echo "<td>" . $row["Issued_date"] . "</td>";
              echo "<td>" . $row["Valid_till"] . "</td>";
              echo "<td>" . $row["Fee_status"] . "</td>";
              ?>
              <td>
                <div class=" col-md-6 position-relative start-0">
                  <div class="address">
                    <form method="post" action="edit/upbuspass.php">
                      <div class="col-sm-12 form-item">
                        <input type="hidden" type="text" class="contactus form-control" id="inputpassid"
                          value='<?php echo $row["Pass_id"] ?>' name="passid">
                      </div>
                      <div class="col-sm-12 form-item">
                        <input type="hidden" type="text" class="textarea form-control" id="usnno" placeholder="USN"
                          value='<?php echo $row["USN"] ?>' name="usnno">
                      </div>
                      <div class="col-sm-12 form-item">
                        <input type="hidden" type="date" class="contactus form-control" id="inputisuuedate"
                          value='<?php echo $row["Issued_date"] ?>' placeholder="Issued date" name="isdate">
                      </div>
                      <div class="col-sm-12 form-item">
                        <input type="hidden" type="date" class="contactus form-control" id="inputvaliddate"
                          value='<?php echo $row["Valid_till"] ?>' placeholder="Valid till" name="valdate">
                      </div>
                      <div class="col-sm-12 form-item">
                        <input type="hidden" type="text" class="contactus form-control" id="inputstatus"
                          value='<?php echo $row["Fee_status"] ?>' placeholder="Fee status" name="fstatus">
                      </div>
                      <button class="btn btn-secondary" style="background-color:green" name="upps"><i class='fa fa-edit'
                          aria-hidden='true'></i></button><br>
                    </form>
                  </div>
              </td>
              <td>
                <form action="methods/Delete/delPass.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['Pass_id'] ?>">
                  <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
              </td>
              <?php
              echo "</td></tr>";
            }
          } else {
            echo "<tr><td>" . $none . "<td></td><td></td><td></td><td></td></td><td></td><td></td></tr>";
          }
          $query2 = "select * from Student";
          $result2= $conn->query($query2);
          $result1 = $conn->query($query1);
          if ($result1->num_rows != $result2->num_rows ){
            echo '<div class="alert alert-danger" role="alert">
                       Still Entries of other student is pending!!!!!
                  </div>';
          }
          // $conn->close();
          ?>
        </tbody>
      </table>
    </div>

    <!-- ----------------------------bus route----------------------- -->
    <hr>
    <div class="head d-flex justify-content-sm-between mt-6 mb-3">
      <h4 class="pt-4 ps-4" id="routetable">Route Entries</h4>
      <a href="addbusroute.php"><button type="button" class="btn btn-warning me-5 mt-4"><b>+</b> Add Route</button></a>
    </div>
    <div class="continer-lg mx-5 ">
      <table class="table table-light table-striped ">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">routeno</th>
            <th scope="col">route</th>
            <!-- <th scope="col">Edit</th> -->
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // require_once('methods/connect.php');
          // $none="0 results";
          $query = "select * from `ROUTE`";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
            // OUTPUT DATA OF EACH ROW
            while ($row = mysqli_fetch_assoc($result)) {
              //Route Location join-table 
              $x = $row["Route_no"];
              $query1 = "select * from `LOCATION` l where l.Route_no=$x";
              $result1 = $conn->query($query1);
              echo "<tr><td>" . $row["Route_no"] .
                "</td><td>" . $row["Start_loc"] . " -- ";
              while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "" . $row1["Loc"] . " -- ";
              }
              echo "" . $row["End_loc"] .
                "</td>";
              ?>
              <td>
                <form action="methods/Delete/delRoute.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['Route_no'] ?>">
                  <button type="submit" name="delete" class='btn'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
              </td>
              <?php
              echo "</tr>";
            }
          } else {
            echo "<tr><td>" . $none . "</td><td></td><td></td></tr>";
          }
          // $conn->close();
          ?>
        </tbody>
      </table>
    </div>
    <div>
    </div>
  </div>
  <?php $conn->close(); ?>
  </div>
  </div>

  <!-- ------------Script------------- -->
  <script>
    const linktab1 = document.getElementById('linktab1');
    const linktab2 = document.getElementById('linktab2');
    const linktab3 = document.getElementById('linktab3');
    const linktab4 = document.getElementById('linktab4');
    const linktab5 = document.getElementById('linktab5');
    linktab1.addEventListener('click', function () {
      linktab1.classList.add('active');
      linktab2.classList.remove('active');
      linktab3.classList.remove('active');
      linktab4.classList.remove('active');
      linktab5.classList.remove('active');
    })
    linktab2.addEventListener('click', function () {
      linktab1.classList.remove('active');
      linktab2.classList.add('active');
      linktab3.classList.remove('active');
      linktab4.classList.remove('active');
      linktab5.classList.remove('active');
    })
    linktab3.addEventListener('click', function () {
      linktab1.classList.remove('active');
      linktab2.classList.remove('active');
      linktab3.classList.add('active');
      linktab4.classList.remove('active');
      linktab5.classList.remove('active');
    })
    linktab4.addEventListener('click', function () {
      linktab1.classList.remove('active');
      linktab2.classList.remove('active');
      linktab3.classList.remove('active');
      linktab4.classList.add('active');
      linktab5.classList.remove('active');
    })
    linktab5.addEventListener('click', function () {
      linktab1.classList.remove('active');
      linktab2.classList.remove('active');
      linktab3.classList.remove('active');
      linktab4.classList.remove('active');
      linktab5.classList.add('active');
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>