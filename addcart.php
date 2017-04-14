
<?php 
session_start();
require 'includes/config.php';
?>

<?php            
//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

if (isset($_GET['albumId']))
{	
	$albmId = $_GET['albumId'];
	$query = "INSERT into cart (AlbumId) values ('$albmId')";
	$sql = mysqli_query($db, $query);


	if($sql){
		echo "<script>
		alert('Album added to cart!');
		</script>";
	} else{
		echo "Sorry! There is some problem.";
	}

	echo "<script>
	history.go(-2);
	</script>";
}
?>


<?php include 'includes/footer.php' ?>

<?php
mysqli_close($db);
?>