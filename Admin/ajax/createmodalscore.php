<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query2 = "SELECT * FROM upload where id_class = ? and status_verify = 1 and status_progress = 1";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([$id]);
    $student=[];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create data score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <input type="text" value="'.$id.'" class="form-control" id="idc" hidden disabled>
                            <label for="name" class="form-label">Score For</label>
                            <input type="text" value="" class="form-control" id="scrf">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Percentage</label>
                        <input type="number" class="form-control" value="" id="percent">
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
                                    <input type="number" class="form-control score" value="" id="percent">
                                </div>
                            </div>';
                        }
                echo '</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary submitS" data-bs-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>