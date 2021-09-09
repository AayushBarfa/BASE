<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-image:url('../Base/asset/product%20image/back.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;}
    

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
    background: #f1f1f1;
}

/* Set a style for all buttons */
button {
   background-color: #4CAF50;
  color: white;
  padding: 8px 8px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  width: 40%;
  margin-left: 25px;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: 40%;
  padding: 8px 8px;
  background-color: #f44336;
  margin-left: 40px;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
  margin-right: 25px;
}

/* The Modal (background) */
.modal {
   display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
  padding-bottom:  50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}



/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
  padding-bottom:  30px;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 40%;
  }
}


/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.8s;
  animation: animatezoom 0.8s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  
}
</style>
</head>
<body>


  <form id="id01" class="modal-content animate" action="" method="POST">
    <div class="imgcontainer">
      
      <img src="asset/avatar.png" alt="Avatar" class="avatar" height="50%" width="50%">
    </div>

    <div class="container">
      <label for="email"><b>Email</b> <sup style="color: red">*</sup></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b> <sup style="color: red">*</sup></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    
      
    

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="upload">Login</button>
        <button type="button" onclick="window.location.href='header.php'" class="cancelbtn">Cancel</button>
        <span class="psw"> <a href="forgot.php">Forgot password?</a></span>

</div>



  </form>




</body>
</html>


<?php

  if(isset($_POST['upload']))
  {

    $email = $_POST['email'];


    $password = $_POST['psw'];

    $con =mysqli_connect('localhost','root','','base');

    $query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";

    $run = mysqli_query($con,$query);
    
    if($run)
    {
      $row=mysqli_num_rows($run);
      if($row==1)
      {
        $data=mysqli_fetch_assoc($run);
        session_start();
        $_SESSION['first_name'] = $data['first_name'];
          $_SESSION['last_name'] = $data['last_name'];
          $_SESSION['contact_no'] = $data['contact_no'];
          $_SESSION['email'] = $data['email'];
        header('location:index.php');
      }
      else
        echo "<script>alert('Incorrect Detail')</script>";
    }
    else
      echo "<script>alert('error')</script>";
  }

?>