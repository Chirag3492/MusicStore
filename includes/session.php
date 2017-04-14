<?
session_start();
require 'config.php';


$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"SELECT email FROM login WHERE email = '$user_check'");

$row = mysqli_fetch_assoc($ses_sql);

$login_session = $row['email'];


if(!isset($_SESSION['login_user'])){
	header('location:../login.php');
}
?>