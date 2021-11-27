<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM class c join teacher t on(c.id_teacher = t.id_teacher) join course co on(c.id_course = co.id_course) WHERE id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $query2 = "SELECT * FROM course";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([]);
    $query3 = "SELECT * FROM teacher";
    $stmt3 = $pdo->prepare($query3);
    $stmt3->execute([]);
    $class = [];
    $class = $stmt->fetch();
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
                        <input type="text" value="'.$class['id_class'].'" class="form-control" id="idc" hidden disabled>
                        <label for="name" class="form-label">Class Name</label>
                        <input type="text" value="'.$class['class_name'].'" class="form-control" id="cn">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Teacher name</label>
                        <select id="tn" name="tn">';
                        while($teacher = $stmt3->fetch()){
                            if ($teacher['first_name'] == $course['first_name'] && $teacher['last_name'] == $course['last_name']) {
                                echo '<option value="'.$teacher['first_name'].' '.$teacher['last_name'].'" selected>'.$teacher['first_name'].' '.$teacher['last_name'].'</option>';
                            }
                            else {
                                echo '<option value="'.$teacher['first_name'].' '.$teacher['last_name'].'">'.$teacher['first_name'].' '.$teacher['last_name'].'</option>';
                            }
                        }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <select id="con" name="con">';
                        while($course = $stmt2->fetch()){
                            if ($class['course_name'] == $course['course_name']) {
                                echo '<option value="'.$course['course_name'].'" selected>'.$course['course_name'].'</option>';
                            }
                            else {
                                echo '<option value="'.$course['course_name'].'">'.$course['course_name'].'</option>';
                            }
                        }
                        echo '</select>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Start Date</label>
                        <input type="date" class="form-control" value="'.$class['start_date'].'" id="sd">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">End Date</label>
                        <input type="date" class="form-control" value="'.$class['end_date'].'" id="ed">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary update" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>