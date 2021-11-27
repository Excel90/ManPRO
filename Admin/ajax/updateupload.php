<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $query = "UPDATE upload SET status_verify = ?, status_progress = ? WHERE id_upload = ?";
    $stmt = $pdo->prepare($query);
    if ($status == 1) {
        $stmt->execute([1, 1, $id]);
    }
    else if ($status == 2) {
        $stmt->execute([2, 3, $id]);
    }
    
}
?>