<?php session_start(); ?>
<html>
    <head>
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <title>Is It Stolen</title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <a href="index.php"><img src="images/lego.png" class="logo"></a>
                <nav>
                    <ul>
                        <li><a href="index.php"> HOME <i class="fa fa-home"></i></a></li>
                        <li><a href="about.php"> ABOUT <i class="fa fa-bicycle"></i></a></li>
                        <!--<li><a href="login-form.php"> LOGIN <i class="fa fa-user"></i></a></li>-->
                        <?php 
                            if(isset($_SESSION['email'])){
                                echo '<li><a href="login-form.php"> ADD <i class="fa fa-plus"></i></a></li>';
                                echo '<li><a href="logout.php"> LOGOUT <i class="fa fa-user"></i></a></li>';
                            }else{
                                echo '<li><a href="login-form.php"> LOGIN <i class="fa fa-user"></i></a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </div>