<?php 
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
                <div class="bork_bork_bork">
                <a href="a_index.php" class="bro staw">กลับ</a>
                </div>
            </div>
            <!-- card นะจ๊ะ -->
             
</div>
</form>
</body>
</html>