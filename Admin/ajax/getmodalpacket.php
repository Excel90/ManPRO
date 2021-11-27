<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM course WHERE id_course = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $packet = [];
    $packet = $stmt->fetch();
        echo '<div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <input type="text" value="'.$packet['id_course'].'" class="form-control" id="id" hidden>
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" value="'.$packet['course_name'].'" class="form-control" id="name">
                    </div></div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" value="'.$packet['price'].'" id="price">
                    </div></div></div>';
}
?>