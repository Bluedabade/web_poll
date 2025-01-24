<?php 
$sum = 0;
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
                <th>คำถาม</th>
                <th>คำตอบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql_sum = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '".$_SESSION['qt_id']."'";
                $result_sum = $conn->query($sql_sum);
                $i =0;
                while($row_sum = $result_sum-> fetch_assoc()):
            ?>
            <tr>
            <?php
                $sql_me = "SELECT * FROM `p_member` WHERE `me_id` = '".$row_sum['ma_me_id']."'";
                $result_me = $conn -> query($sql_me);
                $row_me = $result_me->fetch_assoc();  
                ?>
                <td ><div class="center"> <img src="../uploads/<?php echo $row_me['me_img'] ?>" alt="" class="a"></div></td>
                <td ><div class="center"><?php echo $row_me['me_name'] ?></div></td>
                <td ><div class="center"><?php echo $row_sum['ma_qs_qst'] ?></div></td>
                <?php
                $sql_full = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '".$_SESSION['qt_id']."' AND `ma_me_id` = '".$_SESSION['u_id']."'";
                $result_full = $conn -> query($sql_full); 
                $full = mysqli_num_rows($result_full);
                ?>
                <td ><div class="center"><?php
                $sum = $sum + intval($row_sum['ma_me_ans']);
                switch ($row_sum['ma_me_ans']) {
                            case '1': echo "น้อยมาก"; break;
                            case '2': echo "น้อย"; break;
                            case '3': echo "ปานกลาง"; break;
                            case '4': echo "มาก"; break;
                            case '5': echo "มากที่สุด"; break; 
                        }  ?></div></td>
            </tr>
            <?php
            $i++;
        endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                
            </tr>
        </tfoot>
    </table>
              <!-- card นะจ๊ะ -->
             <div class="bork ">
                <div class="bork_bork_bork">
                <h4>คะแนนเฉลี่ยทั้งหมด: <?php echo $sum/$i ?></h4>
                <div class="bork_bork_row">
                    <!-- ⭐ -->
                    <div class="rate">
                        <p>1 น้อยมาก</p>
                    </div>

                    <!-- ⭐⭐ -->
                    <div class="rate">
                        <p>2 น้อย</p>
                    </div>

                    <!-- ⭐⭐⭐ -->
                    <div class="rate">
                        <p>3 ปานกลาง</p>
                    </div>

                    <!-- ⭐⭐⭐⭐ -->
                    <div class="rate">
                        <p>4 ดี</p>
                    </div>

                    <!-- ⭐⭐⭐⭐⭐ -->
                    <div class="rate">
                        <p>5 ดีมาก</p>
                    </div>

                </div>
                <a href="a_index.php" class="bro staw">กลับ</a>
                </div>
            </div>
            <!-- card นะจ๊ะ -->
             
</div>
</form>
</body>
</html>