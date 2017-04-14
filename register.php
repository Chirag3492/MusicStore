<?php
  session_start();
		
   $db = mysqli_connect("localhost","root","root","chinook");
  
   if(isset($_POST['submit_btn'])){
      session_start();
      $fname = mysql_real_escape_string($_POST['name']);
      $lname = mysql_real_escape_string($_POST['lname']);
      $email = mysql_real_escape_string($_POST['email']);
      $password = mysql_real_escape_string($_POST['password']);
      $passwordconfirm = mysql_real_escape_string($_POST['password']);

      if($password == $passwordconfirm){

       
         $sql="INSERT INTO logins(fname,lname,email,password) VALUES ('$fname','$lname','$email','$password');";
         mysqli_query($db,$sql); 

         $_SESSION['message'] = "You are now logged in";
         $_SESSION['email'] = $email;
         header("location: login.php");
    } else{
        $_SESSION['message'] = "The two passwords do not match" ;
   }
  } 

?>