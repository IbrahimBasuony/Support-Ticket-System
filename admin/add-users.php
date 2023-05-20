<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
<?php 
session_start();
if(! isset($_SESSION['userId']) || $_SESSION['role'] != "admin"){
   header('location:logout.php');
}
?>
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

                                <li class="nav-item">
                                    <a class="nav-link" href="add-users.php">Add Users</a>
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
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add User</h2>
                        </div>
                    </div>
                    
                    <?php require_once '../inc/success.php' ?>
                    <?php require_once '../inc/errors.php' ?>
                    <?php require_once '../inc/connection.php' ?>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="handle/handle-addUser.php"method="post" class="tm-edit-product-form">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Name
                                    </label>
                                    <input placeholder="Username" id="username" name="username" type="text" class="validate" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ; unset($_SESSION['username']);?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Email
                                    </label>
                                    <input placeholder="Email" id="email" name="email" type="email" class="validate"value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ; unset($_SESSION['email']);?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Password
                                    </label>
                                    <input placeholder="Password" id="password" name="password" type="password" >
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Address
                                    </label>
                                    <input placeholder="Address" id="Address" name="address" type="text" class="validate" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address'] ; unset($_SESSION['address']);?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Phone
                                    </label>
                                    <input placeholder="Phone" id="phone" name="phone" type="tel" class="validate" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'] ; unset($_SESSION['phone']);?>">
                                </div>
                                              
                                                   
                                
                                <div class="input-group mb-3">
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Role</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" name="role" id="role">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" name="add"class="btn btn-primary">Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
           
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>
