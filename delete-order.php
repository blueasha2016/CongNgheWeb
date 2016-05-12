<?php
	//checking connection and connecting to a database
	require_once('connection/config.php');
	
 
 // check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM orders_details WHERE order_id='$id'")
 or die("The order does not exist ... \n"); 
 
 // redirect back to the member index
 header("Location: member-index.php");
 }
 else
 // if id isn't set, redirect back to member index
 {
 header("Location: member-index.php");
 }
 
?>