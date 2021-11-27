<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $id=$_POST['id'];
    $query = "SELECT * FROM class where id_teacher = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $class = [];
    while($class = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>" .$class['class_name']. "</td>
        <td><button type='button' class='btn btn-primary viewA' id=".$class['id_class']." data-val=".$class['id_class'].">View Attendance</button>
        <button type='button' class='btn btn-primary viewS' id=".$class['id_class']." data-val=".$class['id_class'].">View Score</button></td>
        </tr>";
        $no=$no+1;
    }
}
?>