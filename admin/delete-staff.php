<?php
    //Start session
    session_start();
    
	//checking connection and connecting to a database
	require_once('connection/config.php');
	
 
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
     // get id value
     $id = $_GET['id'];
     
     // delete the entry
     $result = mysql_query("DELETE FROM staff WHERE StaffID='$id'")
     or die("The staff does not exist ... \n"); 
     
     // redirect back to the allocation page
     header("Location: allocation.php");
     }
     else
     // if id isn't set, redirect back to allocation page
     {
     header("Location: allocation.php");
     }
 
?>