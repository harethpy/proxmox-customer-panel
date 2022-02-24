<?php
include('config/session.php');
if(isset($_SESSION['login_user'])){
      header("location:panel/main.php");
      die();
   }
?>