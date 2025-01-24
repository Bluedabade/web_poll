<?php 
include("session.php");
if(isset($_POST['submit'])){
    $qt = $_POST['qt'];
    $qt_type = $_POST['qt_type'];
    $sql_qt = "INSERT INTO `p_qtitle`(`qt_title`, `qt_type`) 
    VALUES ('$qt','$qt_type')";
    if($conn -> query($sql_qt) === true){
        $_SESSION['qt_id'] = mysqli_insert_id($conn);
        echo"<script>alert('เพิ่มหัวข้อคำถามสำเร็จ'); window.location='a_index.php';</script>";
    }
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
                <a href="a_index.php" class="active fah">📝 สร้างแบบสอบถามคำตอบสั้น</a>
                <a href="a_rate.php" class="active_">⭐ สร้างแบบประเมิน</a>
                <a href="a_quiz.php" class="active_">✅ สร้างแบบทดสอบ</a>
                <a href="a_profile.php" class="active_">👤 โปรไฟล์</a>
        </div>
        <div class="myadd">
        </div>
    </div>
    <!-- navbar -->
<div class="kontainer_col mtt-5">
       <!-- card นะจ๊ะ -->
       <div class="bork ">
                <h4>สร้างแบบฟอร์ม</h4>
                <!-- ชื่อแบบฟอร์ม -->
                <div class="bork_bork">
                    <p>ชื่อแบบฟอร์ม</p>
                    <input type="text" name="qt" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden type="text" name="qt_type" value ="single" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- ชื่อแบบฟอร์ม -->
                

                <div class="bork_bork_bork">
                <button type="submit" name="submit" class="bro apple">✔ ยืนยัน</button>
                </div>
     
            </div>
            <!-- card นะจ๊ะ -->
              <!-- card นะจ๊ะ -->
        <?php
        $sql_qt = "SELECT * FROM `p_qtitle` WHERE `qt_type` = 'single';";
        $result_qt = $conn->query($sql_qt);
        while($row_qt = $result_qt-> fetch_assoc()):
        ?>
             <div class="bork ">
                <h4><?php echo $row_qt['qt_title'] ?></h4> 
                <div class="bork_bork_bork">
                <?php 
                    $sql_qs = "SELECT * FROM `p_qst` WHERE `qs_qt_id` = '".$row_qt['qt_id']."' ";
                    $result_qs = $conn->query($sql_qs);
                    $row_qs = $result_qs-> fetch_assoc();
                ?>
                <?php if(empty($row_qs)): ?>
                <a href="a_addsingle.php?qt_id=<?php echo $row_qt['qt_id'] ?>" class="bro fah">📝 เพิ่มคำถาม</a>
                <?php elseif(!empty($row_qs)): ?>
                <a href="a_score.php?qt_id=<?php echo $row_qt['qt_id'] ?>"  class="bro warm">✨ดูคะแนนรวม✨</a>
                <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
            <!-- card นะจ๊ะ -->
             
</div>
</form>
</body>
</html>