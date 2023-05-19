<?php
require_once('../inc/connection.php');
session_start();

if(isset($_POST['login'])){
    $email=htmlspecialchars(trim($_POST['email'])) ;
    $password=htmlspecialchars(trim($_POST['password'])) ;


    $errors=[];

    if(empty($email)){
        $errors[]= "Email is Required";
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[]= "Enter Validate Email";
      }
   
      if(empty($password)){
        $errors[]= "Password is Required";
      }elseif(strlen($password) <8){
        $errors[]= "Password  Must be More Than 8 Character";
      }



    if(empty($errors)){
        

        $query="select * from users where `email`='$email'";
        $result=mysqli_query($conn , $query);
        if(mysqli_num_rows($result)==1){
            $user=mysqli_fetch_assoc($result);

            $hashedPass=$user['password'];
            $userId=$user['id'];
            $pass_verify=password_verify($password,$hashedPass);

            if($pass_verify){

                if($user['role'] == 'user'){
                        $_SESSION['success']= "Welcome Back" ;
                        $_SESSION['userId']=$userId;
                        $_SESSION['email']=$email;
                        $_SESSION['role']=$user['role'];
                        header('location:../user/tickets.php');
                }else{

                    $_SESSION['success']= "Hello Admin" ;
                    $_SESSION['userId']=$userId;
                    $_SESSION['role']=$user['role'];
                    header('location:../admin');
                }

            }else{
                $_SESSION['error']="Account Not Right";
                $_SESSION['email']=$email;
                header('location:../login.php');
            }




        }else{
            $_SESSION['error']="Account Not Existed";
             header('location:../login.php');
        }

      

    }else{
        $_SESSION['errors']=$errors;
        $_SESSION['email']=$email;
        header('location:../login.php');

    }



}else{
    header('location:../login.php');
}