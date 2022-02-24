<?php
   include('db.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from rs_users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   $sql = "SELECT api FROM rs_users WHERE username='".$_SESSION['login_user']."'";
    if($result = mysqli_query($db, $sql))
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_array($result);
            $_SESSION['owner_api'] = $row['api'];
        }


if(!isset($_SESSION['login_user'])){
      header("location: /login.php");
      die();
   }
?>