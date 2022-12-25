<?php
require_once "../config/config.php";
require_once "../includes/header.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

</head>
<body id="top">

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->


    <?php

    if(isset($_SESSION['username']))
    {
        $app_url = APPURL;
        echo "<script>window.location='$app_url'</script>";
    }
    if(isset($_POST['submit'])){
        if(empty($_POST['username']) OR empty($_POST['email'] OR empty($_POST['re-password']))){
            echo "<script>alert('some inputs are empty')</script>";
        }else {
            $username = trim(htmlentities($_POST['username']));
            $email = trim(htmlentities($_POST['email']));
            $password = trim(htmlentities($_POST['password']));
            $re_password = trim(htmlentities($_POST['re-password']));
            $img = "web-coding.png";
            $type = $_POST['type'];
            // checking for password match
            if($password == $re_password){
                if(strlen($email) > 22 OR strlen($username) > 15){
                    echo "<script>alert('email or username is too big')</script>";
                }else{

                    //Checking for username or password availability
                    $validate  = $conn->query("SELECT * FROM users WHERE email = '$email' OR username = '$username'");
                    $validate->execute();
                    if($validate->rowCount() > 0){
                        echo "<script>alert('Account is already taken')</script>";
                    }else{
                        $insert = $conn->prepare("INSERT INTO users (username, email, mypassword, img, type) VALUES(:username, :email, :mypassword, :img, :type)");
                        $insert->execute([
                            ':username' => $username,
                            ':email' => $email,
                            ':mypassword'  => password_hash($password, PASSWORD_DEFAULT),
                            ':img' => $img,
                            ':type' => $type
                        ]);
                        echo "<script>window.location='login.php'</script>";
                    }
                }

            }else{
                echo "<script>alert('password don\' match')</script>";
            }
        }
    }
    ?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Register</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Register</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <form action="register.php" class="p-4 border rounded" method="POST">

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Username</label>
                                <input type="text" name="username" id="fname" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input name="email" type="email" id="fname" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="job-type">User Type</label>
                            <select name="type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select User Type">
                                <option>Worker</option>
                                <option>Company</option>
                            </select>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input name="password" type="password" id="fname" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Re-Type Password</label>
                                <input name="re-password" type="password" id="fname" class="form-control" placeholder="Re-type Password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <?php require_once "../includes/footer.php" ?>

</div>




</body>
</html>