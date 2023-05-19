<?php

include_once '../../inc/connection.php';
session_start();




if(isset($_POST['add'])){
    $user_name=htmlspecialchars(trim($_POST['username']));
    $email=htmlspecialchars(trim($_POST['email']));
    $password=htmlspecialchars(trim($_POST['password']));
    $phone=htmlspecialchars(trim($_POST['phone']));
    $address=htmlspecialchars(trim($_POST['address']));
    $role=htmlspecialchars(trim($_POST['role']));
 
 
    $errors=[];
     
    if(empty($user_name)){
      $errors[]= "UserName is Required";
    }elseif(is_numeric($user_name)){
      $errors[]= "UserName  Must be Letters";
    }elseif(strlen($user_name) > 50){
      $errors[]= "UserName  Must be Less Than 50 Letters";
    }
    
    if(empty($email)){
      $errors[]= "Email is Required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors[]= "Enter Validate Email";
    }
 
    if(empty($password)){
      $errors[]= "Password is Required";
    }elseif(strlen($password) < 8){
      $errors[]= "Password  Must be More Than 8 Character";
    }

   
    if(empty($phone)){
      $errors[]= " Phone is Required";
    }elseif(!is_numeric($phone) ){
      $errors[]= "Phone  Must be  Numbers";
    }
 
    if(empty($address)){
      $errors[]= " Address is Required";
    }elseif(strlen($address) > 100){
      $errors[]= "Address  Must be Less Than 100 Letters";
    }
    
    if(empty($errors)){

        $qry="select email  from users where `email`='$email' ";
        $runQuery=mysqli_query($conn,$qry);
        if(mysqli_num_rows($runQuery) == 1){

          $_SESSION['error']="This Account is Not exist";
          $_SESSION['username']=$user_name;
          $_SESSION['email']=$email;
          $_SESSION['address']=$address;
          header('location:../add-users.php');

        }else{
            $hashedPass=password_hash($password,PASSWORD_BCRYPT);
            $query="INSERT INTO users ( `name`, `email`, `password`, `address`,`phone`,`role`) 
            VALUES ('$user_name','$email','$hashedPass','$address','$phone','$role')";
            $result=mysqli_query($conn,$query);
            if($result){
                $_SESSION['success']= "You Add User successfully" ;
                header('location:../add-users.php');
                }else{
                  $_SESSION['error']="Error while Insetring Data";
                  header('location:../add-users.php');
                }
   
              }
    }else{
        $_SESSION['errors']=$errors;
        $_SESSION['username']=$user_name;
        $_SESSION['email']=$email;
        $_SESSION['phone']=$phone;
        $_SESSION['address']=$address;
        header('location:../add-users.php');

    }

  

}else{
    header('location:../add-users.php');
                   
 
}