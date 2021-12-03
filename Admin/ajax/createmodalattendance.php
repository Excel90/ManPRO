<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query2 = "SELECT * FROM upload where id_class = ? and status_verify = 1 and status_progress = 3";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([$id]);
    $student=[];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create data attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <input type="text" value="'.$id.'" class="form-control" id="idc" hidden disabled>
                            <label for="name" class="form-label">Attendance-N</label>
                            <input type="text" value="" class="form-control" id="attn">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Date</label>
                            <input type="date" class="form-control" value="" id="date">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Topic</label>
                            <input type="text" class="form-control" value="" id="topic">
                        </div>
                    </div>';
                        while ($student = $stmt2->fetch()) {
                            $query3 = "SELECT * FROM student where id_student = ?";
                            $stmt3 = $pdo->prepare($query3);
                            $stmt3->execute([$student['id_student']]);
                            $name = $stmt3->fetch();
                            echo '<div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label name">'.$name['first_name'].' '.$name['last_name'].'</label>
                                    </div>
                                </div>
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <select id="'.$student['id_student'].'" name="s">
                                        <option selected disabled hidden></option>
                                        <option value = "1">Hadir</option>
                                        <option value = "2">Tidak Hadir</option>
                                    </select>
                                </div>
                            </div>';
                        }
                echo '</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary submitA" data-bs-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>