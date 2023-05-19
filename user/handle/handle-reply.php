<?php
require_once('../../inc/connection.php');
session_start();

if(isset($_POST['comment']) && isset($_GET['id'])){

    $id=htmlspecialchars(trim($_GET['id']));
    $reply=htmlspecialchars(trim($_POST['reply']));
    // $status=htmlspecialchars(trim($_POST['status']));

    $errors=[];

    if(empty($reply)){
        $errors[]= "Reply is Required";
      }

    
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
  

  


    if(empty($errors)){
        
        $sql="select * from `tickets` where `id`='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
           $comment = mysqli_fetch_assoc($result);
          

           $query= " INSERT INTO `reply-ticket`( `reply` ,`file`, `ticket_id`)
           VALUES ('$reply' ,'$newname','$id')";
          $result=mysqli_query($conn,$query);
             
          if($result){
              move_uploaded_file( $tmp_name ,"../../upload/$newname");
              $_SESSION['success']="Reply added successfully";
              header("location:../tickets.php");
          
              }else{
                $_SESSION['error']="Reply not added";
                header('location:../tickets.php'); 
              }
            




        }else{
            $_SESSION['error']="Error";
            
            header('location:../tickets.php');  
        }



    }else{
        $_SESSION['errors']=$errors;
        
        header('location:../tickets.php'); 
    }


}else{
    header('location:../tickets.php');
}