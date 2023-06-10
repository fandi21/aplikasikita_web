<?php
    require 'init.php';

    $name = $_GET['name'];
    $user_name = $_GET['user_name'];
    $password = $_GET['password']; 

    if($con){
        $sql = "SELECT * FROM user_info WHERE user_name='$user_name'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $status = "Data Exist";
            $result_code = 0;
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code));
        }else{
            $sql = "INSERT INTO user_info (name,user_name,password) VALUES ('$name', '$user_name', '$password')";
            if(mysqli_query($con, $sql)){
                $status = "OK";
                $result_code = 1;
                echo json_encode(array('status'=>$status, 'result_code'=>$result_code));
            }else{
                $status = "Failed insert";
                echo json_encode(array('status'=>$status), JSON_FORCE_OBJECT);
            }
        }
    }else{
        $status = "Failed connect";
        echo json_encode(array('status'=>$status), JSON_FORCE_OBJECT);
    }
?>