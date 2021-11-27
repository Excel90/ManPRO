<?php
require_once "../databased.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `student` WHERE `email` = (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $fetch= $stmt->fetch();
    $studentid =$fetch['id_student'];
    $i = 0;
    if ($fetch != null) {
        $passHash = $fetch['password'];
        if(password_verify($password, $passHash)) {
            $_SESSION['username'] = $fetch['id_student'];

            $sql = "SELECT * 
            FROM upload
            WHERE id_student = ? AND status_progress = 0 AND Status_verify != 0 " ;
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$studentid]);
            while($fetch = $stmt->fetch()){
              $_SESSION['active_class'][$i] = $fetch['id_class'];
              
              $i = $i + 1;
            }
            
            $_SESSION['active'] = $i;
            echo header("location: ../student/student.php");
            
          }else{
            echo header("Location: ../signin.php?error=12");
          }
    }
    else{
        echo header("Location: ../signin.php?error=12");
    }
}
else {
  echo header("Location: ../index.php");
}
?>

<!-- $2y$10$YYz2vgOmWh97QGee9xQMluBsjKroSA/DsNmIhi.HR.8ZwKHRWBv2. -->
<!-- $2y$10$wf.5OdgSkbML7y2akl0w9OIu/BYv5ZTgznbwKn9Bncz788w1D/Y/K -->