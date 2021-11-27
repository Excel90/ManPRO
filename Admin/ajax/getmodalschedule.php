<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM schedule where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $query2 = "SELECT * FROM class";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([]);
    $schedule = [];
    $schedule = $stmt->fetch();
    $class = [];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <input type="text" value="'.$schedule['id'].'" class="form-control" id="ids" hidden disabled>
                        <label for="name" class="form-label">Day</label>
                        <select id="days" name="days">';
                        if ($schedule['days'] == 1) {
                            echo '<option value="1" selected> Monday </option>';
                        }
                        else{
                            echo '<option value="1"> Monday </option>';
                        }
                        if ($schedule['days'] == 2) {
                            echo '<option value="2" selected> Tuesday </option>';
                        }
                        else{
                            echo '<option value="2"> Tuesday </option>';
                        }
                        if ($schedule['days'] == 3) {
                            echo '<option value="3" selected> Wednesday </option>';
                        }
                        else{
                            echo '<option value="3"> Wednesday </option>';
                        }
                        if ($schedule['days'] == 4) {
                            echo '<option value="4" selected> Thursday </option>';
                        }
                        else{
                            echo '<option value="4"> Thursday </option>';
                        }
                        if ($schedule['days'] == 5) {
                            echo '<option value="5" selected> Friday </option>';
                        }
                        else{
                            echo '<option value="5"> Friday </option>';
                        }
                        if ($schedule['days'] == 6) {
                            echo '<option value="6" selected> Saturday </option>';
                        }
                        else{
                            echo '<option value="6"> Saturday </option>';
                        }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Class Name</label>
                        <select id="cn" name="cn">';
                        while($class = $stmt2->fetch()){
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
                        <input type="time" class="form-control" value="'.$schedule['time'].'" id="time">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Duration(in minutes)</label>
                        <input type="number" class="form-control" value="'.$schedule['duration'].'" id="dur">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Location</label>
                        <input type="text" class="form-control" value="'.$schedule['location'].'" id="loc">
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