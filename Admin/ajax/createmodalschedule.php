<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $query = "SELECT * FROM class";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $class = [];
    echo '<div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit data schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Day</label>
                    <select id="days" name="days">';
                    echo '<option value="1"> Monday </option>';
                    echo '<option value="2"> Tuesday </option>';
                    echo '<option value="3"> Wednesday </option>';
                    echo '<option value="4"> Thursday </option>';
                    echo '<option value="5"> Friday </option>';
                    echo '<option value="6"> Saturday </option>';
                    echo '</select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <select id="cn" name="cn">';
                    while($class = $stmt->fetch()){
                        if ($schedule['id_class'] == $class['id_class']) {
                            echo '<option value="'.$class['class_name'].'" selected>'.$class['class_name'].'</option>';
                        }
                        else {
                            echo '<option value="'.$class['class_name'].'">'.$class['class_name'].'</option>';
                        }
                    }
                    echo '</select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Time</label>
                    <input type="time" class="form-control" value="" id="time">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Duration(in minutes)</label>
                    <input type="number" class="form-control" value="" id="dur">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Location</label>
                    <input type="text" class="form-control" value="" id="loc">
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