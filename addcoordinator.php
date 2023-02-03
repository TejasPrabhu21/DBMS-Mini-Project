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
    require_once('methods/connect.php');

    if (isset($_POST['addbtn'])) {
        $coid = $_POST['coid'];
        $coname = $_POST['coname'];
        $cocontact = $_POST['cocontact'];

        $query = "INSERT INTO COORDINATOR(Coordinator_id,Coordinator_name,contact) VALUES ('$coid','$coname','$cocontact')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Added successfully";
            echo "<script>window.alert('Successfully Added Coordinator $coid.')</script>";
        } else {
            $_SESSION['status'] = "Not Added successfully";

        }
    }
    ?>

    <!-- -----------------Body------------------------>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('components/sidenavbar.php') ?>

        <!-- Page Content  -->
        <div id="content" class=" container-sm col-md-6 pt-4">
            <h2 class="mb-4">ADD BUS COORDINATOR</h2>
            <hr style="height:2px;border:0;color:gray;background-color:gray;width:100%;">
            <div class=" col-md-8 position-relative start-0">
                <div class="address">
                    <form method="post">
                        <div class="row g-3 ">
                            <div class="col-sm-12 form-item">
                                <label for="inputcoid" class="form-label pe-5">Coordinator ID</label>
                                <input type="text" class="contactus form-control" id="inputcoid"
                                    placeholder="Coordinator ID" name="coid" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputconame" class="form-label">Coordinator Name</label>
                                <input type="text" class="contactus form-control" id="inputconame"
                                    placeholder="Coordiantor Name" name="coname" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputcocontact" class="form-label">Coordiantor Contact</label>
                                <input type="number" class="contactus form-control" id="inputcocontact"
                                    placeholder="Contact" name="cocontact" required>
                            </div>
                            <div class="col-sm-12">
                                <button class="send btn btn-warning" name="addbtn">Add</button><br></br>
                                <a href="adminhome.php"
                                    style="color:#FFC107;border-radius:3px;border:2px solid #FFC107;padding:5px 3px;">See
                                    List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------Script ------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>