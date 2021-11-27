<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM class c join teacher t on(c.id_teacher = t.id_teacher) join course co on(c.id_course = co.id_course) ORDER BY c.id_class ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $class = [];
    while($class = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>" .$class['class_name']. "</td>
        <td>" .$class['first_name']." ".$class['last_name'].  "</td>
        <td>" .$class['course_name']. "</td>
        <td>" .$class['start_date']. "</td>
        <td>" .$class['end_date']. "</td>
        <td><button type='button' class='btn btn-primary edit' id=".$class['id_class']." data-val=".$class['id_class']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button>
        <button type='button' class='btn btn-danger delete' id=".$class['id_class']." data-val=".$class['id_class'].">Delete</button></td>
        <td></td>
        </tr>";
        $no=$no+1;
    }
}
?>