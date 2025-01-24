<?php
session_start();
include_once("../../db.php");
if(!$_SESSION['a_id']){
    echo"<script>alert('กรุณาเข้าสู่ระบบ'); window.location='a_login.php';</script>";
}
?>