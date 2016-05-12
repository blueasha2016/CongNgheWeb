<?php
	require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');

    // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];

         $result1 = mysql_query("SELECT * FROM staff WHERE StaffID='$id'");
         $row1 = mysql_fetch_array($result1);

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

            //Sanitize the POST values
            $FirstName = clean($_POST['fName']);
            $LastName = clean($_POST['lName']);
            $StreetAddress = clean($_POST['sAddress']);
            $MobileNo = clean($_POST['mobile']);

            //Create INSERT query
            $qry = "UPDATE staff SET firstname='".$FirstName."',lastname='".$LastName."',Street_Address='".$StreetAddress."',Mobile_Tel='".$MobileNo."' WHERE StaffID='".$id."'";

            $result = @mysql_query($qry);

            //Check whether the query was successful or not
            if($result)
             {
                header("location: allocation.php");
                exit();
            }
            else 
            {
                die("Query failed " . mysql_error());
            } 
         }
        }
     else
     // if id isn't set, redirect back to the foods page
     {
        header("Location: index.php");
     }   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Update</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Profile </h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn/hội trường</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table align="center">
<tr>
<td>
<form id="staffForm" name="staffForm" method="post" onsubmit="return staffValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
  <CAPTION><h3>CHỈNH SỬA NHÂN VIÊN</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
	</tr>
    <tr>
      <th>Họ </th>
      <td><font color="#FF0000">* </font><input name="fName" type="text" class="textfield" id="fName" value="<?php echo $row1['firstname'] ?>"/></td>
    </tr>
	<tr>
      <th>Tên </th>
      <td><font color="#FF0000">* </font><input name="lName" type="text" class="textfield" id="lName" value="<?php echo $row1['lastname'] ?>"/></td>
    </tr>
	 <tr>
      <th>Địa chỉ </th>
      <td><font color="#FF0000">* </font><input name="sAddress" type="text" class="textfield" id="sAddress" value="<?php echo $row1['Street_Address'] ?>"/></td>
    </tr>
    <tr>
      <th>Điện thoại </th>
      <td><font color="#FF0000">* </font><input name="mobile" type="text" class="textfield" id="mobile" value="<?php echo $row1['Mobile_Tel'] ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Update" /></td>
    </tr>
  </table>
</td>
</form>
</tr>
</table>
<p>&nbsp;</p>
<hr>
</div>
<div id="footer">
<div class="bottom_addr"><a href="index.php" title="">VỀ TRANG CHỦ</a></div>
</div>
</div>
</body>
</html>