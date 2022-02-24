<?php
   include("config/db.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM rs_users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         echo "error";
         $error = "Your Login Name or Password is invalid";
         $_SESSION["error"] = $error;
      }
         
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <?php include('headers/login_head.php'); ?>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        
        <div class="card my-5 ">

          <form class="card-body cardbody-color p-lg-5 " action="" method="POST">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control " name="username" id="Username" aria-describedby="emailHelp"
                placeholder="Username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                  <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "$error";
                    }
                ?>  
                
          </form>
        </div>

      </div>
    </div>
   </div>
   </body>
   <?php
    unset($_SESSION["error"]);
    ?>
</html>