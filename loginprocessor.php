<?php
include('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select username from users where email='$email' && password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
  if($count){
      $find="select * from users where email='$email'";
      $retrieve = mysqli_query($conn, $find);
      $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);

      foreach ($users as $user) {
          $uid = $user['id'];
          $role = $user['role'];
          $username = $user['username'];
      }
      if ($role == 0) {
          //the password was correct
          session_start();
          $_SESSION['uid'] = $uid;
//          $_SESSION['status'] = 'welcome back';
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['role'] = $role;
          header("location:usersdashboard.php");

      }
      else{
          session_start();
          $_SESSION['uid'] = $uid;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['role'] = $role;
          header("location:admindashboard.php");
      }
  }

    else {
        session_start();
        $_SESSION['status'] = "The credentials does not match";

        header("Location:login.php");

    }

}


    ?>