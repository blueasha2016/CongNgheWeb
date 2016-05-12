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
//retrive categories from the categories table
$result=mysql_query("SELECT * FROM categories")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Categories</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Categories Management</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table width="320" align="center">
<CAPTION><h3>THÊM MỚI MỘT LOẠI THỨC ĂN</h3></CAPTION>
<form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
<tr>
    <th>Tên</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" class="textfield" /></td>
    <td><input type="submit" name="Submit" value="Thêm" /></td>
</tr>
</form>
</table>
<hr>
<table width="320" align="center">
<CAPTION><h3>CÁC LOẠI THỨC ĂN HIỆN CÓ</h3></CAPTION>
<tr>
<th>Thể loại</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-category.php?id=' . $row['category_id'] . '">Xóa thể loại</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
<hr>
</div>
<div id="footer">
<div class="bottom_addr"><a href="index.php" title="">VỀ TRANG CHỦ</a></div>
</div>
</div>
</body>
</html>