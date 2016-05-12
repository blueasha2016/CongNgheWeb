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
$categories=mysql_query("SELECT * FROM categories")
or die("There are no records to display ... \n" . mysql_error()); 

//retrieve quantities from the quantities table
$quantities=mysql_query("SELECT * FROM quantities")
or die("Something is wrong ... \n" . mysql_error()); 

//retrieve currencies from the currencies table (deleting)
$currencies=mysql_query("SELECT * FROM currencies")
or die("Something is wrong ... \n" . mysql_error()); 

//retrieve currencies from the currencies table (updating)
$currencies_1=mysql_query("SELECT * FROM currencies")
or die("Something is wrong ... \n" . mysql_error()); 

//retrieve polls from the ratings table
$ratings=mysql_query("SELECT * FROM ratings")
or die("Something is wrong ... \n" . mysql_error());

//retrieve timezones from the timezones table (deleting)
$timezones=mysql_query("SELECT * FROM timezones")
or die("Something is wrong ... \n" . mysql_error()); 

//retrieve timezones from the timezones table (updating)
$timezones_1=mysql_query("SELECT * FROM timezones")
or die("Something is wrong ... \n" . mysql_error());  

//retrieve tables from the tables table
$tables=mysql_query("SELECT * FROM tables")
or die("Something is wrong ... \n" . mysql_error());

//retrieve partyhalls from the partyhalls table
$partyhalls=mysql_query("SELECT * FROM partyhalls")
or die("Something is wrong ... \n" . mysql_error());

