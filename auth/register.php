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
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="<?php echo APPURL; ?>" class="nav-link active">Home</a></li>
                        <li><a href="about.html">About</a></li>


                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
        </div>
    </header>

    <?php
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
                $insert = $conn->prepare("INSERT INTO users (username, email, mypassword, img, type) VALUES(:username, :email, :mypassword, :img, :type)");
                $insert->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':mypassword'  => password_hash($password, PASSWORD_DEFAULT),
                    ':img' => $img,
                    ':type' => $type
                ]);
                echo "<script>window.location='login.php'</script>";
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
                                <input name="email" type="text" id="fname" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select name="type" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select User Type">
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