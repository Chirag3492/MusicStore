<?php 
session_start();
if (!isset($_SESSION['cart'])) {
	header("location:music.php");
}
unset($_SESSION['cart']);

require 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
div.menu {
    background-color: #000099;
    overflow: auto;
    white-space: nowrap;
}

div.menu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.menu a:hover {
    background-color:#0000FF;
	
}


input[type=text] {
    width: 950px;
    height: 10px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color:white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;

 
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

  
<div class="menu">
  <form method="post" action="music.php"> <a href="Music.php" target="_self" style="color: white"> Home</a> 
   <select name="criteria">
  
                   
                    <option value="category">Category Name</option>
                    <option value="album">album</option>
                    <option value="artist">artist</option>
                    <option value="genre">genre</option>
                    <option value="track">track</option>
					</select>
					
                <input type="text" name="search" placeholder="Search">
                <button name="submit" type="submit">Submit</button>

<a href="Signup.php" target="_self" style="color: white" >
Sign-up</a>
<a href="login.php" target="_self" style="color: white" >
Log-in</a>
<a href="mycart.php" target="_self" style="color: white" >
<img src ="mycart.png" alt= "Add Cart" height="30" width ="30" ></a>


</form> 
</div>


<?php            
//Test connection
if(mysqli_connect_errno()){
die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};


if(!isset($_SESSION['cart'])){
			echo "<h2>Thanks for your purchase.</h2>";
		}		



?>


</body>
</html>

