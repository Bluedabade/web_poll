<?php
session_start();
unset($_SESSION['u_id']);
echo"<script>alert('กรุณาเข้าสู่ระบบ'); window.location='u_login.php';</script>";
?>