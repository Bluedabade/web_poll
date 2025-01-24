<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>
<form action="../login.php" method="post" enctype="multipart/form-data">
        <div class="kontainer ">
            <!-- card นะจ๊ะ -->
            <div class="bork mtt-5">
                <h4>ล็อกอินเข้าสู่ระบบ</h4>
                <!-- email -->
                <div class="bork_bork">
                    <p>อีเมล</p>
                    <input type="email" name="email" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                    <input hidden type="text" name="role" value="user" class="inside" id="" placeholder="กรุณากรอกข้อมูล..." required>
                </div>
                <!-- email -->
                <!-- password -->
                <div class="bork_bork">
                    <p>รหัสผ่าน</p>
                    <input type="password" name="pass" class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>
                </div>
                <!-- password -->

                <div class="bork_bork_bork">
                <button type="submit" name="submit" class="bro apple">เข้าสู่ระบบ</button>
                <a href="u_signup.php" class="bro fah">สมัครสมาชิก</a>
                <a href="../../index.php" class="bro staw">กลับ</a>
                </div>
     
            </div>
            <!-- card นะจ๊ะ -->

        </div>
    </form>
</body>

</html>