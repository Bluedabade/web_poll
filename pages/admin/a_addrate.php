<?php
include("session.php");
$count = isset($_POST['count']) ? intval($_POST['count']): 1;


if(isset($_POST['add'])){
$count++;
}
if(isset($_POST['del'])){
$count--;
}

if(isset($_GET['qt_id'])){
    $_SESSION['qt_id'] = $_GET['qt_id'];
}

if(isset($_POST['submit'])){
    $j = 0;
    foreach($_POST['qst'] as $qst){
        $sql_qs = "INSERT INTO `p_qst`(`qs_qt_id`, `qs_qst`) 
        VALUES ('".$_SESSION['qt_id']."','$qst')";
        $conn->query($sql_qs);
        $j++;
    }
    echo"<script>alert('เพิ่มรายการคำถามแล้ว'); window.location = 'a_rate.php';</script>";
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
    <form action="a_addrate.php" method="post">
        <!-- navbar -->
        <div class="bar">
            <div class="myduck">
                <h3>ผู้สร้างแบบสอบถาม</h3>
            </div>
            <div class="menu">
                <a href="a_index.php" class="active_ ">📝 สร้างแบบสอบถามคำตอบสั้น</a>
                <a href="a_rate.php" class=" active fah">⭐ สร้างแบบประเมิน</a>
                <a href="a_quiz.php" class="active_">✅ สร้างแบบทดสอบ</a>
                <a href="a_profile.php" class="active_">👤 โปรไฟล์</a>
            </div>
            <div class="myadd">
            </div>
        </div>
        <!-- navbar -->
        <div class="kontainer_col mtt-5">
            <!-- card นะจ๊ะ -->

            <!-- card นะจ๊ะ -->
            <div class="bork ">
                <h4>ชื่อหัวข้อ</h4>
                <!-- คำถาม -->
                <?php for($i=0; $i<$count; $i++ ): ?>
                <div class="bork_bork">
                <p>คำถามที่: <?php echo $i+1 ?></p>
                <input value="<?php echo $qst = isset($_POST['qst'][$i])? $_POST['qst'][$i]: '' ?>" type="text" name="qst[]" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                <input hidden type="text" name="count" value="<?php echo $count ?>"; class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>
                </div>
                <!-- คำถาม -->
                <!-- คำตอบ rate -->
                <div class="bork_bork_row">
                    <!-- ⭐ -->
                    <div class="rate">
                        <input type="radio" name="" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."
                            required>
                        <p>น้อยมาก</p>
                    </div>

                    <!-- ⭐⭐ -->
                    <div class="rate">
                        <input type="radio" name="" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."
                            required>
                        <p>น้อย</p>
                    </div>

                    <!-- ⭐⭐⭐ -->
                    <div class="rate">
                        <input type="radio" name="" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."
                            required>
                        <p>ปานกลาง</p>
                    </div>

                    <!-- ⭐⭐⭐⭐ -->
                    <div class="rate">
                        <input type="radio" name="" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."
                            required>
                        <p>ดี</p>
                    </div>

                    <!-- ⭐⭐⭐⭐⭐ -->
                    <div class="rate">
                        <input type="radio" name="" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..."
                            required>
                        <p>ดีมาก</p>
                    </div>

                </div>
                <!-- คำตอบ rate -->

                <!-- ปุ่ม 🔽-->

                <!-- ปุ่ม 🔽-->
                <?php endfor; ?>

            </div>
            <!-- card นะจ๊ะ -->


            <!-- card นะจ๊ะ -->
            <div class="bork ">

                <!-- ปุ่ม 🔽-->
                <div class="bork_bork_bork">
                    <button name="submit" type="submit" class="bro apple">✔ ยืนยันการเพิ่ม</button>
                    <button name="add" type="submit" class="bro fah">+ เพิ่มคำถาม</button>
                    <button name="del" type="submit" type="submit" class="bro staw">❌ ลบคำถาม</button>
                </div>
                <!-- ปุ่ม 🔽-->
            </div>
            <!-- card นะจ๊ะ -->
        </div>
    </form>
</body>

</html>