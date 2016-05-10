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
//selecting all records from almost all tables. Return an error if there are no records in the tables
$result=mysql_query("SELECT members.member_id, members.firstname, members.lastname, billing_details.Street_Address, billing_details.Mobile_No, orders_details.*, food_details.*, cart_details.*, quantities.* FROM members, billing_details, orders_details, quantities, food_details, cart_details WHERE members.member_id=orders_details.member_id AND billing_details.billing_id=orders_details.billing_id AND orders_details.cart_id=cart_details.cart_id AND cart_details.food_id=food_details.food_id AND cart_details.quantity_id=quantities.quantity_id")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
<div id="header">
<h1>Quản lý đơn hàng</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table border="0" width="970" align="center">
<CAPTION><h3>DANH SÁCH ĐƠN HÀNG</h3></CAPTION>
<tr>
<th>Mã số</th>
<th>Tên khách hàng</th>
<th>Tên thức ăn</th>	
<th>Giá thức ăn</th>
<th>Số lượng</th>
<th>Tổng cộng</th>
<th>Ngày giao hàng</th>
<th>Địa chỉ giao hàng</th>
<th>Di động</th>
<th>Actions(s)</th>
</tr>

<?php
//loop through all tables rows
while ($row=mysql_fetch_assoc($result)){
echo "<tr>";
echo "<td>" . $row['order_id']."</td>";
echo "<td>" . $row['firstname']."\t".$row['lastname']."</td>";
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['food_price']."</td>";
echo "<td>" . $row['quantity_value']."</td>";
echo "<td>" . $row['total']."</td>";
echo "<td>" . $row['delivery_date']."</td>";
echo "<td>" . $row['Street_Address']."</td>";
echo "<td>" . $row['Mobile_No']."</td>";
echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Xóa đơn hàng</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
<hr>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2015-2016 Food Plaza. All Rights Reserved</div>
</div>
</div>
</body>
</html>