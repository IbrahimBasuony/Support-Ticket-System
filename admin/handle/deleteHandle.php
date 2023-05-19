<?php
include_once '../../inc/connection.php';
session_start();
if(isset($_POST['delete']) && isset($_GET['id'])){
    $id=htmlspecialchars(trim($_GET['id']));

    $qry="select id  from tickets where `id`='$id' ";
    $runQuery=mysqli_query($conn,$qry);
    if(mysqli_num_rows($runQuery) == 1){
    $query= "DELETE FROM `tickets` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
        $_SESSION['success']="Ticket Deleted Successfully";
        header('location:../tickets.php');
    }else{
        $_SESSION['error']="Error while Deleting Ticket";
        header('location:../tickets.php');
    }
   
    }else{
        $_SESSION['error']="This Ticket is Not exist";
        header('location:../tickets.php');
    }

}else{
    header('location:../tickets.php');
}