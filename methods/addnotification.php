<?php 
    require_once('connect.php');

    if(isset($_POST['post']))
    {
        $notify = $_POST['text'];

        $query = "INSERT INTO NOTIFICATION(text) VALUES ('$notify')";
        $result =  mysqli_query($conn,$query);

        if($result)
        {
            $_SESSION['success'] = "Added successfully";
            header('Location: ../adminhome.php');
        }
        else
        {
            $_SESSION['status'] = "Not Added successfully";
            header('Location: ../adddriver.php');

        }
    }
?>