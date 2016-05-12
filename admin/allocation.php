<?php
	require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');

    
    //selecting all records from the staff table. Return an error if there are no records in the tables
    $staff=mysql_query("SELECT * FROM staff")
    or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    //get order ids from the orders_details table based on flag=0
    $flag_0 = 0;
    $orders=mysql_query("SELECT * FROM orders_details WHERE flag='$flag_0'")
    or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    //get reservation ids from the reservations_details table based on flag=0
    $flag_0 = 0;
    $reservations=mysql_query("SELECT * FROM reservations_details WHERE flag='$flag_0'")
    or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
    //selecting all records from the staff table. Return an error if there are no records in the tables
    $staff_1=mysql_query("SELECT * FROM staff")
    or die("There are no records to display ... \n" . mysql_error());
?>
<?php
    //selecting all records from the staff table. Return an error if there are no records in the tables
    $staff_2=mysql_query("SELECT * FROM staff")
    or die("There are no records to display ... \n" . mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Phân Bổ Nhân Viên</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn/hội trường</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<table border="0" width="600" align="center">
<CAPTION><h3>DANH SÁCH NHÂN VIÊN</h3></CAPTION>
<tr>
<th>Mã số</th>
<th>Họ</th>
<th>Tên</th>
<th>Địa chỉ</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($staff)){
echo "<tr>";
echo "<td>" . $row['StaffID']."</td>";
echo "<td>" . $row['firstname']."</td>";
echo "<td>" . $row['lastname']."</td>";
echo "<td>" . $row['Street_Address']."</td>";
echo '<td><a href="update-staff.php?id=' . $row['StaffID'] . '">Sửa</a> | <a href="delete-staff.php?id=' . $row['StaffID'] . '">Xóa</a></td>';
echo "</tr>";
}
mysql_free_result($staff);
mysql_close($link);
?>
</table>
<hr>
<table align="center">
<tr>
<form id="ordersAllocationForm" name="ordersAllocationForm" method="post" action="orders-allocation.php" onsubmit="return ordersAllocationValidate(this)">
<td>
  <table width="350" border="0" cellpadding="2" cellspacing="0">
  <CAPTION><h3>PHÂN BỔ ĐƠN HÀNG</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
	</tr>
    <tr>
      <th width="124">Mã số Đơn hàng</th>
      <td width="168"><font color="#FF0000">* </font><select name="orderid" id="orderid">
        <option value="select">- chọn 1 thể loại -
        <?php 
        //loop through orders_details table rows
        while ($row=mysql_fetch_array($orders)){
        echo "<option value=$row[order_id]>$row[order_id]"; 
        }
        ?>
        </select></td>
    </tr>
    <tr>
      <th>Mã số Nhân viên</th>
      <td><font color="#FF0000">* </font><select name="staffid" id="staffid">
        <option value="select">- chọn 1 thể loại -
        <?php 
        //loop through staff table rows
        while ($row=mysql_fetch_array($staff_1)){
        echo "<option value=$row[StaffID]>$row[StaffID]"; 
        }
        ?>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Phân Bổ Nhân Viên" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form id="reservationsAllocationForm" name="reservationsAllocationForm" method="post" action="reservations-allocation.php" onsubmit="return reservationsAllocationValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
  <CAPTION><h3>BỐ TRÍ VIỆC ĐẶT CHỔ</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
	</tr>
    <tr>
      <th>Mã số Đặt chổ</th>
      <td><font color="#FF0000">* </font><select name="reservationid" id="reservationid">
        <option value="select">- chọn 1 thể loại -
        <?php 
        //loop through reservations_details table rows
        while ($row=mysql_fetch_array($reservations)){
        echo "<option value=$row[ReservationID]>$row[ReservationID]"; 
        }
        ?>
        </select></td>
    </tr>
	<tr>
      <th>Mã số Nhân viên </th>
      <td><font color="#FF0000">* </font><select name="staffid" id="staffid">
        <option value="select">- chọn 1 thể loại -
        <?php 
        //loop through staff table rows
        while ($row=mysql_fetch_array($staff_2)){
        echo "<option value=$row[StaffID]>$row[StaffID]"; 
        }
        ?>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Phân Bổ Nhân Viên" /></td>
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