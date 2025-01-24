<?php 
include("session.php"); 
$sql_qt = "SELECT * FROM `p_qtitle` WHERE `qt_id` = '".$_SESSION['qt_id']."';";
$result_qt = $conn->query($sql_qt);
$row_qt = $result_qt-> fetch_assoc();
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
    <form action="" method="post">
           <!-- navbar -->
    <div class="bar">
        <div class="myduck">
        <h3>ผู้ทำแบบสอบถาม</h3>
        </div>
        <div class="menu">
                <a href="u_index.php" class="active fah">📝 แบบสอบถามคำตอบสั้น</a>
                <a href="u_rate.php" class="active_">⭐ แบบประเมิน</a>
                <a href="u_quiz.php" class="active_">✅ แบบทดสอบ</a>
                <a href="u_profile.php" class="active_">👤 โปรไฟล์</a>
        </div>
        <div class="myadd">
        </div>
    </div>
    <!-- navbar -->
        <div class="kontainer_col mtt-5">
        <!-- ชื่อหัวข้อฟอร์ม -->
        <h4 class="head"><?php echo $row_qt['qt_title'] ?></h4>
        <!-- ชื่อหัวข้อฟอร์ม -->

            <!-- card นะจ๊ะ -->
            <div class="bork ">
                <!-- คำถาม -->
                <?php
                $sum = 0;
                $i = 0;
                $sql_qsa = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '".$_SESSION['qt_id']."' AND `ma_me_id` = '".$_SESSION['u_id']."'";
                $result_qsa = $conn -> query($sql_qsa);
                while($row_qsa = $result_qsa->fetch_assoc()):
                ?>
                <div class="bork_bork">
                    <p><?php echo $row_qsa['ma_qs_qst'] ?></p>
                </div>
                <!-- คำถาม -->
                <!-- คำตอบ -->
                <div class="bork_bork">
                    <?php
                    if($row_qsa['ma_qs_ans'] == $row_qsa['ma_me_ans']){
                        $sum++;
                    }
                    ?>
                    <p class="wrong">คำตอบของคุณ: <?php echo $row_qsa['ma_me_ans'] ?> <?php echo $cor = $row_qsa['ma_qs_ans'] == $row_qsa['ma_me_ans'] ? 'ถูกต้อง' : 'ผิด' ?></p>
                </div>
                <!-- คำตอบ -->
                <?php endwhile; ?>
                <p class="wrong">คะแนนรวม: <?php echo $sum ?> </p>
            </div>
            <!-- card นะจ๊ะ -->
            
 <!-- card นะจ๊ะ -->
 <div class="bork ">
              
                <!-- ปุ่ม 🔽-->
                <div class="bork_bork_bork">
                    <a href="u_index.php" type="submit" class="bro staw">◀ กลับ</a>
                </div>
                <!-- ปุ่ม 🔽-->
            </div>
            <!-- card นะจ๊ะ -->
        </div>
    </form>
</body>

</html>