<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM schedule";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $schedule = [];
    while($schedule = $stmt->fetch()){
        echo "<tr><td>".$no."</td>";
        if ($schedule['days'] == 1) {
            echo "<td>Monday</td>";
        }
        else if ($schedule['days'] == 2) {
            echo "<td>Tuesday</td>";
        }
        else if ($schedule['days'] == 3) {
            echo "<td>Wednesday</td>";
        }
        else if ($schedule['days'] == 4) {
            echo "<td>Thursday</td>";
        }
        else if ($schedule['days'] == 5) {
            echo "<td>Friday</td>";
        }
        else if ($schedule['days'] == 6) {
            echo "<td>Saturday</td>";
        }
        else{
            echo "???";
        }
        echo "<td>" .$schedule['time']. "</td>
        <td>" .$schedule['duration'].  "</td>
        <td>" .$schedule['location']. "</td>";

        $query2 = "SELECT * FROM class where id_class = ?";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$schedule['id_class']]);
        $temp = [];
        $temp = $stmt2->fetch();
        $idt = $temp['id_teacher'];
        $idco = $temp['id_course'];
        echo "<td>".$temp['class_name']."</td>";

        $query3 = "SELECT * FROM teacher where id_teacher = ?";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute([$idt]);
        $temp1 = [];
        $temp1 = $stmt3->fetch();
        $fn = $temp1['first_name'];
        $ln = $temp1['last_name'];

        $query4 = "SELECT * FROM course where id_course = ?";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->execute([$idco]);
        $temp2 = [];
        $temp2 = $stmt4->fetch();
        $con = $temp2['course_name'];

        echo "<td>" .$con. "</td>
        <td>" .$fn. " " .$ln. "</td>
        <td><button type='button' class='btn btn-primary edit' id=".$schedule['id']." data-val=".$schedule['id']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button>
        <button type='button' class='btn btn-danger delete' id=".$schedule['id']." data-val=".$schedule['id'].">Delete</button></td>
        <td></td>
        </tr>";
        $no=$no+1;
    }
}
?>