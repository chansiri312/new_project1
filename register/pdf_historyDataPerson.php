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

    div.b {
        text-align: left;
    }

    div.c {
        text-align: right;
    }
</style>


</head>

<body>

    <?php

    if ($_GET['number'] != '') {

        $sql = "select * from historyDataPerson where number = '" . $_GET['number'] . "'";

        $query = mysqli_query($conn, $sql);

        //  echo $sql;
    } else {


        $sql = "select * from historyDataPerson  where recorder_name = '" . $_SESSION['username'] . "'";

        $query = mysqli_query($conn, $sql);
    }


    $sql1 = "select * from historyDataPerson  where number = '" . $_GET['number'] . "'";

    $query1 = mysqli_query($conn, $sql1);
    $result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);


    ?>
    <div class="b">
        <p5>มกษ. 6408-2552</p5>
    </div>





    <table>
        <tr>
            <td align="center">
                <font size="+2"><b>แบบบันทึกข้อมูลประวัติการให้ผลผลิต (รายตัว)</b></font>
            </td>
        </tr>

    </table>



    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>


            <td width="14%" height="45" align="left">
                <font size="+2">หมายเลขประจำตัว </font>
            </td>

            <td width="20%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['number']; ?></font>
            </td>


            <td width="15%" align="left">
                <font size="+2">ครั้งที่ของการให้นม</font>
            </td>
            <td width="51%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['num_milk']; ?></font>
            </td>

        </tr>
        <br />
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="7%" height="45" align="left">
                <font size="+2">ผู้บันทึก </font>
            </td>


            <td width="93%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['recoder']; ?></font>
            </td>

    </table>
    <table width="31%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="17%" height="45" align="left">
                <font size="+3">ลักษณะการเลี้ยง</font>
            </td>


            <td width="83%" align="left">
                <font size="+2">&nbsp;<?php echo $result1['style']; ?></font>
            </td>
        </tr>
    </table>

    <table height="163" border="1">
        <tr>

            <td rowspan="2" height="88" align="center">
                <font size="+2">วัน เดือน ปี</font>
            </td>
            <td rowspan="2" align="center">
                <font size="+2">หมายเลขเเพะ</font>
            </td>
            <td colspan="3" align="center">
                <font size="+3">ปริมาณน้ำนม</font>
            </td>
            <td rowspan="2" align="center">
                <font size="+2">หมายเหตุ</font>
            </td>

        </tr>
        <tr>
            <td align="center">
                เช้า
            </td>
            <td align="center">
                เย็น
            </td>
            <td align="center">
                รวม
            </td>
        </tr>
        <tbody>
            <?php $item = 1;
            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            ?>
                <tr>

                    <td height="60" align="center">
                        <font size="+2"><?php echo $result['date']; ?>
                    </td>

                    <td align="center">
                        <font size="+2"><?php echo $result['number']; ?></font>
                    </td>
                    <td align="center">
                        <font size="+2"><?php echo $result['milk_morning']; ?>
                        </font>
                    </td>
                    <td align="center">
                        <font size="+2"><?php echo $result['milk_evening']; ?>
                        </font>
                    </td>
                    <td align="center">
                        <font size="+2"><?php echo $result['tatal_milk']; ?>
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
    <div class="c">
        <p5>ผู้บันทึก.......................................</p5>
    </div>









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