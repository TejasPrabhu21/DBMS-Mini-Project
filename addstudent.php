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

    if (isset($_POST['reg'])) {
        $usn_no = $_POST['usno'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['stopname'];
        $busno = $_POST['busnumber'];
        $password = '12345678';
        $query2="Select * from BUS where Bus_no=$busno";
        $result2 = $conn->query($query2);
        $row = mysqli_fetch_assoc($result2);
        if($row["No_of_Students"]==$row["Capacity"])
        {
	         echo"<script>
		        window.alert('No of students in Bus $busno is full');
	            </script>";
           
        }
        else{
        $query = "INSERT INTO STUDENT(USN,Name,Bus_no,Address,Contact,Gender,Password) VALUES ('$usn_no','$name','$busno','$address','$phone','$gender','$password')";
        $result = mysqli_query($conn, $query);
        // $Q="UPDATE BUS set No_of_Students=No_of_Students+1 where Bus_no='$busno'";
        // $result1 =  mysqli_query($conn,$Q);
    
        if ($result) {
            $_SESSION['success'] = "Added successfully";
            echo "<script>window.alert('Successfully registered student $usn_no.')</script>";
        } else {
            $_SESSION['status'] = "Not Added successfully";
        }
    }
    }
    ?>

    <!-- -----------------Body------------------------>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('components/sidenavbar.php') ?>

        <!-- Page Content  -->
        <div class="container-sm col-md-6 pt-4 box">
            <h2 class="mb-4 ">ADD STUDENT</h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;width:100%;">
            <div class="col-md-12 w-50">
                <div class="address">
                    <form method="post">
                        <div class="row g-3 w-80">
                            <div class="col-sm-12 form-item">
                                <label for="inputusn" class="form-label">USN</label>
                                <input type="text" class="form-control" id="inputusn" placeholder="USN" name="usno"
                                    required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputname" class="form-label">Name</label>
                                <input type="text" class="textarea form-control" id="inputname" placeholder="Name"
                                    name="name" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputgender" class="form-label">Gender</label>
                                <input type="text" class="contactus form-control" id="inputgender" placeholder="Gender"
                                    name="gender" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputphone" class="form-label">Phone</label>
                                <input type="number" class="contactus form-control" id="inputphone" placeholder="Phone"
                                    name="phone" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputstop" class="form-label">Pick up Point</label>
                                <input type="text" class="contactus form-control" id="inputstop" placeholder="Stop Name"
                                    name="stopname" required>
                            </div>
                            <div class="col-sm-12 form-item">
                                <label for="inputbno" class="form-label">Bus no</label>
                                <input type="number" class="contactus form-control" id="inputbno"
                                    placeholder="Bus Number" name="busnumber" required>
                            </div>

                            <div class="col-sm-12">
                                <button class="send btn btn-warning" name="reg">Register</button><br></br>
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