<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM teacher";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $teacher = [];
    while($teacher = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>".$teacher['first_name']. "</td>
        <td>" .$teacher['last_name']. "</td>
        <td>" .$teacher['address']. "</td>
        <td>" .$teacher['birth_date']. "</td>
        <td>" .$teacher['birth_place']. "</td>
        <td>" .$teacher['email']. "</td>
        <td><button type='button' class='btn btn-primary edit' id=".$teacher['id_teacher']." data-val=".$teacher['id_teacher']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button></td>
        <td><button type='button' class='btn btn-danger delete' id=".$teacher['id_teacher']." data-val=".$teacher['id_teacher']."'>Delete</button></td></tr>";
        $no=$no+1;
    }
}
?>