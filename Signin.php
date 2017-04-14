<?php
  $email= $_POST['usrnm'];
  $password= $_POST['pswrd'];

  $email=stripcslashes($email);
   $password=stripcslashes($password);
  $email=mysql_real_escape_string($email);
  $password=mysql_real_escape_string($password);

  mysql_connect("localhost","root","root");
  mysql_select_db("chinook");

  $result=mysql_query("select * from logins where email ='$email' and password='$password'")
                or die("Failed to query database".mysql_error());
  $row=mysql_fetch_array($result);
  if($row['email']== 'chiragshah3492@gmail.com' && $row['password']== 'Stardust'){
 header("location: Emp.php");
} 
else if($row['email']== $email && $row['password']== $password){
 header("location: Music.php");
}
else{
  echo"Failed to login!";
}
?>