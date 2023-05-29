<?php
    require 'init.php';

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if($con){
        $sql = "SELECT * FROM user_info WHERE user_name='$user_name' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_assoc($result);
            $status = "OK";
            $result_code = 1;
            $name = $rows['name'];
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code, 'name'=>$name));
        }else{
            $status = "OK";
            $result_code = 0;
            echo json_encode(array('status'=>$status, 'result_code'=>$result_code));
        }
    }else{
        $status = "OK";
        echo json_encode(array('status'=>$status), JSON_FORCE_OBJECT);
    }
    mysqli_close($con);
?>