<?php
session_start();
include_once("../db.php");


if(isset($_GET['qt_id'])){
    $_SESSION['qt_id'] = $_GET['qt_id'];
}

if(isset($_POST['submit'])){
    $j = 0;
    $sumpoints = 0;
    $qt_id = $_SESSION['qt_id'];
    $me_id = $_SESSION['u_id'];

    $sql_qs = "SELECT * FROM `p_me_ans` WHERE `ma_qt_id` = '$qt_id' AND `ma_me_ans` = '$me_id' ;";
    $result_qs = $conn -> query($sql_qs);
    $row_qs = $result_qs -> fetch_assoc();
    
    if(!empty($row_qs)){
        $sql_del = "DELETE FROM `p_me_ans` WHERE `ma_qt_id` = '$qt_id'  AND `ma_me_ans`= '$me_id';";
        $conn-> query($sql_del);
    }

    foreach($_POST['qs_id'] as $qs_id){
        $qs_qst = $_POST['qs_qst'][$j];
        $qs_ans = $_POST['qs_ans'][$j];
        $me_ans = $_POST['me_ans'][$j];
        if($qs_ans == $me_ans){
            $sumpoints++;
        }  
        $sql_me_ans = "INSERT INTO `p_me_ans`(`ma_qt_id`, `ma_qs_id`, `ma_qs_qst`, `ma_qs_ans`, `ma_me_id`, `ma_me_ans`) 
        VALUES ('$qt_id','$qs_id','$qs_qst','$qs_ans','$me_id','$me_ans')";
        $conn -> query($sql_me_ans);
        $j++;
    }

    $sql_me_pt = "SELECT * FROM `p_me_points` WHERE `mp_qt_id` = '$qt_id' AND `mp_me_id` = '$me_id';";
    $result_me_pt = $conn -> query($sql_me_pt);
    $row_me_pt = $result_me_pt -> fetch_assoc();
    if(!empty($row_me_pt)){
        $sql_pt = "UPDATE `p_me_points` 
        SET `mp_me_points`='$sumpoints'
        WHERE '".$row_me_pt['mp_id']."'";
        $conn -> query($sql_pt);
    }else{
        $sql_pt = "INSERT INTO `p_me_points`(`mp_qt_id`, `mp_me_id`, `mp_me_points`) 
        VALUES ('$qt_id','$me_id','$sumpoints')";
        $conn -> query($sql_pt);
    }
    echo"<script>alert('ส่งคำตอบแล้ว'); window.location='';</script>";
}   
?>