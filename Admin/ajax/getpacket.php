<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM course";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $packet = [];
    while($packet = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>" .$packet['course_name']. "</td>
        <td>" .$packet['price']. "</td>
        <td>".$packet['description']."</td>
        <td><button type='button' class='btn btn-primary edit' id=".$packet['id_course']." data-val=".$packet['id_course']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button></td></tr>";
        $no=$no+1;
    }
}
?>