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
    $l = 1;

        $sql_qs = "INSERT INTO `p_qst`(`qs_qt_id`, `qs_qst`) 
        VALUES ('".$_SESSION['qt_id']."','$qst')";
        $conn->query($sql_qs);
        $qs_id = mysqli_insert_id($conn);

        foreach($_POST['ans_op'] as $ans_op){
            if($_POST['ans'][$j] == $l){
                $ans = $ans_op;
            }

            $sql_op = "INSERT INTO `p_qst_op`(`qo_qt_id`, `qo_qs_id`, `qo_op`) 
            VALUES ('".$_SESSION['qt_id']."','$qs_id','$ans_op')";
            $conn -> query($sql_op);
            $l++;
        }
        $sql_qs_ans = "UPDATE `p_qst` SET `qs_ans`='$ans' WHERE `qs_id` = '$qs_id'";
        $conn->query($sql_qs_ans);
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
    <form action="" method="post">
        <!-- navbar -->
        <div class="bar">
            <div class="myduck">
                <h3>ผู้สร้างแบบสอบถาม</h3>
            </div>
            <div class="menu">
                <a href="a_index.php" class="active_ ">📝 สร้างแบบสอบถามคำตอบสั้น</a>
                <a href="a_rate.php" class=" active_">⭐ สร้างแบบประเมิน</a>
                <a href="a_quiz.php" class="  active fah">✅ สร้างแบบทดสอบ</a>
                <a href="a_profile.php" class="active_">👤 โปรไฟล์</a>
            </div>
            <div class="myadd">
            </div>
        </div>
        <!-- navbar -->
        <div class="kontainer_col mtt-5">
            <!-- card นะจ๊ะ -->
            <div class="bork ">
            <h4>ชื่อหัวข้อ</h4>
            <?php for($i=0; $i<$count; $i++ ): ?>
                <input hidden type="text" name="count" value="<?php echo $count ?>"; class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>

                <!-- quiz -->
                <!-- คำถาม -->
                <div class="bork_bork">
                    <p>คำถามที่: <?php echo $i+1 ?></p>
                    <input value="<?php echo $qst = isset($_POST['qst'][$i])? $_POST['qst'][$i]: '' ?>" type="text" name="qst[]" class="inside" id="" placeholder="กรุณากรอกข้อมูล...">
                </div>
                <!-- คำถาม -->
                <!-- คำตอบ quiz -->
                <div class="bork_bork_col">
                    <!-- ข้อ 1 -->
                     <?php for($k=0; $k<=3; $k++ ): ?>
                        <div class="quiz">
                            <input value="<?php echo $k+1 ?>" type="radio" name="ans[<?php echo $i ?>]" class="inside_radio" id="" placeholder="กรุณากรอกข้อมูล..." required>
                            <input type="text" name="ans_op[<?php echo $k ?>]" class="" id="" placeholder="กรุณากรอกข้อมูล...">
                        </div>
                     <?php endfor; ?>
                     
              
                <?php endfor; ?>
                   
                </div>
          <!-- คำตอบ quiz -->
                <!-- ปุ่ม 🔽-->
                <!-- ปุ่ม 🔽-->

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