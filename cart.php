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
    
//define default values for flag_0
$flag_0 = 0;
    
//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];

//selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
$result=mysql_query("SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name FROM food_details,cart_details,categories,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND food_details.food_category=categories.category_id AND cart_details.quantity_id=quantities.quantity_id")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<?php
    if(isset($_POST['Submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        //get category id
        $id = clean($_POST['category']);
        
        //selecting all records from the food_details table based on category id. Return an error if there are no records in the table
        $result=mysql_query("SELECT * FROM food_details WHERE food_category='$id'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
<?php
    //retrieving quantities from the quantities table
    $quantities=mysql_query("SELECT * FROM quantities")
    or die("Something is wrong ... \n" . mysql_error()); 
?>
<?php
    //retrieving cart ids from the cart_details table
    //define a default value for flag_0
    $flag_0 = 0;
    $items=mysql_query("SELECT * FROM cart_details WHERE member_id='$member_id' AND flag='$flag_0'")
    or die("Something is wrong ... \n" . mysql_error()); 
?>
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysql_query("SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Đơn hàng</title>
<script type="text/javascript" src="swf/swfobject.js"></script>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css">
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
 <h1>ĐƠN HÀNG CỦA TÔI</h1>
    <hr>
        <h3><a href="foodzone.php">Tới Food Zone!</a></h3>
            <form name="quantityForm" id="quantityForm" method="post" action="update-quantity.php" onsubmit="return updateQuantity(this)">
                 <table width="560" align="center">
                     <tr>
                        <td>Mã thức ăn</td>
                        <td><select name="item" id="item">
                            <option value="select">- select -
                            <?php 
                            //loop through cart_details table rows
                            while ($row=mysql_fetch_array($items)){
                            echo "<option value=$row[cart_id]>$row[cart_id]"; 
                            }
                            ?>
                            </select>
                        </td>
                        <td>Quantity</td>
                        <td><select name="quantity" id="quantity">
                            <option value="select">- chọn -
                            <?php
                            //loop through quantities table rows
                            while ($row=mysql_fetch_assoc($quantities)){
                            echo "<option value=$row[quantity_id]>$row[quantity_value]"; 
                            }
                            ?>
                            </select>
                        </td>
                        <td><input type="submit" name="Submit" value="Thay đổi số lượng" /></td>
                     </tr>
                 </table>
            </form>
            <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
          <table width="910" height="auto" style="text-align:center;">
            <tr>
                <th>Mã số</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Miêu tả</th>
                <th>Thể loại</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
                <th>Action(s)</th>
            </tr>

            <?php
                //loop through all table rows
                $symbol=mysql_fetch_assoc($currencies); //gets active currency
                while ($row=mysql_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['cart_id']."</td>";
                    echo '<td><a href=images/'. $row['food_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row['food_photo']. ' width="80" height="70"></a></td>';
                    echo "<td>" . $row['food_name']."</td>";
                    echo "<td>" . $row['food_description']."</td>";
                    echo "<td>" . $row['category_name']."</td>";
                    echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
                    echo "<td>" . $row['quantity_value']."</td>";
                    echo "<td>" . $row['total']."" . $symbol['currency_symbol']. "</td>";
                    /*
                    echo "<form>";
                    echo '<td><select name="quantity" id="quantity" onchange="getQuantity(this.value)">
                    <option value="select">- select quantity -
                    <?php
                    while ($row=mysql_fetch_assoc($quantities)){
                    echo "<option value=$row[quantity_id]>$row[quantity_value]"; 
                    //$_SESSION[SESS_CART_ID] = $row[cart_id];
                }
                ?>
                </select></td>';
                echo "</form>";
                */
                /*
                echo "<form>";
                    echo "<td><select name='quantity' id='quantity' onclick='getQuantity(this.value)'>
                    <option value='1'>select
                    <option value='2'>1
                    <option value='3'>2
                    <option value='4'>3

                
          
                </select></td>";
                echo "</form>";
                */
                echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Thanh toán</a></td>';
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