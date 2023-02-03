<?php
require_once('../connect.php');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $querry="delete from COORDINATOR where Coordinator_id='$id'";
    $result = mysqli_query($conn,$querry);

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