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
//get member id from session
$memberId=$_SESSION['SESS_MEMBER_ID'];

//selecting all records from the orders_details table. Return an error if there are no records in the table
$result=mysql_query("SELECT * FROM orders_details,cart_details,food_details,categories,quantities,members WHERE members.member_id='$memberId' AND orders_details.member_id='$memberId' AND orders_details.cart_id=cart_details.cart_id AND cart_details.food_id=food_details.food_id AND food_details.food_category=categories.category_id AND cart_details.quantity_id=quantities.quantity_id")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    //retrieving all rows from the cart_details table based on flag=0
    $flag_0 = 0;
    $items=mysql_query("SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
    or die("Something is wrong ... \n" . mysql_error()); 
    //get the number of rows
    $num_items = mysql_num_rows($items);
?>
<?php
    //retrieving all rows from the messages table
    $messages=mysql_query("SELECT * FROM messages")
    or die("Something is wrong ... \n" . mysql_error()); 
    //get the number of rows
    $num_messages = mysql_num_rows($messages);
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
<title>Trang cá nhân</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Trang chủ</a></li>
  <li><a href="foodzone.php">Food Zone</a></li>
  <li><a href="specialdeals.php">Ưu đãi đặc biệt</a></li>
  <li><a href="member-index.php">Tài khoản</a></li>
  <li><a href="contactus.php">Về chúng tôi</a></li>
  </ul>
  </div>
<div id="header">
  <div id="logo"> <a href="index.php" class="blockLink"></a></div>
  <div id="company_name">Food Plaza Restaurant</div>
</div>
<div id="center">
<h1>Chào <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<a href="member-profile.php">Thông tin cá nhân</a> | <a href="cart.php">Đơn hàng[<?php echo $num_items;?>]</a> |  <a href="inbox.php">Tin nhắn[<?php echo $num_messages;?>]</a> | <a href="tables.php">Bàn</a> | <a href="partyhalls.php">Hội trường</a> | <a href="ratings.php">Đánh giá</a> | <a href="logout.php">Đăng xuất</a>
<p>&nbsp;</p>
<p>Ở đây bạn có thể xem lịch sử đặt thức ăn và xóa những đơn hàng đã cũ từ tài khoản của mình. Có thể thấy hóa đơn của những lần đặt thức ăn. Bạn cũng có thể đặt bàn bằng tài khoản của mình. Để biết thêm thông tin <a href="contactus.php">Nhấn vào đây</a> để liên lạc với chúng tôi.
<h3><a href="foodzone.php">Đặt thức ăn!</a></h3>
<hr>
<table border="0" width="910" style="text-align:center;">
<CAPTION><h2>LỊCH SỬ ĐẶT THỨC ĂN</h2></CAPTION>
<tr>
<th>Mã số</th>
<th>Hình ảnh</th>
<th>Tên</th>
<th>Thể loại</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Tổng cộng</th>
<th>Ngày giao hàng</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
$symbol=mysql_fetch_assoc($currencies); //gets active currency
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['order_id']."</td>";
echo '<td><a href=images/'. $row['food_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row['food_photo']. ' width="80" height="70"></a></td>';
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['category_name']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
echo "<td>" . $row['quantity_value']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['total']."</td>";
echo "<td>" . $row['delivery_date']."</td>";
echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Cancel Order</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
</div>
</div>
<div id="footer">
    <div class="bottom_menu"><a href="index.php">Trang chủ</a>  |  <a href="aboutus.php">Về chúng tôi</a>  |  <a href="specialdeals.php">Ưu đãi đặc biệt</a>  |  <a href="foodzone.php">Food Zone</a>  |  <a href="#">Chương trình liên kết</a> |<br>
  | <a href="admin/index.php" target="_blank">Administrator</a> |</div>
  
  <div class="bottom_addr">&copy; 2015-2016 Food Plaza. All Rights Reserved</div>
</div>
</div>
</body>
</html>
