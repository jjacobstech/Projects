<?php
include 'dbconnect.php';

$fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
// error_reporting(0);

if (isset($_POST['login'])) {
    header("location:login.php?");
}

if (isset($_POST['register'])) {
    
    if (!$connection) {
        echo ('<div class="alert alert-danger alert-dismissible fade show" style="text-align:center;" id="alert" role="alert">
        <strong>Unable To Connect </strong></div>');
        //    header("location:registration.php");
     } else {

    if (empty($username) || empty($fullname) || empty($email) ) {
    
        echo '<div class="notifier" id="alert">
                  <div class="alert alert-warning alert-dismissible show fade" style="text-align:center;  role="alert">
                  
                  <strong >All Fields Must Be Filled</strong> </div>
                  </div>';
    }
    
    elseif (empty($password) || empty($confirmpassword)) {
        echo '<div class="notifier" id="alert">
        <div class="alert alert-warning alert-dismissible show fade" style="text-align:center;  role="alert">
        
        <strong >Check Password</strong> </div>
        </div>';


    }
 
      else {
          if ($password !== $confirmpassword) {
            echo '<div class="notifier" id="alert">
            <div class="alert alert-warning alert-dismissible show fade" style="text-align:center;  role="alert">
            
            <strong >Check Password</strong> </div>
            </div>';
        }
         else{
        $password = md5(trim($_POST['password']));
        $confirmpassword = md5(trim($_POST['confirmpassword']));
      
        $query = "INSERT INTO users(fullname,username,email,password) VALUES ('$fullname','$username','$email','$password')";
        // echo "<script>alert('Connected')</script>";
        $sqliQuery = mysqli_query($connection,$query);
        if (!$sqliQuery) {
            die('<div class="notifier" id="alert">
            <div class="alert alert-danger alert-dismissible show fade" style="text-align:center;  role="alert">
            
            <strong >Registration Failed</strong> </div>
            </div>');

        } else {
           $file = $_FILES['file']['name'];
           $fileSize = $_FILES['file']['size'];
           $fileLocation = $_FILES['file']['tmp_name'];
           $fileError = $_FILES['file']['error'];
           $fileext = explode('.',$file);
           $fileExtension = strtolower(end($fileext));
           $allowedFormats = array('png','jpg','jpeg');
           // echo $fileLocation;
           if ($fileError == 0) {
               if (in_array($fileExtension,$allowedFormats)) {
                   $fileName = $username.'.'.$fileExtension;
                  $fileDestination =  "uploads/".$fileName;
                  move_uploaded_file($fileLocation,$fileDestination);
                  echo '<div class="notifier" id="alert">
                  <div class="alert alert-success alert-dismissible show fade" style="text-align:center;  role="alert">
                  <strong >Registered</strong> </div>
                  </div>';
               
               } else {
                   echo '<div class="notifier" id="alert">
                   <div class="alert alert-warning alert-dismissible fade show" style="text-align:center; id="alert" role="alert">
                  
                   <strong >File Type Not Allowed</strong> </div>
                   </div>';
                   }
           } else {
               echo '<div class="notifier" id="alert">
               <div class="alert alert-warning alert-dismissible show fade" style="text-align:center; id="alert" role="alert">
               
               <strong >No File Attached</strong> </div>
               </div>';;
           }
            
        
        }

         }
    }
    
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
    <link rel="stylesheet" href="indexr.css">
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
  <label for="fullname" class="form-label"></label>
  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" value="<?php echo $fullname;?>">
  <label for="username" class="form-label"></label>
  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username;?>">
  <label for="email" class="form-label"></label>
  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email;?>">
  <label for="username" class="form-label"></label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  <label for="confirmpassword" class="form-label"></label>
  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
<div class="container-fluid" >
    <div class="row">
    <div class="col-12" style="width:100%; display:flex; justify-content:center;">
    <input type="file" name="file" style="color:white; border-radius:5px;" class="file mt-4" >
    </div>
    </div>
</div>
 </div>
 
<div class="btn-container mb-1"><button type="submit" name="register" class="btn">Register</button></div>
<h1 class="display-6 " style="text-align:center; color:black;">If you already have an Account</h1>
<div class="btn-container"><button type="submit" name="login" class="btn">Login</button></div>
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
