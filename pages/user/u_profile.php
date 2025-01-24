<?php 
include("session.php"); 
$sql_me = "SELECT * FROM `p_member` WHERE `me_id` = '".$_SESSION['u_id']."'";
$result_me = $conn -> query($sql_me);
$row_me = $result_me->fetch_assoc();  
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
    <form action="../profile.php" method="post" enctype="multipart/form-data">
    <!-- navbar -->
    <div class="bar">
        <div class="myduck">
        <h3>ผู้สร้างแบบสอบถาม</h3>
        </div>
        <div class="menu">
                <a href="a_index.php" class="active_ ">📝 สร้างแบบสอบถามคำตอบสั้น</a>
                <a href="a_rate.php" class="active_">⭐ สร้างแบบประเมิน</a>
                <a href="a_quiz.php" class="active_">✅ สร้างแบบทดสอบ</a>
                <a href="a_profile.php" class="active fah ">👤 โปรไฟล์</a>
        </div>
        <div class="myadd">
        </div>
    </div>
    <!-- navbar -->
        <div class="kontainer ">
            <!-- card นะจ๊ะ -->
            <div class="bork mtt-5">
                <h4>แก้ไขโปรไฟล์</h4>
                <!-- img -->
                <img src="../uploads/<?php echo $row_me['me_img'] ?>" class="b" alt="" id="imgPreview">
                <div class="bork_bork">
                    <p>รูปโปรไฟล์</p>
                    <input type="file" name="img" class="inside" id="imgInput" placeholder="กรุณากรอกข้อมูล...">
                </div>
                <!-- email -->
                 <!-- email -->
                <div class="bork_bork">
                    <p>ชื่อ-นามสกุล</p>
                    <input value="<?php echo $row_me['me_name'] ?>" type="text" name="name" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden type="text" name="role" value="user" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                <!-- email -->
                <div class="bork_bork">
                    <p>อีเมล</p>
                    <input value="<?php echo $row_me['me_email'] ?>" type="email" name="email" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                <!-- password -->
                <div class="bork_bork">
                    <p>รหัสผ่าน</p>
                    <input value="<?php echo $row_me['me_pass'] ?>" type="password" name="pass" class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>
                </div>
                <!-- password -->

                <div class="bork_bork_bork">
                <button type="submit" name="submit" class="bro apple">ยืนยัน</button>
                <a href="logout.php" class="bro staw">🚪 ออกจากระบบ</a>
                </div>
     
            </div>
            <!-- card นะจ๊ะ -->

        </div>
    </form>
</body>

<script>
    document.getElementById('imgInput').addEventListener('change', (e)=>{
    const file = e.target.files[0];
    const preview = document.getElementById('imgPreview');
    preview.style.display = file ? 'block' : 'none';
    if(file) preview.src = URL.createObjectURL(file);
})
</script>

</html>