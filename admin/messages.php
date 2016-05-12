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
//selecting all records from the messages table. Return an error if there is a problem
$result=mysql_query("SELECT * FROM messages")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Messages</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Quản lý tin nhắn</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
</div>
<div id="container">
<form id="messageForm" name="messageForm" method="post" action="message-exec.php" onsubmit="return messageValidate(this)">
  <table width="540" border="0" cellpadding="2" cellspacing="0" align="center">
  <CAPTION><h3>GỬI TIN NHẮN</h3></CAPTION>
    <tr>
      <th width="200">Chủ đề</th>
      <td width="168"><input type="text" name="subject" id="subject" class="textfield" /></td>
    </tr>
    <tr>
      <th width="200">Nội dung</th>
      <td width="168"><textarea name="txtmessage" class="textfield" rows="5" cols="60"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><input type="submit" name="Submit" value="Gửi" />
	  <input type="reset" name="Reset" value="Xóa" /></td>
    </tr>
  </table>
</form>
<hr>
<table border="0" width="1000" align="center">
<CAPTION><h3>TIN NHẮN ĐÃ GỬI</h3></CAPTION>
<tr>
<th>Mã số</th>
<th>Ngày gửi</th>
<th>Thời gian</th>
<th>Chủ đề</th>
<th>Nội dung</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['message_id']."</td>";
echo "<td>" . $row['message_date']."</td>";
echo "<td>" . $row['message_time']."</td>";
echo "<td>" . $row['message_subject']."</td>";
echo "<td width='300' align='left'>" . $row['message_text']."</td>";
echo '<td><a href="delete-message.php?id=' . $row['message_id'] . '">Remove Message</a></td>';
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