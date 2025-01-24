<?php 
include("session.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ทำแบบสอบถาม</title>
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
                <a href="u_index.php" class="active_ ">📝 แบบสอบถามคำตอบสั้น</a>
                <a href="u_rate.php" class=" active fah">⭐ แบบประเมิน</a>
                <a href="u_quiz.php" class="active_">✅ แบบทดสอบ</a>
                <a href="u_profile.php" class="active_">👤 โปรไฟล์</a>
        </div>
        <div class="myadd">
        </div>
    </div>
    <!-- navbar -->
    <div class="kontainer_col mtt-5">
<?php
        $sql_qt = "SELECT * FROM `p_qtitle` WHERE `qt_type` = 'rate';";
        $result_qt = $conn->query($sql_qt);
        while($row_qt = $result_qt-> fetch_assoc()):
        $sql_pt = "SELECT * FROM `p_me_points` WHERE `mp_qt_id` = '".$row_qt['qt_id']."' AND `mp_me_id` = '".$_SESSION['u_id']."' ";
        $result_pt = $conn->query($sql_pt);
        $row_pt = $result_pt-> fetch_assoc();
        if(empty($row_pt)):
        ?>
       <!-- card นะจ๊ะ -->
        
       <div class="bork  ">
                <!-- ชื่อแบบฟอร์ม -->
                <h4><?php echo $row_qt['qt_title'] ?></h4>
                <div class="bork_bork_bork">
                <a href="u_dorate.php?qt_id=<?php echo $row_qt['qt_id'] ?>" class="bro fah ">🖊 ทำแบบสอบถาม</a>
                <!-- <a href="a_score.php"  class="bro warm">✨ดูคะแนนรวม✨</a> -->
                </div>
        </div>
        <?php elseif(!empty($row_pt)): ?>
            <!-- card นะจ๊ะ -->


              <!-- card นะจ๊ะ -->
             <div class="bork do ">
                <!-- ชื่อแบบฟอร์ม -->
                <h4>ชื่อแบบฟอร์ม</h4>
                <div class="bork_bork_bork">
                <a href="u_dorate.php?qt_id=<?php echo $row_qt['qt_id'] ?>" class="bro fah ">🖊 ทำแบบสอบถาม</a>
                <!-- คะแนน🥇 -->
                <p>ค่าเฉลี่ย: <?php echo $row_pt['mp_me_points'] ?> คะแนน</p>
                <!-- คะแนน🥇 -->
                <!-- <a href="a_score.php"  class="bro warm">✨ดูคะแนนรวม✨</a> -->
                </div>
            </div>
            <?php endif ?>
            <!-- card นะจ๊ะ -->
            <?php endwhile; ?>          
</div>
</form>
</body>
</html>

<!-- class do คือทำแล้ว -->