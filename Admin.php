
<?php 
session_start();
require 'includes/config.php';
$sql=mysql_query("SELECT * FROM Album")
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #000099;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #0000FF;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #0000FF;}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>

<style>
 hr {
    color: #0000FF;
}

p {
    color: #0000FF;
}

table, td, th {
    border: 3px solid blue;
}

table {
    border-collapse:collapse;
    width: 100%;
  
}

td, th {
    height: 50px;
}
body {
  background-image: url("wa.jpg");
  background-repeat: repeat;
    background-size: 1500px 800px;

    

     }
  </style>

 
</head>
<body>

  


<ul>


  <li><a href="Music.php"">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Album</a>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Delete</a>
      </li>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Artist</a>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Delete</a>
      </li>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Genre</a>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Delete</a>
      </li>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Track</a>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Delete</a>
      </li>
      <li><a href="Signup.php" target="_self" style="color: white" >Sign-up</a></li>
      <li><a href="login.php" target="_self" style="color: white" >Log-in</a></li>
      <li><a href="mycart.php" target="_self" style="color: white" >
<img src ="mycart.png" alt= "Add Cart" height="30" width ="30" ></a></li>
   
    </div>
  </li>
</ul>


 


</body>
</html>

