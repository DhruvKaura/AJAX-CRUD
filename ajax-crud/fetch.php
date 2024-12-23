<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud');
$query = "SELECT * FROM students";

$result = mysqli_query($conn, $query);
$result_array = [];

if(mysqli_num_rows($result)>0){
    foreach($result as $rows){
        array_push($result_array, $rows);
    }

    header("Content-type: application/json");
    echo json_encode($result_array);
}else{
    echo $return = "No records found";
}
?>