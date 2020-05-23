<?php 


function get_curday(){
    include 'connection.php';
    $query="SELECT NOW();";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['NOW()'];
    $today = strtotime($date);
    $curday = date("l", $today);    

    return $curday;
}

function get_curDates(){
    include 'connection.php';
    $query="SELECT DATE(NOW());";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['DATE(NOW())'];
    return $date;
}

?>