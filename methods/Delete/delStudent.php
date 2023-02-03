<?php
require_once('../connect.php');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $busno=$_POST['i'];
    $querry="delete from Student where USN='$id'";
    $result = mysqli_query($conn,$querry);
    $Q="UPDATE BUS set No_of_Students=No_of_Students-1 where Bus_no='$busno'";
    $result1 =  mysqli_query($conn,$Q);


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