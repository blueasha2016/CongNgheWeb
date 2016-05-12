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
         $result = mysql_query("DELETE FROM members WHERE member_id='$id'")
         or die("The member does not exist ... \n"); 
         
         // redirect back to the accounts page
         header("Location: accounts.php");
     }
     else
        // if id isn't set, redirect back to the accounts page
     {
        header("Location: accounts.php");
     }
 
?>