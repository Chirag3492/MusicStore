<?php
  session_start();
		
   $db = mysqli_connect("localhost","root","root","chinook");
  
   if(isset($_POST['submit_btn'])){
      session_start();
      $id = mysql_real_escape_string($_POST['id']);
      $Album = mysql_real_escape_string($_POST['Album']);
      
      if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
  
       
         $sql="INSERT INTO album(Albumid,Title) VALUES ('$id','$Album');";
         

         if (mysqli_query($db, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


         header("location: Music.php");
   
   
  } 

?>



