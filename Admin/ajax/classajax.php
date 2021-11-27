<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $id=$_POST['id'];
    $status=$_POST['status'];
    $class = [];
    $score = [];
    if ($status == 1) {
        $query = "SELECT DISTINCT id_class, attendance_n, id_attendance, date, topic FROM attendance where id_class = ? ORDER BY attendance_n ASC";
        // $query = "SELECT * FROM student st join attendance a ON (st.id_student = a.id_student) where st.id_class = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        echo '<table id="table_id" class="table display nowrap mb-3" style="text-align: center;">';
        echo '<thead style="background-color: rgba(255,255,255,0.7)"><tr>';
        echo '<th>#</th>
        <th>Attendance-N</th>
        <th>Date</th>
        <th>Topic</th>
        <th></th>
        <th><button type="button" class="btn btn-primary createA" id="'.$id.'" data-val="'.$id.'"data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create</button></th>
        </tr></thead><tbody style="background-color: rgba(255,255,255,0.5);font-weight:400;">';
        while ($class = $stmt->fetch()) {
            echo '<tr><td>'.$no.'</td>
            <td>Attendance-'.$class['attendance_n'].'</td>
            <td>'.$class['date'].'</td>
            <td>'.$class['topic'].'</td>
            <td><button type="button" class="btn btn-primary editA" id='.$class['id_attendance'].' data-val='.$class['id_attendance'].' data-bs-toggle="modal" data-bs-target="#staticBackdrop">View&Edit</button></td>
            <td><button type="button" class="btn btn-danger deleteA" id='.$class['id_attendance'].' data-val='.$class['id_attendance'].'>Delete</button></td></tr>';
            $no=$no+1;
        }
    }
    else if ($status == 2) {
        $query = "SELECT DISTINCT id_class, score_for, id_score FROM score where id_class = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        echo '<table id="table_id" class="table display nowrap mb-3" style="text-align: center;">';
        echo '<thead style="background-color: rgba(255,255,255,0.7)"><tr>';
        echo '<th>#</th>
        <th>Score For</th>
        <th></th>
        <th><button type="button" class="btn btn-primary createS" id="'.$id.'" data-val="'.$id.'"data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create</button></th>
        </tr></thead><tbody style="background-color: rgba(255,255,255,0.5);font-weight:400;">';
        while ($score = $stmt->fetch()) {
            echo '<tr><td>'.$no.'</td>
            <td>'.$score['score_for'].'</td>
            <td><button type="button" class="btn btn-primary editS" id='.$score['id_score'].' data-val='.$score['id_score'].' data-bs-toggle="modal" data-bs-target="#staticBackdrop">View&Edit</button></td>
            <td><button type="button" class="btn btn-danger deleteS" id='.$score['id_score'].' data-val='.$score['id_score'].'>Delete</button></td></tr>';
            $no=$no+1;
        }
    }
}
?>