<?php 
require_once "../databased.php";
$sql = "SELECT * FROM `company`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fetch = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Term & Agreemeent</title>
    <link rel="icon" type="image/png" href="../asset/favicon.png">
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
    echo $fetch['terms']
    ?>
</body>
</html>