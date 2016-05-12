<?php
	require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');

//retrive promotions from the specials table
$result=mysql_query("SELECT * FROM specials")
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
<title>Specials</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>QUẢN LÝ ƯU ĐÃI</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn/hội trường</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table width="850" align="center">
<CAPTION><h3>QUẢN LÝ ƯU ĐÃI</h3></CAPTION>
<form name="specialsForm" id="specialsForm" action="specials-exec.php" method="post" enctype="multipart/form-data" onsubmit="return specialsValidate(this)">
<tr>
    <th>Tên</th>
    <th>Miêu tả</th>
    <th>Giá</th>
    <th>Ngày bắt đầu</th>
    <th>Ngày kết thúc</th>
    <th>Hình ảnh</th>
    <th>Action</th>
</tr>
<tr>
    <td><input type="text" name="name" id="name" class="textfield" /></td>
    <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"></textarea></td>
    <td><input type="text" name="price" id="price" class="textfield" /></td>
    <td><input type="date" name="start_date" id="start_date" class="textfield" /></td>
    <td><input type="date" name="end_date" id="end_date" class="textfield" /></td>
    <td><input type="file" name="photo" id="photo"/></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</form>
</table>
<hr>
<table width="950" align="center">
<CAPTION><h3>DANH SÁCH ƯU ĐÃI</h3></CAPTION>
<tr>
<th>Hình ảnh</th>
<th>Tên</th>
<th>Miêu tả</th>
<th>Giá</th>
<th>Ngày bắt đầu</th>
<th>Ngày kết thúc</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
$symbol=mysql_fetch_assoc($currencies); //gets active currency
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo '<td><img src=../images/'. $row['special_photo']. ' width="80" height="70"></td>';
echo "<td>" . $row['special_name']."</td>";
echo "<td width='180' align='left'>" . $row['special_description']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['special_price']."</td>";
echo "<td>" . $row['special_start_date']."</td>";
echo "<td>" . $row['special_end_date']."</td>";
echo '<td><a href="delete-special.php?id=' . $row['special_id'] . '">Xóa ưu đãi</a></td>';
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