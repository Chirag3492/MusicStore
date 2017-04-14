<?php
session_start();
if(!isset($_SESSION['cart']['total'])){
	$_SESSION['cart']['total']=0;
}

if(isset($_SESSION['cart']['items'][$_GET['id']])){
	$_SESSION['cart']['items'][$_GET['id']]['quantity']++;
	$_SESSION['cart']['total']++;
}
else{
	$_SESSION['cart']['items'][$_GET['id']] = array('id' => $_GET['id'], 'quantity'=>1);
	$_SESSION['cart']['ui'][] = $_GET['id'];
	$_SESSION['cart']['total']++;
}
?>