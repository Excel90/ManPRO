<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $no=1;
    $query = "SELECT * FROM upload u join student s ON(u.id_student = s.id_student)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([]);
    $upload = [];
    while($upload = $stmt->fetch()){
        echo "<tr><td>".$no."</td>
        <td>".$upload['first_name']. "</td>
        <td>" .$upload['last_name']. "</td>
        <td>" .$upload['email']. "</td>";
        if ($upload['path_file'] != NULL) {
            echo "<td><button type='button' class='btn btn-info view' id=".$upload['id_upload']." data-val=".$upload['id_upload']." data-bs-toggle='modal' data-bs-target='#staticBackdrop'>View</button></td>";
        }
        else {
            echo '<td><span style="color: Red; font-weight: bold"><i class="fas fa-times-circle"></i> No File</span></td>';
        }
        if ($upload['status_verify'] == 0) {
            echo '<td>
            <button type="button" class="btn btn-primary verify" id="'.$upload['id_upload'].'"data-val="'.$upload['id_upload'].'">Validate</button>
            <button type="button" class="btn btn-danger reject" id="'.$upload['id_upload'].'"data-val="'.$upload['id_upload'].'">Reject</button>
            </td>';
        }
        if ($upload['status_verify'] == 1) {
            echo '<td><span style="color: Green; font-weight: bold"><i class="fas fa-check-circle"></i> Verified</span></td>';
        }
        else if ($upload['status_verify'] == 2) {
            echo '<td><span style="color: Red; font-weight: bold"><i class="fas fa-times-circle"></i> Declined</span></td>';
        }
        if ($upload['status_progress'] == 0) {
            echo '<td><span style="color: Black; font-weight: bold"><i class="fas fa-hourglass-half"></i> Waiting Verification</span></td>';
        }
        else if ($upload['status_progress'] == 1) {
            echo '<td><span style="color: Blue; font-weight: bold"><i class="fas fa-hourglass-half"></i> In Progress</span></td>';
        }
        else if ($upload['status_progress'] == 2) {
            echo '<td><span style="color: Green; font-weight: bold"><i class="fas fa-check-circle"></i> Completed</span></td>';
        }
        else if ($upload['status_progress'] == 3) {
            echo '<td><span style="color: Red; font-weight: bold"><i class="fas fa-times-circle"></i> Rejected</span></td>';
        }
        $no=$no+1;
    }
}
?>