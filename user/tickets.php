<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
<?php
session_start();
 if(! isset($_SESSION['userId'])){
    header('location:../login.php');
}
?>
    <div class="" id="home">
        <div class="container">
        <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.php">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="create-ticket.php">Create Ticket</a>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="tickets.php">Tickets</a>
                                </li>

                              
                               
                            </ul>
                            <?php if(isset($_SESSION['userId'])){ ?>
                                <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="logout.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                            <?php }else{ ?>
                                <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="../login.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                            </ul>
                                    <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            

            <?php require_once '../inc/success.php' ?>
            <?php require_once '../inc/errors.php' ?>
            <?php require_once '../inc/connection.php' ?>
            <table class="table table-success table-striped">
  ...           <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Ticket ID</th>
                <th scope="col">Email</th>
                <th scope="col">Category</th>
                <th scope="col">Subject</th>
                <th scope="col">Status</th>
                <th scope="col">File</th>
                <th scope="col">created_at</th>
                <th scope="col">Edit</th>
                
                </tr>
            </thead>
           <?php
                if(isset($_SESSION['email'])){
                 $email= $_SESSION['email'];
                //  echo $email;
                //  die ;
                
                
                    $sql="select * from `tickets` where `email`='$email'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                     $tickets = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    }
                }
                    ?>
            <tbody>
                <?php
                if(isset($tickets)){
                 foreach($tickets as $ticket){ ?>
                <tr>
                <!-- <th scope="row">1</th> -->
                <td><?php echo $ticket['ticket_id'] ;?></td>
                <td><?php echo $ticket['email'] ;?></td>
                <td><?php echo $ticket['category'] ;?></td>
                <td><?php echo $ticket['subject'] ;?></td>
                <td><?php echo $ticket['status'] ;?></td>
                <td><?php 
                if($ticket['files']){
                    ?>
                    <div >
                    <a href="../upload/<?php echo $ticket['files'] ?>" tabindex="-1"><strong>File</strong></a>
                    </div>
                    <?php } 
                
                  ?></td>
                <td><?php echo $ticket['created_at'] ;?></td>
                <td>
                <form action="edit-ticket.php?id=<?php echo $ticket['id'] ?>" method="post">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="submit" name="edit" class="btn btn-outline-primary">Edit</button>
                </div>
                </form>
                </td>
                </tr>
                <?php }
               } ?>
            </tbody>
            </table>
            
                            </table>
                        </div>

                       
                    </div>
                </div>

                
            </div>
            <footer class="row tm-mt-small">
                
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>
