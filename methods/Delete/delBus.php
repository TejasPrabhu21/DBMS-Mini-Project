<?php
require_once('../connect.php');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $querry="delete from BUS where Bus_no='$id'";
    $result = mysqli_query($conn,$querry);

    if($result)
    {
        header("Location: ../../adminhome.php");
        echo '<script> alert("Data Deleted");</script>';
    }
    else
    {
        echo '<script> alert("Data not Deleted");</script>';  

    }
}
?>