<?php
session_start();
include_once("../db.php");
if(isset($_POST['submit'])){
    switch ($_POST['role']) {
        case 'admin':
            $me_id = $_SESSION['a_id'];
            $role = $_POST['role'];
            $path = "$role/a_profile.php";
            break;
        case 'user':
            $me_id = $_SESSION['u_id'];
            $role = $_POST['role'];
            $path = "$role/u_profile.php";
            break;
        
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $temp = explode('.', $_FILES['img']['name']);
    $filename = rand() . '.' . end($temp);
    $filepath = "uploads/" . $filename;

    if(move_uploaded_file($_FILES['img']['tmp_name'], $filepath)){
        $sql_ins = "UPDATE `p_member` 
        SET `me_name`='$name'
        ,`me_email`='$email'
        ,`me_pass`='$pass'
        ,`me_img`='$filename'
         WHERE `me_id` = '$me_id' ";
        
    }
    else{
        $sql_ins = "UPDATE `p_member` 
        SET `me_name`='$name'
        ,`me_email`='$email'
        ,`me_pass`='$pass'
         WHERE `me_id` = '$me_id' ";
    }
    if($conn -> query($sql_ins) === true){
        echo"<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location='$path';</script>";
    }
    
}   
?>