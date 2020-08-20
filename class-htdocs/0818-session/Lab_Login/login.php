<?php
  session_start();

  if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit;
  }

  require ("config.php");
  $link = mysqli_connect ( $dbhost, $dbuser, $dbpass, "",$port ) or die ( mysqli_connect_error() );
  mysqli_query ( $link, "set names utf8");
  mysqli_select_db ( $link, $dbname );

  if(isset($_POST['btnOK'])){
    $userName = $_POST['txtUserName'];
    $passWord = $_POST['txtPassword'];

    if(trim($userName) != ''){
      echo "Dear ".$userName.":";
      

      $sql = "select * from `user` WHERE `username` = $userName and `password` = $passWord" ;
      $result = mysqli_query($link,$sql);
      $row_num = mysqli_num_rows($result);

      mysqli_close($link);

      if($row_num != 0){
        $_SESSION['user'] = $userName;
        echo "welcome!{$userName}";
        header("Location: index.php");
        exit;
      }
      else
        echo "wrong username or password";

       
    }
    else{
      echo "Please input username";
    }
  }

    
    
  

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="login.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" required="required"/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="button" name="btnHome" id="btnHome" onclick="location.href='index.php'" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>