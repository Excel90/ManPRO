<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $query2 = "SELECT * FROM course";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([]);
    $query3 = "SELECT * FROM teacher";
    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute([]);
    $course = [];
    $teacher = [];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Class Name</label>
                        <input type="text" value="" class="form-control" id="cn">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Teacher name</label>
                        <select id="tn" name="tn">';
                        while($teacher = $stmt3->fetch()){
                            echo '<option value="'.$teacher['first_name'].' '.$teacher['last_name'].'">'.$teacher['first_name'].' '.$teacher['last_name'].'</option>';
                        }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <select id="con" name="con">';
                        while($course = $stmt2->fetch()){
                            echo '<option value="'.$course['course_name'].'">'.$course['course_name'].'</option>';
                        }
                        echo '</select>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Start Date</label>
                        <input type="date" class="form-control" value="" id="sd">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">End Date</label>
                        <input type="date" class="form-control" value="" id="ed">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary submit" data-bs-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>