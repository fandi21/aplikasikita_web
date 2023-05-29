<?php
    require 'init.php';

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    if($con){
        $sql = "SELECT * FROM usr_info WHERE user_name='$user_name'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $status = "OK";
            $result_code = 0;
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code));
        }else{
            $sql = "INSERT INTO user_info VALUES ('$name', '$user_name', '$password')";
            if(mysqli_query($con, $sql)){
                $status = "OK";
                $result_code = 1;
                echo json_encode(array('status'=>$status, 'result_code'=>$result_code));
            }else{
                $status = "Failed";
                echo json_encode(array('status'=>$status), JSON_FORCE_OBJECT);
            }
        }
    }
?>