<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM student";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $student = [];
    while($student = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>".$student['first_name']. "</td>
        <td>" .$student['last_name']. "</td>
        <td>" .$student['address']. "</td>
        <td>" .$student['birth_date']. "</td>
        <td>" .$student['birth_place']. "</td>
        <td>" .$student['email']. "</td>
        <td><button type='button' class='btn btn-primary edit' id=".$student['id_student']." data-val=".$student['id_student']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button></td>
        <td><button type='button' class='btn btn-danger delete' id=".$student['id_student']." data-val=".$student['id_student']."'>Delete</button></td></tr>";
        $no=$no+1;
    }
}
?>