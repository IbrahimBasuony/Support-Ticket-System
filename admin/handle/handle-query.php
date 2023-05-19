<?php 

     require_once '../inc/connection.php' ;

        if(isset($_POST['edit']) && isset($_GET['id'])){
                $id=htmlspecialchars(trim($_GET['id']));

                $qry="select *  from tickets where `id`='$id' ";
                $runQuery=mysqli_query($conn,$qry);
                if(mysqli_num_rows($runQuery) == 1){
                    $ticket = mysqli_fetch_assoc($runQuery);
                    $qry="SELECT * FROM `reply-ticket` WHERE ticket_id=$id";
                    $runQuery=mysqli_query($conn,$qry);
                    if(mysqli_num_rows($runQuery) > 0){
                        $replies = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
                        
                    
                    }
                }else{
                    $_SESSION['error']="There is no Ticket Like This ";
                    header('location:../tickets.php');
                     }

                           

                           

                        }else{
                            header('location:../tickets.php');
                        }
                    


                         
                    ?>