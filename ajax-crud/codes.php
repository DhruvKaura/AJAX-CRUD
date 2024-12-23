<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud');

if(isset($_POST['checking_add'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $class = $_POST['class'];
    $section = $_POST['section'];

    $query = "INSERT INTO students(fname, lname, class, section) value('$fname', '$lname','$class', '$section' )";
    $result = mysqli_query($conn, $query);

    if($result){
        $return = "Successfully Stored";
    }else{
        $return = "Failed to Store";
    }
}


if(isset($_POST['checking_view'])){
    $stu_id = $_POST['stu_id'];

    $query = "SELECT * FROM students WHERE id='$stu_id'";
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
}

if(isset($_POST['checking_edit'])){
    $stu_id = $_POST['stu_id'];

    $query = "SELECT * FROM students WHERE id='$stu_id'";
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
}

if(isset($_POST['checking_update'])){
    $stu_id = $_POST['stu_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $class = $_POST['class'];
    $section = $_POST['section'];

    $query = "UPDATE students set fname='$fname', lname= '$lname', class = '$class', section = '$section' WHERE id = '$stu_id'";
    $result = mysqli_query($conn, $query);
    // $result_array = [];

    // if(mysqli_num_rows($result)>0){
    //     foreach($result as $rows){
    //         array_push($result_array, $rows);
    //     }
    //     header("Content-type: application/json");
    //     echo json_encode($result_array);
    // }else{
    //     echo $return = "No records found";
    // }
    if($result){
        echo $return = "Record updated successfully";
    }else{
        echo $return = "Failed to update record";
    }
}

if (isset($_POST['checking_delete'])) {
    $stu_id = $_POST['stu_id'];

    $query = "DELETE FROM students WHERE id='$stu_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Record Deleted successfully";
    } else {
        echo "Failed to delete record: " . mysqli_error($conn);
    }
}
