<?php 
$date = strtotime("2022/12/20");
$today = strtotime(date("Y/m/d"));

if($date < $today){
    echo "lewat";
}
else {
    echo "belum lewat";
}

?>