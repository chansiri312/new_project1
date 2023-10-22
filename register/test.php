<html>

<head>
    <title>ThaiCreate.Com Tutorials</title>
</head>

<body>
    <td width="482">
        <script language="JavaScript">
            function checkEmail() {
                var e1 = document.webFormEmail.email.value;

                if (e1.length == 0) {
                    alert("กรุณาใส่ Email Address ด้วยค่ะ");
                    document.webFormEmail.email.focus();
                    return false;
                } else
                    return true;
            }


            function chkEmail() {
                if (document.webFormEmail.email.value != "") {
                    if (document.webFormEmail.email.value.match(/.+@.+\..+/) == null) {
                        alert("กรุณากรอก E-Mail ให้ถูกต้อง");
                        document.webFormEmail.email.focus();
                    }
                }
            }
        </script>
        <table width="581" border="0" cellspacing="1" cellpadding="1">
            <form method="post" action="test1.php" name="webFormEmail" onSubmit="return checkEmail()">
                <tr>
                    <td colspan="2"><br> <strong>**
                            กรณีลืมรหัสผ่าน? **<br>
                        </strong> ระบบจะทำการ Reset Password
                        ให้ทางสมาชิกใหม่ เมื่อคำร้องถูกส่งเรียบร้อยแล้ว</td>
                </tr>
                <tr>
                    <td width="170">
                        <div align="right">Email
                            Address :</div>
                    </td>
                    <td width="404"><input name="email" type="text" class="inputxx" id="email" size=50 / onblur="chkEmail()"></td>
                </tr>
                <tr>
                    <td>
                        <div align="right"></div>
                    </td>
                    <td><input name="submit" type="submit" class="submitxx" value="ยืนยันการขอรหัสผ่านทางอีเมล์"></td>
                </tr>
            </form>
        </table>
        <br> <br> <br>
    </td>

</html>