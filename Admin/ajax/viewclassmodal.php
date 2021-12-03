<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM class where id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $class = [];
    $class = $stmt->fetch();
    $query2 = "SELECT * FROM upload where id_class = ?";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute([$id]);
    $getid = [];
    $query5 = "SELECT * FROM upload where id_class = ?";
    $stmt5 = $pdo->prepare($query5);
    $stmt5->execute([$id]);
    $getid2 = [];
    $query4 = "SELECT * FROM teacher where id_teacher = ?";
    $stmt4 = $pdo->prepare($query4);
    $stmt4->execute([$class['id_teacher']]);
    $teacher = [];
    $teacher = $stmt4->fetch();
    $student = [];
    $student2 = [];
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Student Class for Teacher: '.$teacher['first_name'].' '.$teacher['last_name'].'</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Registered & Verified</label>
                        </div>
                        <div class="mb-3">';
                            while($getid = $stmt2->fetch()){
                                $query3 = "SELECT * FROM student where id_student = ?";
                                $stmt3 = $pdo->prepare($query3);
                                $stmt3->execute([$getid['id_student']]);
                                $student = $stmt3->fetch();
                                if ($getid['status_verify'] == 1) {
                                    echo '<label for="name" class="form-label">'.$student['first_name'].' '.$student['last_name'].'</label> <br>';
                                }
                            }
                        echo '</div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Registered & Not Verified</label>
                        </div>
                        <div class="mb-3">';
                            while($getid2 = $stmt5->fetch()){
                                $query4 = "SELECT * FROM student where id_student = ?";
                                $stmt4 = $pdo->prepare($query4);
                                $stmt4->execute([$getid2['id_student']]);
                                $student2 = $stmt4->fetch();
                                if ($getid2['status_verify'] != 1) {
                                    echo '<label for="name" class="form-label">'.$student['first_name'].' '.$student['last_name'].'</label> <br>';
                                }
                            }
                    echo '</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>