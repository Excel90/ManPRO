<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM student";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $level = [];
    while($level = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>" .$level['first_name']." ".$level['last_name']."</td>
        <td>" .$level['email']."</td>
        <td>" .$level['level']."</td>
        <td><button type='button' class='btn btn-success LB' id=".$level['id_student']." data-val=".$level['id_student'].">Beginner</button>
        <button type='button' class='btn btn-primary LI' id=".$level['id_student']." data-val=".$level['id_student'].">Intermediate</button>
        <button type='button' class='btn btn-danger LA' id=".$level['id_student']." data-val=".$level['id_student'].">Advance</button></td>
        </tr>";
        $no=$no+1;
    }
}
?>