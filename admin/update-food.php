<?php
    require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysql server
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }
    
    //Select database
    $db = mysql_select_db(DB_DATABASE);
    mysql_query("set names 'utf8'");
    if(!$db) {
        die("Unable to select database");
    }
    // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // delete the entry
         // $result = mysql_query("DELETE FROM food_details WHERE food_id='$id'")
         // or die("There was a problem while removing the food ... \n" . mysql_error()); 
         
         // // redirect back to the foods page
         // header("Location: foods.php");
         $result = mysql_query("SELECT * FROM food_details WHERE food_id='$id'");
         $row1 = mysql_fetch_array($result);

        if(isset($_POST['Submit']))
        {
            //Function to sanitize values received from the form. Prevents SQL injection
            function clean($str) {
                $str = @trim($str);
                if(get_magic_quotes_gpc()) {
                    $str = stripslashes($str);
                }
                return mysql_real_escape_string($str);
            }
            
            //setup a directory where images will be saved 
            $target = "../images/"; 
            $target = $target . basename( $_FILES['photo']['name']); 
            
            //Sanitize the POST values
            $name = clean($_POST['name']);
            $description = clean($_POST['description']);
            $price = clean($_POST['price']);
            $category = clean($_POST['category']);
            $photo = clean($_FILES['photo']['name']);

            //Create INSERT query
            $qry = "UPDATE food_details SET food_name='$name',food_description='$description',food_price='$price',food_category='$category',food_photo='$photo' WHERE food_id='$id'";
            $result = @mysql_query($qry);
            
            //Check whether the query was successful or not
            if($result) {
                    //Writes the photo to the server 
                 $moved = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
                 
                 if($moved) 
                 {      
                     //everything is okay
                     echo "The photo ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 
                 } else {  
                     //Gives an error if its not okay 
                     echo "Sorry, there was a problem uploading your photo. "  . $_FILES["photo"]["error"]; 
                 }
                header("location: foods.php");
                exit();
            }else {
                die("Query failed " . mysql_error());
            } 
         }
        }
     else
     // if id isn't set, redirect back to the foods page
     {
        header("Location: foods.php");
     }
?>
<?php
    //retrive categories from the categories table
    $categories=mysql_query("SELECT * FROM categories")
    or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysql_query("SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Foods Update</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Chỉnh sửa thức ăn </h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table width="760" align="center">
<CAPTION><h3>THÊM MỚI MỘT THỨC ĂN</h3></CAPTION>
<form name="foodsForm" id="foodsForm" method="post" enctype="multipart/form-data" onsubmit="return foodsValidate(this)">
<tr>
    <th>Tên</th>
    <th>Miêu tả</th>
    <th>Giá</th>
    <th>Thể loại</th>
    <th>Hình ảnh</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" id="name" class="textfield" value="<?php echo $row1['food_name'] ?>" /></td>
    <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"><?php echo $row1['food_description'] ?></textarea></td>
    <td><input type="text" name="price" id="price" class="textfield" value="<?php echo $row1['food_price'] ?>"/></td>
    <td width="168"><select name="category" id="category">
    <option value="select">- chọn một thể loại -
    <?php 
    //loop through categories table rows
    while ($row=mysql_fetch_array($categories)){
    echo "<option value=$row[category_id]>$row[category_name]"; 
    }
    ?>
    </select></td>
    <td><input type="file" name="photo" id="photo"/></td>
    <td><input type="submit" name="Submit" value="Update" /></td>
</tr>
</form>
</table>

<hr>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2015-2016 Food Plaza. All Rights Reserved</div>
</div>
</div>
</body>
</html>