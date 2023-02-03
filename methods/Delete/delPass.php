<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'bus');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $querry="delete from Bus_PASS where Pass_id='$id'";
    $result = mysqli_query($connection,$querry);

    if($result)
    {
        echo '<script> alert("Data Deleted");</script>';
        header("Location: ../adminhome.php");
    }
    else
    {
        echo '<script> alert("Data not Deleted");</script>';  

    }
}
?>