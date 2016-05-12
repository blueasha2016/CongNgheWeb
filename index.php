<?php
//checking connection and connecting to a database
require_once('connection/config.php');

//retrieve questions from the questions table
$questions=mysql_query("SELECT * FROM questions")
or die("Something is wrong ... \n" . mysql_error());
?>
<?php
//setting-up a remember me cookie
    if (isset($_POST['Submit'])){
        //setting up a remember me cookie
        if($_POST['remember']) {
            $year = time() + 31536000;
            setcookie('remember_me', $_POST['login'], $year);
        }
        else if(!$_POST['remember']) {
            if(isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie(remember_me, gone, $past);
            }
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Trang chủ</title>
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
<div id="header" class="stretchX">
    <div id="logo"> <a href="index.php" class="blockLink"></a></div>
    <div id="company_name">Food Plaza Restaurant</div>
</div>
<div id="center">
  <h1><center>Chào mừng đến với hệ thống đặt hàng online của nhà hàng Food Plaza!</center></h1>
      <div class="body_text">
  Ngay từ bây giờ bạn chỉ cần ở nhà và đặt món ăn của mình từ Food Zone và nó sẽ được giao đến ngay trước cửa của bạn. Hãy lướt qua những ưu đãi đặc biệt hàng tuần của chúng tôi trong menu ưu đãi đặc biệt. Đăng ký một tài khoản với chúng tôi để sử dụng chức năng đặt hàng nhanh, giao hàng và thanh toán tiện lợi thức ăn. Thực hiện ngay bây giờ bằng cách Đăng Nhập dưới đây hoặc Đăng Ký nếu bạn không có tài khoản trên website:
  </div>
<table align="center" width="100%">
    <tr align="center">
        <td style="text-align:center;">
            <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
            <form id="loginForm" name="loginForm" method="post" action="login-exec.php" onsubmit="return loginValidate(this)">
              <table width="290" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
                </tr>
                <tr>
                  <td width="112"><b>Email</b></td>
                  <td width="188"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                  <td><b>Mật khẩu</b></td>
                  <td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                      <td><input name="remember" type="checkbox" class="" id="remember" value="1" onselect="cookie()" <?php if(isset($_COOKIE['remember_me'])) {
                        echo 'checked="checked"';
                    }
                    else {
                        echo '';
                    }
                    ?>/>Ghi nhớ tài khoản</td>
                      <td><a href="JavaScript: resetPassword()">Quên mật khẩu?</a></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="reset" value="Xóa"/>
                  <input type="submit" name="Submit" value="Đăng Nhập" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
              </table>
            </form>
            </div>
        </td>
        <hr>
        <td style="text-align:center;">
            <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px;">
            <form id="loginForm" name="loginForm" method="post" action="register-exec.php" onsubmit="return registerValidate(this)">
              <table width="450" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
                </tr>
                <tr>
                  <th>Họ </th>
                  <td><font color="#FF0000">* </font><input name="fname" type="text" class="textfield" id="fname" /></td>
                </tr>
                <tr>
                  <th>Tên </th>
                  <td><font color="#FF0000">* </font><input name="lname" type="text" class="textfield" id="lname" /></td>
                </tr>
                <tr>
                  <th width="124">Email</th>
                  <td width="168"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                  <th>Mật khẩu</th>
                  <td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                  <th>Nhập lại mật khẩu</th>
                  <td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                </tr>
                <tr>
                  <th>Câu hỏi bảo mật</th>
                    <td><font color="#FF0000">* </font><select name="question" id="question">
                    <option value="select">- chọn câu hỏi -
                    <?php 
                    //loop through quantities table rows
                    while ($row=mysql_fetch_array($questions)){
                    echo "<option value=$row[question_id]>$row[question_text]"; 
                    }
                    ?>
                    </select></td>
                </tr>
                <tr>
                  <th>Câu trả lời</th>
                  <td><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
                </tr>
                <tr>
                <td colspan="2"><input type="reset" value="Xóa"/>
                <input type="submit" name="Submit" value="Đăng Ký" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
              </table>
            </form>
            </div>
        </td>
    </tr>
</table>
<hr>
</div>
<div id="footer">
    <div class="bottom_menu"><a href="index.php">Trang chủ</a>  |  <a href="aboutus.php">Về chúng tôi</a>  |  <a href="specialdeals.php">Ưu đãi đặc biệt</a>  |  <a href="foodzone.php">Food Zone</a>  |  <a href="#">Chương trình liên kết</a> |<br>
  | <a href="admin/index.php" target="_blank">Administrator</a> |</div>
  
  <div class="bottom_addr">&copy; 2015-2016 Food Plaza. All Rights Reserved</div>
</div>
</div>
</body>
</html>
