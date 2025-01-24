<?php
session_start();
include_once("../db.php");
if(isset($_POST['submit'])){
    switch ($_POST['role']) {
        case 'admin':
            $role = $_POST['role'];
            $path = "$role/a_index.php";
            break;
        case 'user':
            $role = $_POST['role'];
            $path = "$role/u_index.php";
            break;
        
    }
    $email = $_POST['email'];
    $pass = $_POST['pass'];



    $sql_me = "SELECT * FROM `p_member` WHERE `me_email` = '$email'";
    $result_me = $conn -> query($sql_me);
    $row_me = $result_me->fetch_assoc();
    if(!empty($row_me) && $row_me['me_pass'] == $pass){
        switch ($role) {
            case 'admin':
                $_SESSION['a_id'] = $row_me['me_id'];
                echo"<script>alert('เข้าสู่ระบบสำเร็จ'); window.location='$path';</script>";
                break;
            case 'user':
                $_SESSION['u_id'] = $row_me['me_id'];
                echo"<script>alert('เข้าสู่ระบบสำเร็จ'); window.location='$path';</script>";
                break;
            
        }
    }else{
        echo"<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิด'); window.history.back();</script>";
    }

}   
?>