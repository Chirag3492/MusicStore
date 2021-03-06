<?php 
session_start();
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
    background-size: 1600px 800px;
    

    
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

<a href="Home.php" target="_self" style="color: white" >
Logout</a>
<a href="mycart.php" target="_self" style="color: white" >
<img src ="mycart.png" alt= "Add Cart" height="30" width ="30" ></a>


</form> 
</div>


<?php            
//Test connection
if(mysqli_connect_errno()){
die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

if (isset($_GET['TrackId']))
{	
	$albumId = $_GET['AlbumId'];
	$query = "INSERT into cart (AlbumId) values ('$AlbumId')";
	$sql = mysqli_query($db, $query);


	if($sql){
		echo "<script>
		alert('Album added to cart!');
		</script>";
	} else{
		echo "Sorry! There is some problem.";
	}	
		
}

if(!isset($_SESSION['cart'])){
			echo "No Items in cart.";
		}		

else {
//Set variables
$qryCat = 'track';
$qrySearch = '';	
$err='';

	
	//Query users choice
	 if ($qryCat == 'album') {
		$sql = "SELECT * FROM $qryCat a JOIN artist b ON (a.ArtistId = b.ArtistId) WHERE Title LIKE '%$qrySearch%' OR Name LIKE '%$qrySearch%' OR AlbumId LIKE '%$qrySearch%' OR Cost LIKE '%$qrySearch%' ";
		
	}
	else if ($qryCat == 'artist')
		$sql = "SELECT * FROM $qryCat WHERE Name LIKE '%$qrySearch%' OR ArtistId LIKE '%$qrySearch%'";
        else if ($qryCat == 'genre')
		$sql = "SELECT * FROM $qryCat WHERE Name LIKE '%$qrySearch%' OR GenreId LIKE '%$qrySearch%'";
	else if ($qryCat == 'track')
		$tracks_to_display = join($_SESSION['cart']['ui'],',');
		$sql = "SELECT * FROM $qryCat a JOIN album b ON (a.AlbumId = b.AlbumId) WHERE TrackId IN (".$tracks_to_display.")";
		
         
	$result = mysqli_query($db, $sql);
	

		//Check Query
		if(!$result){
			die("Database query failed.");
		}
		
	//$row = mysqli_fetch_assoc($result);
	
	//Check how many records
	$count = mysqli_num_rows($result);
	//$rslt= $_POST['search'];
    if ($count) {
    	# code...
 $price_total = $_SESSION['cart']['total']*10;   
 echo  '<h2>' .$_SESSION['cart']['total']. ' items found in cart. Total Price of : $'.$price_total.'</h2>';
//	echo '<h3> Search Criteria:'.' '.$qryCat.'</h3>';

	//Loop through records and display
       	echo "<table>";
       	if ($qryCat == 'album') {  
                        echo '<tr><th align="center">'.'AlbumId'.'</th><th align="center"> '.'Title'.'</th><th align="center"> '.'Artist Name'.'</th><th align="center"> '.'Price in $ '.'</th><th align="center"> '.'Add Cart'.'</th></tr>'; 
			} 

                        else if ($qryCat  == 'artist') {
                        echo '<tr><th align="center">'.'ArtistId'.'</th><th align="center"> '.'Name'.'</th><th align="center"> '; 
			}

                        else if ($qryCat == 'genre') { 
                        echo '<tr><th align="center">'.'GenreId'.'</th><th align="center"> '.'Name'.'</th><th align="center">';
			} 

			 else if ($qryCat == 'track') {
                        echo '<tr><th align="center">'.' TrackId '.'</th><th align="center"> '.'Track Name'.'</th><th align="center"> '.'Composer Name'.'</th><th align="center"> '.'Album Title'.'</th><th align="center">'.'Quantity '.'</th><th align="center"> '.'Price'.'</th></tr>';
			
		}
	while($row = mysqli_fetch_assoc($result)){
		 if ($qryCat == 'album') {  
                        //echo '<tr><th align="center">'.'AlbumId'.'</th><th align="center"> '.'Title'.'</th><th align="center"> '.'Artist Name'.'</th><th align="center"> '.'Price in $ '.'</th><th align="center"> '.'Add Cart'.'</th></tr>'; 
			echo '<tr><td align="center">'.$row['AlbumId'].'</td><td align="center"> '.$row['Title'].'</td><td align="center"> '.$row['Name'].'</td><td align="center" > '.$row['Cost'].'</td><td align="center"> '.'<a href="addcart.php?albumId= '.$row['AlbumId'].'" ><img src ="sho.png" alt= "Add Cart" height="30" width ="30"></a></td></tr>';} 

                        else if ($qryCat  == 'artist') {
                        //echo '<tr><th align="center">'.'ArtistId'.'</th><th align="center"> '.'Name'.'</th><th align="center"> '; 
			echo '<tr><td align="center">'.$row['ArtistId'].' </td><td align="center">'.$row['Name'].'</td></tr>';}

                        else if ($qryCat == 'genre') { 
                        //echo '<tr><th align="center">'.'GenreId'.'</th><th align="center"> '.'Name'.'</th><th align="center">';
			echo '<tr><td align="center">'.$row['GenreId'].'</td><td align="center"> '.$row['Name'].'</td></tr>';} 

			 else if ($qryCat == 'track') {
			 	$price_current = $_SESSION['cart']['items'][$row['TrackId']]['quantity']*10;
			 	$quantity_current = $_SESSION['cart']['items'][$row['TrackId']]['quantity'];
                        //echo '<tr><th align="center">'.' TrackId '.'</th><th align="center"> '.'Track Name'.'</th><th align="center"> '.'Composer Name'.'</th><th align="center"> '.'Album Title'.'</th><th align="center">'.'Price in $ '.'</th><th align="center"> '.'Add Cart'.'</th></tr>';
			echo'<tr><td align="center">'.$row['TrackId'].'</td><td align="center"> '.$row['Name'].'</td><td align="center"> '.$row['Composer'].'</td><td align="center"> '.$row['Title'].'</td><td align="center"> '.$quantity_current.' </td><td align="center">$'.$price_current.'</td></tr>';
		} 
               
			
			//echo '<a href="'.$row['paper_url'].'">'.$row['paper_url'].'</a>';
	}
	echo "</table>";
	echo "<br><br>";
	echo "<a href='clear_cart.php'><img src='Clear.png' alt='clear cart' height=50 width=100 align ='right'></a>";  
    

	}  

		//If no records are found alert users2234d
		

}

?>


<script type="text/javascript">
	function addToCart(id) {
		var data_url = "addToCart.php?id="+id;
		$.get( data_url, function( data ) {
		  alert( "Added to cart." );
		});
	}
</script>
</body>
</html>

