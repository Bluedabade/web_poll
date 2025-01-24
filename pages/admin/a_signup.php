<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>
    <form action="../signup.php" method="post" enctype="multipart/form-data">
        <div class="kontainer ">
            <!-- card นะจ๊ะ -->
            <div class="bork mtt-5">
                <h4>สมัครสมาชิก</h4>
                <!-- img -->
                 <img src="" class="b" alt="" id="imgPreview">
                <div class="bork_bork">
                    <p>รูปโปรไฟล์</p>
                    <input type="file" name="img" class="inside" id="imgInput" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                 <!-- email -->
                <div class="bork_bork">
                    <p>ชื่อ-นามสกุล</p>
                    <input type="text" name="name" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden type="text" name="role" value="admin" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                <!-- email -->
                <div class="bork_bork">
                    <p>อีเมล</p>
                    <input type="email" name="email" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                <!-- password -->
                <div class="bork_bork">
                    <p>รหัสผ่าน</p>
                    <input type="password" name="pass" class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>
                </div>
                <!-- password -->

                <div class="bork_bork_bork">
                <button type="submit" name="submit" class="bro apple">ยืนยัน</button>
                <a href="a_login.php" class="bro staw">กลับ</a>
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