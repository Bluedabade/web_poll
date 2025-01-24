<?php 
include("session.php"); 
$sum = 0;
if(isset($_GET['qt_id'])){
    $_SESSION['qt_id'] = $_GET['qt_id'];
}
$me_id = $_SESSION['u_id'];
if(isset($_POST['submit'])){
    $j = 0;
    $sumpoints = 0;
    $qt_id = $_SESSION['qt_id'];


    $sql_qs = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '$qt_id' AND `ma_me_id` = '$me_id' ;";
    $result_qs = $conn -> query($sql_qs);
    $row_qs = $result_qs -> fetch_assoc();
    
    if(!empty($row_qs)){
        $sql_del = "DELETE FROM `p_me_ans` WHERE `ma_qt_id` = '$qt_id'  AND `ma_me_id`= '$me_id';";
        $conn-> query($sql_del);
    }

    foreach($_POST['qs_id'] as $qs_id){
        $me_ans = $_POST['me_ans'][$j]; 
        $qs_qst = $_POST['qs_qst'][$j]; 
        $sum = $sum + intval($me_ans);
        $sql_me_ans = "INSERT INTO `p_me_ans`(`ma_qt_id`, `ma_qs_id`, `ma_qs_qst` ,`ma_me_id`, `ma_me_ans`) 
        VALUES ('$qt_id','$qs_id','$qs_qst','$me_id','$me_ans')";
        $conn -> query($sql_me_ans);
        $j++;
    }
    $argv = $sum / $j;

    $sql_me_pt = "SELECT * FROM `p_me_points` WHERE `mp_qt_id` = '$qt_id' AND `mp_me_id` = '$me_id';";
    $result_me_pt = $conn -> query($sql_me_pt);
    $row_me_pt = $result_me_pt -> fetch_assoc();
    if(!empty($row_me_pt)){
        $sql_pt = "UPDATE `p_me_points` 
        SET `mp_me_points`='$argv'
        WHERE `mp_qt_id` = '$qt_id' AND `mp_me_id` = '$me_id';";
        $conn -> query($sql_pt);
    }else{
        $sql_pt = "INSERT INTO `p_me_points`(`mp_qt_id`, `mp_me_id`, `mp_me_points`) 
        VALUES ('$qt_id','$me_id','$argv')";
        $conn -> query($sql_pt);
    }
    unset($_SESSION['qt_id']);

    echo"<script>alert('ส่งคำตอบแล้ว'); window.location = 'u_rate.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้สร้างแบบสอบถาม</title>
    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>
    <form action="u_dorate.php" method="post">
        <!-- navbar -->
        <div class="bar">
            <div class="myduck">
                <h3>ผู้ทำแบบสอบถาม</h3>
            </div>
            <div class="menu">
                <a href="u_index.php" class="active_">📝 แบบสอบถามคำตอบสั้น</a>
                <a href="u_rate.php" class=" active fah">⭐ แบบประเมิน</a>
                <a href="u_quiz.php" class="active_">✅ แบบทดสอบ</a>
                <a href="u_profile.php" class="active_">👤 โปรไฟล์</a>
            </div>
            <div class="myadd">
            </div>
        </div>
        <!-- navbar -->
        <div class="kontainer_col mtt-5">
            <h4 class="head">ชื่อหัวข้อ</h4>

            <!-- card นะจ๊ะ -->
            <div class="bork ">
                <?php
                $i = 0;
                $sql_qsa = "SELECT * FROM `p_qst` WHERE `qs_qt_id` = '".$_SESSION['qt_id']."'";
                $result_qsa = $conn -> query($sql_qsa);
                while($row_qsa = $result_qsa->fetch_assoc()):
                ?>
                <!-- คำถาม -->
                <div class="bork_bork">
                    <p>คำถามที่
                        <?php echo $i+1 ?>
                        <?php echo $row_qsa['qs_qst'] ?>
                    </p>
                    <input hidden value="<?php echo $row_qsa['qs_id'] ?>" type="text" name="qs_id[]" class="inside"id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden value="<?php echo $row_qsa['qs_qst'] ?>" type="text" name="qs_qst[]" class="inside"id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- คำถาม -->
                <!-- คำตอบ rate -->
                <div class="bork_bork_row">
                    <?php for($p=1; $p <= 5; $p++): ?>
                    <!-- ⭐ -->
                    <div class="rate">
                        <input value="<?php echo $p ?>" type="radio" name="me_ans[<?php echo $i ?>]"
                            class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..." required>
                        <p>
                            <?php
                        switch ($p) {
                            case '1': echo "น้อยมาก"; break;
                            case '2': echo "น้อย"; break;
                            case '3': echo "ปานกลาง"; break;
                            case '4': echo "มาก"; break;
                            case '5': echo "มากที่สุด"; break;
                            
                        }
                     ?>
                        </p>
                    </div>
                    <?php endfor; ?>



                </div>
                <!-- คำตอบ rate -->
                <?php
                $i++;
            endwhile; ?>


            </div>
            <!-- card นะจ๊ะ -->


            <!-- card นะจ๊ะ -->
            <div class="bork ">

                <!-- ปุ่ม 🔽-->
                <div class="bork_bork_bork">
                    <button type="submit" name="submit" class="bro fah">✔ เสร็จสิ้น</button>

                    <a href="u_rate.php" type="submit" class="bro staw">❌ ยกเลิก</a>
                </div>
                <!-- ปุ่ม 🔽-->
            </div>
            <!-- card นะจ๊ะ -->
        </div>
    </form>
</body>

</html>