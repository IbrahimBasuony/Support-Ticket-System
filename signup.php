<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Tooplate</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="register">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <header class="mb-5">
                    <h3 class="mt-0 white-text">Sign-up Form</h3>
                    <p class="grey-text mb-4">admin  email=>ib@gmail.com   password=>12345678</p>
                    <p class="grey-text">user  email=>ib@gm.com  <br>   password=>12345678
                    </p>
                    <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ml-auto mr-0 text-center">
                    <a href="login.php" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">login</a>
                    </div>
                    </div>
                </header>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <?php   session_start();
                    include_once ('inc/success.php');
                    include_once ('inc/errors.php'); ?> 
           
                <form action="handle/handle-signup.php" method="post" class="tm-signup-form">
                    <div class="input-field">
                        <input placeholder="Username" id="username" name="username" type="text" class="validate" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ; unset($_SESSION['username']);?>">
                    </div>
                    <div class="input-field">
                        <input placeholder="Password" id="password" name="password" type="password" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="confirmPassword" id="confirmPassword" name="confirmPassword" type="password" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Email" id="email" name="email" type="email" class="validate"value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ; unset($_SESSION['email']);?>">
                    </div>
                    <div class="input-field">
                        <input placeholder="Phone" id="phone" name="phone" type="tel" class="validate" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'] ; unset($_SESSION['phone']);?>">
                    </div>
                    <div class="input-field">
                        <input placeholder="Address" id="Address" name="address" type="text" class="validate" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address'] ; unset($_SESSION['address']);?>">
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" name="submit" class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0">Sign Up</button>
                    </div>
                </form>

            </div>
        </div>
        
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12">
                <p class="text-center grey-text text-lighten-2 tm-footer-text-small">
                    Copyright &copy; 2018 Company Name 
                    
                    - <a rel="nofollow" href="http://www.tooplate.com/view/2105-input">Input</a> by 
                    <a rel="nofollow" href="http://tooplate.com" class="tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>