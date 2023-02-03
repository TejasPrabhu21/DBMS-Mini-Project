<?php
    require_once('../connect.php');

    if(isset($_POST['delete']))
    {
        $id=$_POST['id'];
        $query="delete from NOTIFICATION where id='$id'";
        $result = mysqli_query($conn,$query);
    
        if($result)
        {
            echo '<script> alert("Data Deleted");</script>';
            header("Location: ../../adminhome.php");
        }
        else
        {
            echo '<script> alert("Data not Deleted");</script>';  
        }
    }
?>