<?php
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection,'bus');
require_once('../connect.php');
if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $query="delete from DRIVER where Driver_id='$id'";
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