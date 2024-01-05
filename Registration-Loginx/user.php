<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php?");
}
else {
   $user = $_SESSION['username'];
//    echo $userDp;
    if (file_exists('uploads/'.$user.'.jpg')) {
        echo '<img src="uploads/'.$user.'.jpg" style="width:100px; height:100px;" alt="" srcset="">';
    }
    elseif (file_exists('uploads/'.$user.'.jpeg')) {
        echo '<img src="uploads/'.$user.'.jpeg" style="width:100px; height:100px;" alt="" srcset="">';
    }
        elseif (file_exists('uploads/'.$user.'.png')) {
            echo '<img src="uploads/'.$user.'.png" style="width:100px; height:100px;" alt="" srcset="">';
        }
 else {
    echo '<img src="" style="width:100px; height:100px;" alt="NO DISPLAY PICTURE" srcset="">';
}

    echo "Welcome ".$_SESSION['username'];
  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
<img src="<" alt="" srcset="">
<form action="login.php" method="post" enctype="multipart/form-data">
<button name="logout" class="btn btn-primary" type="submit">Logout</button>
</form>
<!-- <script>document.querySelector('title').textContent = "Hello";</script> -->
</body>
</html>