<?php
session_start();
unset($_SESSION['a_id']);
echo"<script>alert('กรุณาเข้าสู่ระบบ'); window.location='a_login.php';</script>";
?>