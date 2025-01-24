<?php
session_start();
include_once("../db.php");
if(isset($_POST['submit'])){
    $qt = $_POST['qt'];
    $qt_type = $_POST['qt_type'];
    $sql_qt = "INSERT INTO `p_qtitle`(`qt_title`, `qt_type`) 
    VALUES ('$qt','$qt_type')";
    if($conn -> query($sql_qt) === true){
        $_SESSION['qt_id'] = mysqli_insert_id($conn);
        echo"<script>alert('เพิ่มหัวข้อคำถามสำเร็จ'); window.location='';</script>";
    }
}   
?>