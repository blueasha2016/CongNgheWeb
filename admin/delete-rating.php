<?php
    //Start session
    session_start();
    
    //checking connection and connecting to a database
    require_once('connection/config.php');
    
    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }
    
    // check if Delete is set in POST
     if (isset($_POST['Delete'])){
         // get id value of currency and Sanitize the POST value
         $rate_id = clean($_POST['rating']);
         
         // delete the entry
         $result = mysql_query("DELETE FROM ratings WHERE rate_id='$rate_id'")
         or die("There was a problem while deleting the rate name ... \n" . mysql_error()); 
         
         // redirect back to options
         header("Location: options.php");
     }
     
         else
            // if id isn't set, redirect back to options
         {
            header("Location: options.php");
         }
?>