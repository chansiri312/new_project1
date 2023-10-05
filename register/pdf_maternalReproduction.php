<?php

session_start();

require_once('server.php');

require_once __DIR__ . '../vendor/autoload.php';



// เพิ่ม Font ให้กับ mPDF
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
        'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
            'R' => 'CORDIA.ttf',
            'I' => 'cordiai.ttf',
            'B' =>  'Cordia New Bold.ttf',
            'BI' => "Cordia New Bold Italic.ttf",
        ]
    ],
]);


ob_start(); // ทำการเก็บค่า html นะครับ
?>





<!DOCTYPE html>
<html>
<?php
header("Location: MyPDF.pdf");
?>
<title>PDF</title>
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<style>
    body {
        font-family: sarabun;
        font-size: 20pt;

    }

    table {
        border-collapse: Cordia;
        width: 100%;
    }


    .css4 {

        font-size: 28pt;

    }

    .css5 {
        font-weight: bold;
        font-size: 26pt;
    }

    p {
        color: black;
        text-decoration: underline;

    }

    .font {
        font-size: 30pt;
    }
    div.b { text-align: right; }
</style>


</head>

<body>

    <?php

    if ($_GET['num1'] != '') {

        $sql = "select * from maternalreproduction  where num1 = '" . $_GET['num1'] . "'";

        $query = mysqli_query($conn, $sql);

        //  echo $sql;
    } else {


        $sql = "select * from maternalreproduction  where recorder_name = '" . $_SESSION['username'] . "'";

        $query = mysqli_query($conn, $sql);
    }


    $sql1 = "select * from maternalreproduction  where num1 = '" . $_GET['num1'] . "'";

    $query1 = mysqli_query($conn, $sql1);
    $result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);



    ?>
   <div class="b"><p5>มกษ. 6408-2552</p5></div>





    <table>
        <tr>
            <td height="48" align="center">
            <font size="+2"><b>แบบบันทึกข้อมูลการสืบพัน์ของแม่พันธุ์</font>            </td>
		</tr>

    </table>



    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>


            <td width="14%" height="45" align="left">
                <font size="+2">หมายเลขประจำตัว </font>
            </td>

            <td width="13%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['num1']; ?></font>
            </td>


            <td width="5%" align="left">
                <font size="+2">พันธุ์</font>
            </td>
            <td width="18%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['gen']; ?></font>
            </td>
            <td width="10%" align="left"><font size="+2">หมายเลขพ่อ</font></td>
            <td width="16%" align="left"><font size="+2">&nbsp;<?php echo $result1['num_dad']; ?></font></td>
            <td width="10%" align="left"><font size="+2">หมายเลขแม่</font></td>
            <td width="14%" align="left"><font size="+2">&nbsp;<?php echo $result1['num_mom']; ?></font></td>
         
			

        </tr>
        <br />
    </table>
   
    <table width="31%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="17%" height="45" align="left">
                <font size="+3">ลักษณะการเลี้ยง</font>
            </td>


            <td width="83%" align="left">
<!--                <font size="+2">&nbsp;<?php echo $result1['style']; ?></font>-->
            </td>
        </tr>
    </table>

  <table height="163" border="1">
        <tr>

            <td rowspan="2" height="88" align="center">
                <font size="+2">ผสม <br />ครั้งที่</font>
            </td>
            <td rowspan="2" align="center">
                <font size="+2">วัน เดือน ปี <br />ที่ผสม</font>
            </td>
			<td rowspan="2" align="center">
                <font size="+2">พ่อพันธุ์<br />ที่ใช้ผสม</font>
            </td>
			<td rowspan="2" align="center">
                <font size="+2">อายุ<br />เมื่อผสมพันธุ์</font>
            </td>
			<td rowspan="2" align="center">
                <font size="+2">น้ำหนัก<br />เมื่อผสมพันธุ์</font>
            </td>
			<td rowspan="2" align="center">
                <font size="+2">กำหนดวัน<br />คลอด</font>
            </td>
			<td colspan="3" align="center">
                <font size="+3">ลูกที่เกิด</font>
			</td>
				<td rowspan="2" align="center">
                <font size="+2">หมายเหตุ</font>
            </td>

		</tr>
				<tr><td align="center">
					วันเดือนปี
					</td >
					<td align="center">
					หมายเลข
					</td>
					<td align="center">
					เพศ
					</td>
        </tr>
        <tbody>
            <?php $item = 1;
            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            ?>
                <tr>
					<td align="center">
                        <font size="+2"><?= $item; ?>
                    </td>

                    <td height="60" align="center">
                        <font size="+2"><?php echo $result['date']; ?>
                    </td>

                    <td align="center">
                        <font size="+2"><?php echo $result['name_dad']; ?></font>
                    </td>
					<td align="center">
						<font size="+2"><?php echo $result['old']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['birthchild']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['birthdate']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['birthday']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['number']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['gender']; ?>
						</font>
				  </td>
					<td align="center">
						<font size="+2"><?php echo $result['note']; ?>
						</font>
				  </td>
					
					
			     

          </tr>
                <?php $item++; ?>

            <?php
            }

            ?>
        </tbody>
		

    </table>
	<br /><br />
    <div class="b">
    <p5>ผู้บันทึก.......................................</p5></div>









    <!-- notification message -->
    <!-- <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>

                </h3>

            </div> -->

<?php endif ?>



</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>



<?php

$idP = $result["id"];

$html = ob_get_contents();

$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output("MyPDF.pdf");



ob_end_flush()
?>