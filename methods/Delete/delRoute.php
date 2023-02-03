<?php
require_once('../connect.php');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $rtno=$_POST['i'];
    $Q="delete from location where Route_no='$id'";
    $result1 =  mysqli_query($conn,$Q);
    $query="delete from ROUTE where Route_no='$id'";
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