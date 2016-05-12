<?php
//Start session
session_start();
    
//checking connection and connecting to a database
require_once('connection/config.php');

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
        //get email
        $email = clean($_POST['email']);
        
        //selecting a specific record from the members table. Return an error if there are no records in the table
        $result=mysql_query("SELECT * FROM members WHERE login='$email'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
<?php
    if(isset($_POST['Change']))
    {
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        if(trim($_SESSION['member_id']) != '')
        {
            $member_id=$_SESSION['member_id']; //gets member id from session
            //get answer and new password from form
            $answer = clean($_POST['answer']);
            $checkAnswer = mysql_query("SELECT * FROM members WHERE answer='".md5($answer)."'");

            if(mysql_num_rows($checkAnswer) != "")
            {

                $new_password = clean($_POST['new_password']);

                // update the entry
                $result = mysql_query("UPDATE members SET passwd='".md5($_POST['new_password'])."' WHERE member_id='$member_id'")
                or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours. \n");

                if($result)
                {
                    unset($_SESSION['member_id']);
                    header("Location: reset-success.php"); //redirect to reset success page
                }
                else
                {
                    unset($_SESSION['member_id']);
                    header("Location: reset-failed.php"); //redirect to reset failed page
                }
            }
            else
            {
                unset($_SESSION['member_id']);
                header("Location: reset-failed.php");
            }
        }
        else
        {
            unset($_SESSION['member_id']);
            header("Location: reset-failed.php"); //redirect to reset failed page
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Reset</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="reset">
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
  <form name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onsubmit="return passwordResetValidate(this)">
     <table width="360" style="text-align:center;">
     <tr>
        <th>Email của bạn</th>
        <td width="168"><input name="email" type="text" class="textfield" id="email" /></td>
        <td><input type="submit" name="Submit" value="Kiểm tra" /></td>
     </tr>
     </table>
 </form>
  <?php
    if(isset($_POST['Submit'])){
        $row=mysql_fetch_assoc($result);
        $_SESSION['member_id']=$row['member_id']; //creates a member id session
        session_write_close(); //closes session
        $question_id=$row['question_id'];
        
        //get question text based on question_id
        $question=mysql_query("SELECT * FROM questions WHERE question_id='$question_id'")
        or die("Một vấn đề xảy ra ... \n" . "Chúng tôi đang có một số chỉnh sửa trang web hiện giờ ... \n" . "Làm ơn quay trở lại sau một thời gian sau.");
        
        $question_row=mysql_fetch_assoc($question);
        $question=$question_row['question_text'];
        if($question!=""){
            echo "<b>Mã số của bạn:</b> ".$_SESSION['member_id']."<br>";
            echo "<b>Câu hỏi bảo mật:</b> ".$question;
        }
        else{
            echo "TÀI KHOẢN CỦA BẠN KHÔNG TỒN TẠI! XIN HÃY KIỂM TRA EMAIL CỦA BẠN.";
        }
    }
  ?>
  <hr>
  <form name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onsubmit="return passwordResetValidate_2(this)">
     <table width="360" style="text-align:center;">
     <tr>
        <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Miền bắt buộc</td>
     </tr>
     <tr>
        <th>Câu trả lời của bạn</th>
        <td width="168"><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
     </tr>
     <tr>
        <th>Mật khẩu mới</th>
        <td width="168"><font color="#FF0000">* </font><input name="new_password" type="password" class="textfield" id="new_password" /></td>
     </tr>
     <tr>
        <th>Xác nhận mật khẩu</th>
        <td width="168"><font color="#FF0000">* </font><input name="confirm_new_password" type="password" class="textfield" id="confirm_new_password" /></td>
     </tr>
     <tr>
        <td colspan="2"><input type="reset" name="Reset" value="Xóa" /><input type="submit" name="Change" value="Thay đổi mật khẩu" /></td>
     </tr>
     </table>
 </form>
  </div>
  </div>
</body>
</html>