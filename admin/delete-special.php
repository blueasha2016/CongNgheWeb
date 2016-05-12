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
         $result = mysql_query("DELETE FROM specials WHERE special_id='$id'")
         or die("There was a problem while removing the promo ... \n" . mysql_error()); 
         
         // redirect back to the specials page
         header("Location: specials.php");
         }
     else
     // if id isn't set, redirect back to the specials page
     {
        header("Location: specials.php");
     }
 
?>