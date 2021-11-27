<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM upload WHERE id_upload = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $student = [];
    $student = $stmt->fetch();
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Student Transaction Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <img src="'.$student['path_file'].'">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>