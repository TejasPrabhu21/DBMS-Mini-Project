<?php
  $db_hostname = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "user";

  $conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
  if(!$conn){
      echo "Connection failed: ".mysqli_connect_error();
      exit;
  }

  echo "Hello";
  if(isset($_POST['regbtn']))
  {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      echo "Hello";
      $query = "INSERT INTO users(firstName,lastName,email,password)VALUES ('$firstname','$lastname','$email','$password')";

      $query_run  = mysqli_query($conn,$query);

      if($query_run)
      {
        $_SESSION['success'] = "Registered successfully";
        header('Location: login.php');
      }
      else
      {
        $_SESSION['status'] = "Not Registered successfully";
        header('Location: register.php');
      }
  }

?>