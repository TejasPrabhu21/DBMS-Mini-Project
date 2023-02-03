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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid ms-5">
            <a class="navbar-brand" href="#">COLLEGE BUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-5 mb-lg-0 ">
                <li class="nav-item pe-3 mx-sm-auto">
                    <a class="nav-link active" aria-current="page" href="#routes">Routes</a>
                </li>
                <li class="nav-item dropdown mx-sm-auto pe-md-5">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Login
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="studentlogin.php">Student Login</a></li>
                        <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="adminlogin.php">Admin Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <section class="home mt-5">
        <div class="container-lg px-md-5">
            <div class="row min-vh-90 align-items-centre align-content-centre">
                <div class="image col-md-5 px-md-5">
                    <img src="assets/bus_stop.jpg" class="img-fluid pt-5 mx-auto d-block " alt="Responsive image">
                </div>
                <div class="intro-content col-md-7 pt-md-5 mt-3 order-md-first">
                    <h2>Travel safely to your college</h2>
                    <p>The college has a fleet of buses to transport students and staff from various parts of the city
                        and its neighborhood areas to the college and back home Transport facility will be arranged to
                        every student. Every student is expected to avail the transport facility to enable him/her to be
                        punctual to come to the college. <br>
                        Besides the regular scheduled trips, the facility is extended for occasions like after the
                        college hour Special Coaching classes, Placements and Training, Visit to Local Industries,
                        hospitals, NSS Camps, etc. <br>
                        The college buses are available in the following routes, For more details about college bus,
                        contact the Transport Department </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------map------------------ -->


    <!-- <div class="conatiner-lg mt-5">
        <h1 class="section-title text-center mb-5">Roadmap</h1>
        <img class="mx-auto d-block image max-vh-90 " src="./assets/cec_roadmap.gif" alt="">
    </div>
    <p aria-hidden="true">
        <span class="placeholder col-6"></span>
    </p> -->



    <!-- --------------------routes and timeings------------------- -->

    <div class="continer-lg ms-5 me-5 px-5 mt-5 " id="routes">
        <h1 class="section-title text-center mb-5">Bus Routes</h1>
        <table class="table table-dark table-striped ">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">routeno</th>
                    <th scope="col">route</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('methods/connect.php');

                $none = "0 results";
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
                            "</td><td>" . $row["Start_loc"] . " --> ";
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            echo "" . $row1["Loc"] . " --> ";
                        }
                        echo "" . $row["End_loc"] .
                            "</td></tr>";
                    }
                } else {
                    echo "<tr><td>" . $none . "</td><td></td><td></td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-muted">@College bus management system</span>
            </div>
            <!-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a class="text-muted fs-3" href="#">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-muted fs-3" href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-muted fs-3" href="#">
                        <i class="fa fa-github"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-muted fs-3" href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul> -->
        </footer>
    </div>





    <!-- --------------------Script ------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>