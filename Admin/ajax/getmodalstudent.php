<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $query = "SELECT * FROM student WHERE id_student = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $student = [];
    $student = $stmt->fetch();
        echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <input type="text" value="'.$student['id_student'].'" class="form-control" id="ids" hidden disabled>
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" value="'.$student['first_name'].'" class="form-control" id="fn">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Address</label>
                        <input type="text" class="form-control" value="'.$student['address'].'" id="add">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" value="'.$student['email'].'" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" class="form-control" value="'.$student['password'].'" id="password">
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="'.$student['last_name'].'" id="ln">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" value="'.$student['birth_date'].'" id="bd">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" value="'.$student['birth_place'].'" id="bp">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary update" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>