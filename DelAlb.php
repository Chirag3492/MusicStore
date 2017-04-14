<?php
  
		
   $db = mysqli_connect("localhost","root","root","chinook");
  
   if(isset($_POST['submit_btn'])){
            $id = mysql_real_escape_string($_POST['id']);
      $Album = mysql_real_escape_string($_POST['Album']);
      
      if (!$db) {
         die("Connection failed: mysqli_connect_error()");
  }
  
       
$sql = "DELETE FROM ablum WHERE AlbumId ='$id' and Title='Album'";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}

$db->close();
}
?>