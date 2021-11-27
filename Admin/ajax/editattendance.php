<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['ida'];
    $number = $_POST['number'];
    if ($number == 1) {
        $attn = $_POST['attn'];
        $date = $_POST['date'];
        $topic = $_POST['topic'];
        $query = "UPDATE attendance set attendance_n = ?, date = ?, topic = ? where id_attendance = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$attn, $date, $topic, $id]);
    }
    else if ($number == 2) {
        $name = $_POST['name'];
        $status = $_POST['status'];

        $query = "SELECT * from student where concat(first_name, ' ', last_name) = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name]);
        $temp = $stmt->fetch();
        $sid = $temp['id_student'];

        $query = "UPDATE student__attendance SET status = ? WHERE id_attendance = ? and id_student = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$status, $id, $sid]);
    }
}
?>