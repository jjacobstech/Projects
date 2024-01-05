<?php
include 'dbconnect.php';



$username =trim( $_POST['username']);
$password = md5(trim($_POST['password']));

if (isset($_POST['register'])) {
    header("location:registration.php?");
}
if (isset($_POST['forgotpassword'])) {
    header("location:changepassword.php?");
}


if (isset($_POST['login'])) {
    session_start();
    $_SESSION['username'] = $username;


    if (empty($password)||empty($username)) {
        echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
       
        <strong>Fill All Fields </strong>
      </div>';
    }
    else {
        if (!$connection) {
       
            echo '<div style="text-align:center; " class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
           
            <strong>Unable To Connect </strong>
          </div>';
         
         } else {
           
             $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
             $sqlquery = mysqli_query($connection,$query);
             if (!$sqlquery) {
                 echo '<div style="text-align:center; " class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
              
                 <strong>User Does Not Exist </strong>
               </div>';
             } else {
               
              $userRequest = mysqli_fetch_assoc($sqlquery);
             //  print_r($userRequest);
              if (array_search($username,$userRequest)&&
              array_search($password,$userRequest)) {
                     echo '<div style="text-align:center; " class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                 
                     <strong>Logging In </strong>
                   </div>';   
                   header("location:user.php?");   
              }
              else {
                 echo '<div style="text-align:center; " class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                
                 <strong>Check Username And Password</strong>
               </div>';
              }
     
             }
             
         }
    }

   
}

if (isset($_POST['logout'])) {
    echo '<div class="notifier" id="alert">
    <div class="alert alert-success alert-dismissible show fade" style="text-align:center;  role="alert">
    
    <strong >Logged Out</strong> </div>
    </div>';
  session_destroy();
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
  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username;?>">
  <label for="password" class="form-label"></label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Password"  value="">
 </div>
 
<div class="btn-container"><button type="submit" name="login" class="btn">Login</button></div>
<h1 class="display-6 " style="text-align:center; color:black;">If you already have an Account</h1>
<div class="btn-container"><button type="submit" name="register" class="btn">Register</button></div>
<div class="btn-container"><button type="submit" name="forgotpassword" class="btn">Forgot Password</button></div>
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