//retrieve questions from the questions table
$questions=mysql_query("SELECT * FROM questions")
or die("Something is wrong ... \n" . mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Options</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Tùy Chỉnh</h1>
<a href="profile.php">Thông tin cá nhân</a> | <a href="categories.php">Thể loại</a> | <a href="foods.php">Thức ăn</a> | <a href="accounts.php">Tài khoản</a> | <a href="orders.php">Đơn hàng</a> | <a href="reservations.php">Đặt bàn</a> | <a href="specials.php">Ưu đãi</a> | <a href="allocation.php">Nhân viên</a> | <a href="messages.php">Tin nhắn</a> | <a href="options.php">Tùy chỉnh</a> | <a href="logout.php">Đăng xuất</a>
<div id="container">
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ THỂ LOẠI</h3></CAPTION>
<tr>
<form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
<td>
  <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Thể loại</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="categoryForm" id="categoryForm" action="delete-category.php" method="post" onsubmit="return categoriesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Thể loại</td>
        <td><select name="category" id="category">
        <option value="select">- chọn thể loại -
        <?php 
        //loop through categories table rows
        while ($row=mysql_fetch_array($categories)){
        echo "<option value=$row[category_id]>$row[category_name]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ SỐ LƯỢNG</h3></CAPTION>
<tr>
<form name="quantityForm" id="quantityForm" action="quantities-exec.php" method="post" onsubmit="return quantitiesValidate(this)">
<td>
  <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="quantityForm" id="quantityForm" action="delete-quantity.php" method="post" onsubmit="return quantitiesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Số lượng</td>
        <td><select name="quantity" id="quantity">
        <option value="select">- chọn số lượng -
        <?php 
        //loop through quantities table rows
        while ($row=mysql_fetch_array($quantities)){
        echo "<option value=$row[quantity_id]>$row[quantity_value]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ TIỀN TỆ</h3></CAPTION>
<tr>
<td>
<form name="currencyForm" id="currencyForm" action="currencies-exec.php" method="post" onsubmit="return currenciesValidate(this)">
  <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Loại/Kí hiệu</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</form>
</td>
<td>
<form name="currencyForm" id="currencyForm" action="delete-currency.php" method="post" onsubmit="return currenciesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Loại/Kí hiệu</td>
        <td><select name="currency" id="currency">
        <option value="select">- chọn tiền tệ -
        <?php 
        //loop through currencies table rows
        while ($row=mysql_fetch_array($currencies)){
        echo "<option value=$row[currency_id]>$row[currency_symbol]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
<td>
<form name="currencyForm" id="currencyForm" action="activate-currency.php" method="post" onsubmit="return currenciesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Loại/Kí hiệu</td>
        <td><select name="currency" id="currency">
        <option value="select">- chọn 1 tiền tệ -
        <?php 
        //loop through currencies table rows
        while ($row=mysql_fetch_array($currencies_1)){
        echo "<option value=$row[currency_id]>$row[currency_symbol]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Update" value="Activate" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ ĐÁNH GIÁ</h3></CAPTION>
<tr>
<form name="ratingForm" id="ratingForm" action="ratings-exec.php" method="post" onsubmit="return ratingsValidate(this)">
<td>
  <table width="300" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Cấp độ đánh giá</td>
        <td><input type="text" name="name" id="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="ratingForm" id="ratingForm" action="delete-rating.php" method="post" onsubmit="return ratingsValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Cấp độ đánh giá</td>
        <td><select name="rating" id="rating">
        <option value="select">- chọn cấp độ -
        <?php 
        //loop through ratings table rows
        while ($row=mysql_fetch_array($ratings)){
        echo "<option value=$row[rate_id]>$row[rate_name]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ MÚI GIỜ</h3></CAPTION>
<tr>
<td>
<form name="timezoneForm" id="timezoneForm" action="timezone-exec.php" method="post" onsubmit="return timezonesValidate(this)">
  <table width="250" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Múi giờ</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</form>
</td>
<td>
<form name="timezoneForm" id="timezoneForm" action="delete-timezone.php" method="post" onsubmit="return timezonesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Múi giờ</td>
        <td><select name="timezone" id="timezone">
        <option value="select">- chọn thời gian -
        <?php 
        //loop through timezones table rows
        while ($row=mysql_fetch_array($timezones)){
        echo "<option value=$row[timezone_id]>$row[timezone_reference]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
<td>
<form name="timezoneForm" id="timezoneForm" action="activate-timezone.php" method="post" onsubmit="return timezonesValidate(this)">
  <table width="250" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Múi giờ</td>
        <td><select name="timezone" id="timezone">
        <option value="select">- chọn múi giờ -
        <?php 
        //loop through timezones table rows
        while ($row=mysql_fetch_array($timezones_1)){
        echo "<option value=$row[timezone_id]>$row[timezone_reference]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Update" value="Activate" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ BÀN</h3></CAPTION>
<tr>
<form name="tableForm" id="tableForm" action="tables-exec.php" method="post" onsubmit="return tablesValidate(this)">
<td>
  <table width="350" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Bàn tên/số</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="tableForm" id="tableForm" action="delete-table.php" method="post" onsubmit="return tablesValidate(this)">
  <table width="350" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Bàn tên/số</td>
        <td><select name="table" id="table">
        <option value="select">- chọn bàn -
        <?php 
        //loop through tables table rows
        while ($row=mysql_fetch_array($tables)){
        echo "<option value=$row[table_id]>$row[table_name]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ HỘI TRƯỜNG</h3></CAPTION>
<tr>
<form name="partyhallForm" id="partyhallForm" action="partyhalls-exec.php" method="post" onsubmit="return partyhallsValidate(this)">
<td>
  <table width="350" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Hội trường tên/số</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="partyhallForm" id="partyhallForm" action="delete-partyhall.php" method="post" onsubmit="return partyhallsValidate(this)">
  <table width="370" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Hội trường tên/số</td>
        <td><select name="partyhall" id="partyhall">
        <option value="select">- chọn hội trường -
        <?php 
        //loop through partyhalls table rows
        while ($row=mysql_fetch_array($partyhalls)){
        echo "<option value=$row[partyhall_id]>$row[partyhall_name]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
<table align="center" width="910">
<CAPTION><h3>QUẢN LÝ CÂU HỎI</h3></CAPTION>
<tr>
<form name="questionForm" id="questionForm" action="questions-exec.php" method="post" onsubmit="return questionsValidate(this)">
<td>
  <table width="300" border="0" cellpadding="2" cellspacing="0" align="center">
    <tr>
        <td>Câu hỏi</td>
        <td><input type="text" name="name" class="textfield" /></td>
        <td><input type="submit" name="Insert" value="Thêm" /></td>
    </tr>
  </table>
</td>
</form>
<td>
<form name="questionForm" id="questionForm" action="delete-question.php" method="post" onsubmit="return questionsValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td>Câu hỏi</td>
        <td><select name="question" id="question">
        <option value="select">- chọn câu hỏi -
        <?php 
        //loop through quantities table rows
        while ($row=mysql_fetch_array($questions)){
        echo "<option value=$row[question_id]>$row[question_text]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Delete" value="Xóa" /></td>
    </tr>
  </table>
</form>
</td>
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
