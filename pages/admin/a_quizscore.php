<?php 
$n =0;
$o =0;
$pop[] = 0;
include("session.php"); 
if(isset($_GET['qt_id'])){
    $_SESSION['qt_id'] = $_GET['qt_id'];
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
    <form action="" method="post">
    <!-- navbar -->
    <div class="bar">
        <div class="myduck">
        <h3>ผู้สร้างแบบสอบถาม</h3>
        </div>
        <div class="menu">
                <a href="a_index.php" class="active_ ">📝 สร้างแบบสอบถามคำตอบสั้น</a>
                <a href="a_rate.php" class="active_">⭐ สร้างแบบประเมิน</a>
                <a href="a_quiz.php" class="active_">✅ สร้างแบบทดสอบ</a>
                <a href="a_profile.php" class="active_">👤 โปรไฟล์</a>
        </div>
        <div class="myadd">
        </div>
    </div>
    <!-- navbar -->
<div class="kontainer_col mtt-5">
    <?php
    $sql_qt = "SELECT * FROM `p_qtitle` WHERE `qt_id` = '".$_SESSION['qt_id']."';";
    $result_qt = $conn->query($sql_qt);
    $row_qt = $result_qt-> fetch_assoc();
    ?>
<h4><?php echo $row_qt['qt_title'] ?></h4>

    <table>
        <thead>
            <tr>
            <th>รูปโปรไฟล์</th>
                <th>ชื่อ-นามสกุล</th>
                <th>คะแนน</th>
                <th>คะแนนเต็ม</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql_sum = "SELECT * FROM `p_me_points` WHERE `mp_qt_id` = '".$_SESSION['qt_id']."'";
                $result_sum = $conn->query($sql_sum);
                while($row_sum = $result_sum-> fetch_assoc()):
            ?>
            <tr>
            <?php
                $sql_me = "SELECT * FROM `p_member` WHERE `me_id` = '".$row_sum['mp_me_id']."'";
                $result_me = $conn -> query($sql_me);
                $row_me = $result_me->fetch_assoc();  
                ?>
                <td ><div class="center"> <img src="../uploads/<?php echo $row_me['me_img'] ?>" alt="" class="a"></div></td>
                <td ><div class="center"><?php echo $row_me['me_name'] ?></div></td>
                <td ><div class="center"><?php echo $row_sum['mp_me_points'] ?></div></td>
                <?php
                $sql_full = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '".$_SESSION['qt_id']."' AND `ma_me_id` = '".$_SESSION['u_id']."'";
                $result_full = $conn -> query($sql_full); 
                $full = mysqli_num_rows($result_full);
                ?>
                <td ><div class="center"><?php echo $full ?></div></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                
            </tr>
        </tfoot>
    </table>

    <!-- card นะจ๊ะ -->
    <div class="bork ">
    <p>คำตอบส่วนใหญ่ในแต่ละคำถาม</p>

                <!-- quiz -->
                <!-- คำถาม -->
                <?php
                $i = 0;
                $sql_qsa = "SELECT * FROM `p_qst` WHERE `qs_qt_id` = '".$_SESSION['qt_id']."'";
                $result_qsa = $conn -> query($sql_qsa);
                while($row_qsa = $result_qsa->fetch_assoc()):
                ?>
                <div class="bork_bork">



                    <p>คำถามที่:<?php echo $i+1 ?>
                        <?php echo $row_qsa['qs_qst'] ?></p>
                        <input hidden value="<?php echo $row_qsa['qs_id'] ?>" type="text" name="qs_id[]" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden value="<?php echo $row_qsa['qs_qst'] ?>" type="text" name="qs_qst[]" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden value="<?php echo $row_qsa['qs_ans'] ?>" type="text" name="qs_ans[]" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>

                </div>
                <!-- คำถาม -->
                <!-- คำตอบ quiz -->
                <div class="bork_bork_col">
                    <?php
                    $sql_op = "SELECT * FROM `p_qst_op` WHERE `qo_qs_id` = '".$row_qsa['qs_id']."'";
                    $result_op = $conn -> query($sql_op);
                    while($row_op = $result_op->fetch_assoc()):
        
                        $sql_sum1 = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '".$_SESSION['qt_id']."' AND `ma_me_ans` = '".$row_op['qo_op']."' AND `ma_qs_id` ='".$row_op['qo_qs_id']."' ";
                        $result_sum1 = $conn->query($sql_sum1);
                        $row_sum1 = $result_sum1-> fetch_assoc();
                        $sum = mysqli_num_rows($result_sum1);
                        
        
                    ?>
                    <!-- ข้อ 1 -->
                    <div class="quiz">
                        <input type="radio" value = "<?php echo $row_op['qo_op'] ?>" name="me_ans[<?php echo $i ?>]" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."required>
                    <p><?php echo $row_op['qo_op'] ?>       จำนวนการตอบ <?php echo $sum ?></p>
                    </div>
                    <?php
                    $n++;
            endwhile; ?>


                </div>
                <!-- คำตอบ quiz -->
                <?php
                $i++;
            endwhile; ?>
            </div>
            <!-- card นะจ๊ะ -->
              <!-- card นะจ๊ะ -->
             <div class="bork ">
                <div class="bork_bork_bork">
                <a href="a_index.php" class="bro staw">กลับ</a>
                </div>
            </div>
            <!-- card นะจ๊ะ -->
             
</div>
</form>
</body>
</html>