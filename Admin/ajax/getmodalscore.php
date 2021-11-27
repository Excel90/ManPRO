<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM score where id_score = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $score = [];
    $score = $stmt->fetch();
    $query2 = "SELECT * FROM upload where id_class = ? and status_verify = 1 and status_progress = 1";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([$score['id_class']]);
    $student=[];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <input type="text" value="'.$score['id_score'].'" class="form-control" id="ids" hidden disabled>
                            <label for="name" class="form-label">Score For</label>
                            <input type="text" value="'.$score['score_for'].'" class="form-control" id="scrf">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Percentage</label>
                            <input type="number" class="form-control" value="'.$score['percentage'].'" id="percent">
                        </div>
                    </div>';
                        while ($student = $stmt2->fetch()) {
                            $query3 = "SELECT * FROM student where id_student = ?";
                            $stmt3 = $pdo->prepare($query3);
                            $stmt3->execute([$student['id_student']]);
                            $name = $stmt3->fetch();
                            $query4 = "SELECT * FROM student__score where id_score = ? and id_student = ?";
                            $stmt4 = $pdo->prepare($query4);
                            $stmt4->execute([$score['id_score'], $student['id_student']]);
                            $scores = $stmt4->fetch();
                            echo '<div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label name">'.$name['first_name'].' '.$name['last_name'].'</label>
                                    </div>
                                </div>
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <input type="number" class="form-control score" value="'.$scores['score'].'" id="percent">
                                </div>
                            </div>';
                        }
                echo '</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary updateS" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>