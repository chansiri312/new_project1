<?
include('server.php');
session_start();
$usermem = $_SESSION["username"];

$sqlforget = "select * from user where email='$_POST[email]'";
$db_query = mysqli_query($conn, $sqlforget);
$resultfg = mysqli_fetch_array($db_query);
$usermember = $resultfg['usermem'];
$passmember = $resultfg['passmem'];
$num_rows = mysqli_num_rows($db_query);
if ($num_rows < 1) {
    // $head1 = "Invalid Email...";
    // $sub1 = "ไม่พบ Email ที่คุณกรอก<br>กรุณาตรวจสอบอีกครั้ง<br><a href=ForgetPass.php>ย้อนกลับ</a>";
} else {
    // $head1 = "Success...";
    // $sub1 = "คำร้องของคุณได้ส่งไปยังผู้ดูแลระบบเพื่อทำการ Reset Password ให้ใหม่<br>จะดำเนินการแจ้งไปยังอีเมล์ของคุณในขั้นตอนต่อไป..ขอบคุณค่ะ";
    $obg = "INSERT INTO forgetpass  (id,email,dateregist,status) values('', '$_POST[email]','$e_date $etime','00000')" or die("Cannot Add Database");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><? echo "$headtxt_web"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="css/instyle.css" rel="stylesheet" type="text/css">

</head>

<body>
    <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
            <td colspan="5" bgcolor="#FFFFFF">
                <div align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="201">&nbsp;</td>
                            <td width="482">
                                <div align="center"><br>
                                    <br>
                                    <br>
                                    
                                </div>
                            </td>
                            <td width="244">
                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                <br> <br> <br>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td><img src="images/spacer.gif" width="1" height="25" border="0" alt=""></td>
        </tr>

        <tr>
            <td colspan="5">
                <div align="center"><? echo "$buttomtxt_web"; ?> </div>
            </td>
            <td><img src="images/spacer.gif" width="1" height="40" border="0" alt=""></td>
        </tr>
    </table>
</body>

</html>