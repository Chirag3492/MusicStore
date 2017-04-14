<?php 
session_start();
require 'includes/config.php';
?>
<head>
<style>
table, td, th {
    border: 1px solid blue;
}

table {
    border-collapse:collapse;
    width: 100%;
  
}

td, th {
    height: 50px;
}
</style>
</head>
            
<?php


 
			
		  //Query album
                         
		       

                       
                        $sql = 'select DISTINCT alb.Title, alb.Cost from album alb JOIN cart crt ON (alb.AlbumId = crt.AlbumId)';
                        
                        $result = mysqli_query($db,$sql);

                       //Check Query
		  if(!$result){
				die("Database query failed.");
			}  	

                          //Check username field


	//Fetch rows
         echo "<table>";
	while($row = mysqli_fetch_assoc($result)){
			echo '<tr><td align= "center">'.$row['Title'].'</td><td align= "center"> '. $row['Cost'].' $ '.'</td></tr>';
                      
		
		//echo '<h3>'.$row['Title'] . '</h3>';
		
		
		
		//echo '<hr><p style="font-weight:bold"> Author: '.$row['name'].'</p>';
		//echo '<p>'.$row['title'] . '</p>';
		//echo 'URL: <a href="'.$row['paper_url'].'">'.$row['paper_url'].'</a>';
		
	
			
	}//End while
		  
 echo"</table>"	;	  
		  
		  ?>  
            
           <button onClick="window.open('music.php','_self')">New Search</button>
        </div>
    </section>
</main>
<footer>
</footer>
</body>
</html>
<?php
mysqli_close($db);
?>