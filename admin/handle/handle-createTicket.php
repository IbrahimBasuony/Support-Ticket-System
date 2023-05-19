<?php

include_once '../../inc/connection.php';
session_start();




if(isset($_POST['create'])){
    $user_name=htmlspecialchars(trim($_POST['username']));
    $email=htmlspecialchars(trim($_POST['email']));
    $subject=htmlspecialchars(trim($_POST['subject']));
    $category=htmlspecialchars(trim($_POST['category']));
    $description=htmlspecialchars(trim($_POST['description']));
    $ticket_id=rand(1,1000).rand(1000,3000);

    
 
 
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

    if(empty($subject)){
        $errors[]= "Subject is Required";
      }

      if(empty($description)){
        $errors[]= "Description is Required";
      }
//------------------------------------------------------------
      if($_FILES && $_FILES['file']['name']){
        $file  =$_FILES['file'] ;
        $name=$file['name'];
        $tmp_name=$file['tmp_name'];
        $size=$file['size'];
        $sizeMb=$size / (1024*1024);
    
        $ext=strtolower(pathinfo($name,PATHINFO_EXTENSION));
        $extensions = ['zip','pdf'];
        if(!in_array($ext,$extensions)){
            $errors[]="File not valid";
            }

        $newname = uniqid() . ".$ext" ;
            
    
        }else{
            $newname ="";
        }

//-----------------------------------------------------------------------
if(empty($errors)){
    $query= " INSERT INTO `tickets`( `name` ,`email`, `subject`,`description`,`category`,`files`,`ticket_id`)
           VALUES ('$user_name' ,'$email','$subject','$description','$category','$newname','$ticket_id')";
          $result=mysqli_query($conn,$query);
             
          if($result){
              move_uploaded_file( $tmp_name ,"../../upload/$newname");
              $_SESSION['success']="Ticket added successfully";
              header("location:../create-ticket.php");
          
              }else{
                $_SESSION['error']="Ticket not added";
                header("location:../create-ticket.php"); 
              }


            }else{
                $_SESSION['errors']=$errors;
                $_SESSION['username']=$user_name;
                $_SESSION['email']=$email;
                $_SESSION['subject']=$subject;
                $_SESSION['description']=$description;
                header("location:../create-ticket.php");
            }








}else{
    header("location:../create-ticket.php");
}