<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){    
    echo '<div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create data student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" value="" class="form-control" id="fn">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Address</label>
                        <input type="text" class="form-control" value="" id="add">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" value="" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" class="form-control" value="" id="password">
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="" id="ln">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" value="" id="bd">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" value="" id="bp">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary submit" data-bs-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>';
}
?>