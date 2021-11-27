<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $class=$_POST['idclass'];
    $query = "SELECT * FROM student WHERE id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $class = [];
    
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create data student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <input type="text" value="'.$id.'" class="form-control" id="idc" hidden disabled>
                        <label for="name" class="form-label">Name</label>
                        <select id="name" name="name">';
                        while($class = $stmt->fetch()){
                            echo '<option value="'.$class['student_name'].'">'.$class['student_name'].'</option>';
                        }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Score</label>
                        <input type="text" value="" class="form-control" id="score">
                    </div></div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Attendance 1</label>
                        <input type="text" class="form-control" value="" id="att_1">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Attendance 2</label>
                        <input type="text" class="form-control" value="" id="att_2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Attendance 3</label>
                        <input type="text" class="form-control" value="" id="att_3">
                    </div>
                    </div></div></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary submit" data-bs-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>';
}
?>