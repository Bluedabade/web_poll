<?php
session_start();
include_once("../../db.php");

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
        $ans = $_POST['ans'][$j];
        $sql_qs = "INSERT INTO `p_qst`(`qs_qt_id`, `qs_qst`, `qs_ans`) 
        VALUES ('".$_SESSION['qt_id']."','$qst','$ans')";
        $conn->query($sql_qs);
        $j++;
    }
    echo"<script>alert('เพิ่มรายการคำถามแล้ว'); window.location='';</script>";
}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<?php for($i=0; $i<$count; $i++ ): ?>
<input hidden type="text" name="count" value="<?php echo $count ?>"; class="inside" id=""placeholder="กรุณากรอกข้อมูล..."  required>
<input type="text" name="qst[]" value="<?php echo $qst = isset($_POST['qst'][$i])? $_POST['qst'][$i]: '' ?>"; class="inside" id=""placeholder="คำถาม..."  required><br><br>
<input type="text" name="ans[]" value="<?php echo $qst = isset($_POST['ans'][$i])? $_POST['ans'][$i]: '' ?>"; class="inside" id=""placeholder="คำตอบ..."  required><br><br>
<?php endfor; ?>
<button type="submit" name="add" class="bro apple">เพิ่ม</button>
<button type="submit" name="del" class="bro apple">ลบ</button>
<button type="submit" name="submit" class="bro apple">ยืนยัน</button>

</form>
</body>
</html>