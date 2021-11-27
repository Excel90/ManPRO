<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM attendance where id_attendance = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $attendance = [];
    $attendance = $stmt->fetch();
    $query2 = "SELECT * FROM upload where id_class = ? and status_verify = 1 and status_progress = 1";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([$attendance['id_class']]);
    $student=[];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <input type="text" value="'.$attendance['id_attendance'].'" class="form-control" id="ida" hidden disabled>
                            <label for="name" class="form-label">Attendance-N</label>
                            <input type="text" value="'.$attendance['attendance_n'].'" class="form-control" id="attn">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Date</label>
                            <input type="date" class="form-control" value="'.$attendance['date'].'" id="date">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Topic</label>
                            <input type="text" class="form-control" value="'.$attendance['topic'].'" id="topic">
                        </div>
                    </div>';
                        while ($student = $stmt2->fetch()) {
                            $query3 = "SELECT * FROM student where id_student = ?";
                            $stmt3 = $pdo->prepare($query3);
                            $stmt3->execute([$student['id_student']]);
                            $name = $stmt3->fetch();
                            $query4 = "SELECT * FROM student__attendance where id_attendance = ? and id_student = ?";
                            $stmt4 = $pdo->prepare($query4);
                            $stmt4->execute([$attendance['id_attendance'], $student['id_student']]);
                            $status = $stmt4->fetch();
                            echo '<div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label name">'.$name['first_name'].' '.$name['last_name'].'</label>
                                    </div>
                                </div>
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                            <select id="'.$student['id_student'].'" name="s">';
                            if($status['status'] == 1){
                                echo '<option value = "1" selected>Hadir</option>
                                <option value = "2">Tidak Hadir</option>';
                            }
                            else if($status['status'] == 2){
                                echo '<option value = "1">Hadir</option>
                                <option value = "2" selected>Tidak Hadir</option>';
                            }
                            else{
                                echo '<option selected disabled hidden></option>
                                <option value = "1">Hadir</option>
                                <option value = "2">Tidak Hadir</option>';
                            }
                            echo '</select>
                                </div>
                            </div>';
                        }
                echo '</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary updateA" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>