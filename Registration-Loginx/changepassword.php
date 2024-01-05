<?php
include 'dbconnect.php';

$username = trim($_POST['username']);
$email = trim($_POST['registered-email']);
$newPassword = md5(trim($_POST['new-password']));
$confirmNewPassword = md5(trim($_POST['confirm-new-password']));
if (isset($_POST['login'])) {
  header("location:login.php");
}
if (isset($_POST['register'])) {
  header("location:registration.php");
}
if (isset($_POST['changepassword'])) {
if (!empty($username)) {
   if (!empty($email)) {
    if ($connection) {
        $query = "SELECT * FROM users WHERE username='$username' and email='$email'";
       $sqlQuery =  mysqli_query($connection,$query);
       if ($sqlQuery) {
         $request = mysqli_fetch_assoc($sqlQuery);
        //  print_r($request);
         if (array_search($username,$request) &&
         array_search($email,$request)) {
          if (!empty($newPassword) && !empty($confirmNewPassword)) {
            if ($newPassword  === $confirmNewPassword) {
                $passwdquery = "UPDATE users SET password='$newPassword' WHERE username='$username' and email='$email'";
                $sqlQuery =  mysqli_query($connection,$passwdquery);
                if ($sqlQuery) {
                   echo
                   '<div style="text-align:center; " class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
       
        <strong>Password Changed </strong>
      </div>';
                } else {
                    echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                   
                    <strong>ERROR!</strong>
                  </div>';
                }
                
            } else {
                echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
       
        <strong>Passwords Do not Match </strong>
      </div>';
            }
          } else {
             echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            
             <strong>Passwords Cannot Be Empty</strong>
           </div>';
          }
          
           
            
         } else {
            echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
           
            <strong>User Does Not Exist </strong>
          </div>';
         }
         
       } else {
        echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
       
        <strong>Connection Error!</strong>
      </div>';
       }
       
    
     } else {
        echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        
        <strong>Connection Error! </strong>
      </div>';
     }
   } else {
     echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
    
     <strong>Email Cannot Be Empty </strong>
   </div>';
   }
   
} else {
   echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
  
   <strong>Username Cannot Be Empty</strong>
 </div>';
}

 
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xspace</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist\bootstrap-5.2.0-beta1-dist\css\bootstrap.css">

</head>
<body>

    <div class="container-sm">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="username" class="form-label"></label>
  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username?>">
  <label for="email" class="form-label"></label>
  <input type="text" class="form-control" name="registered-email" id="password" placeholder="Registered Email"  value="<?php echo $email?>">
  <label for="new-password" class="form-label"></label>
  <input type="password" class="form-control" name="new-password" id="newpassword" placeholder="New Password"  value="">
  <label for="confirm-new-password" class="form-label"></label>
  <input type="password" class="form-control" name="confirm-new-password" id="password" placeholder="Confirm New Password"  value="">
 </div>
 
<div class="btn-container"><button type="submit" name="changepassword" class="btn">Change Password</button></div>
<div class="btn-container mt-5"><button type="submit" name="login" class="btn">Login</button></div>
<div class="btn-container mt-5"><button type="submit" name="register" class="btn">Register</button></div>


</div>
</form>
               
            </div>
        </div>
    </div>
</div>
    </div>
    <script src="bootstrap-5.2.0-beta1-dist\bootstrap-5.2.0-beta1-dist\js\bootstrap.js"></script>
    <script src="jquery-3.6.0.js"></script>
    <script src="index.js"></script>
</body>
</html>