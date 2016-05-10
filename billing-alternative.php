<?php
    require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lựa chọn thanh toán</title>
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
<h1>Địa chỉ thanh toán</h1>
<hr>
<p>Chúng tôi đã phát hiện ra rằng bạn không có địa chỉ thanh toán trong tài khoản. Vui lòng thêm địa chỉ thanh toán trong các mẫu dưới đây. Địa chỉ này sẽ được sử dụng để cung cấp đơn đặt hàng thực phẩm cho bạn. Xin lưu ý rằng chỉ đúng đường phố/địa chỉ vật lý nên được sử dụng để đảm bảo giao hàng cho các đơn đặt hàng thực phẩm của bạn. Để biết thêm thông tin <a href="contactus.php">Nhấn vào đây</a> để liên lạc với chúng tôi.</p>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<form id="billingForm" name="billingForm" method="post" action="billing-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return billingValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
  <CAPTION><h3>THÊM ĐỊA CHỈ GIAO HÀNG/THANH TOÁN</h3></CAPTION>
    <tr>
        <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
    </tr>
    <tr>
      <th>Địa chỉ </th>
      <td><font color="#FF0000">* </font><input name="sAddress" type="text" class="textfield" id="sAddress" /></td>
    </tr>
    <tr>
      <th>Số bưu điện </th>
      <td><font color="#FF0000">* </font><input name="box" type="text" class="textfield" id="box" /></td>
    </tr>
    <tr>
      <th>Công ty</th>
      <td><font color="#FF0000">* </font><input name="city" type="text" class="textfield" id="city" /></td>
    </tr>
    <tr>
      <th width="124">Di động</th>
      <td width="168"><font color="#FF0000">* </font><input name="mNumber" type="text" class="textfield" id="mNumber" /></td>
    </tr>
    <tr>
      <th>Điện thoại</th>
      <td>&nbsp;&nbsp;&nbsp;<input name="lNumber" type="text" class="textfield" id="lNumber" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Thêm" /></td>
    </tr>
</table>
</form>
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
