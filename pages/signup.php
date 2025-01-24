<?php
include_once("../db.php");
if(isset($_POST['submit'])){
    switch ($_POST['role']) {
        case 'admin':
            $role = $_POST['role'];
            $path = "$role/a_login.php";
            break;
        case 'user':
            $role = $_POST['role'];
            $path = "$role/u_login.php";
            break;
        
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $temp = explode('.', $_FILES['img']['name']);
    $filename = rand() . '.' . end($temp);
    $filepath = "uploads/" . $filename;

    $sql_me = "SELECT * FROM `p_member` WHERE `me_email` = '$email'";
    $result_me = $conn -> query($sql_me);
    $row_me = $result_me->fetch_assoc();
    if(empty($row_me)){
        if(move_uploaded_file($_FILES['img']['tmp_name'], $filepath)){
            $sql_me = "INSERT INTO `p_member`(`me_name`, `me_email`, `me_pass`, `me_img`, `me_role`) 
            VALUES ('$name','$email','$pass','$filename','$role')";
            if($conn -> query($sql_me) === true){
                echo"<script>alert('สมัครใช้งานสำเร็จ'); window.location='$path';</script>";
            }else{
                echo"<script>alert('มีที่อยู่อีเมลนี้อยู่แล้ว'); window.history.back();</script>";
            }
        }
    }else{
        echo"<script>alert('มีที่อยู่อีเมลนี้อยู่แล้ว'); window.history.back();</script>";
    }
} else{
    echo"<script>alert('มีที่อยู่อีเมลนี้อยู่แล้ว'); window.history.back();</script>";
}  
?>