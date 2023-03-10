<?php
session_start();
define("APPURL", "http://localhost/Job Portal");
?>
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="<?php echo APPURL; ?>">JobBoard</a></div>

            <nav class="mx-auto site-navigation">
                <ul style="margin-right: -500px;" class="site-menu js-clone-nav d-inline d-xl-block ml-0 pl-0">
                    <li><a href="<?php echo APPURL; ?>" class="nav-link active">Home</a></li>
                    <li><a href="<?php echo APPURL; ?>/about.php">About</a></li>

                    <li><a href="<?php echo APPURL; ?>/contact.php">Contact</a></li>
                    <li><a href="<?php echo APPURL; ?>/generals/workers.php">Workers</a></li>
                    <li><a href="<?php echo APPURL; ?>/generals/companies.php">Companies</a></li>
                    <?php
                    if(isset($_SESSION['username'])):
                        if(isset($_SESSION['type']) AND $_SESSION['type'] == 'Company') :?>
                        <li class="d-lg-inline"><a href="<?php echo APPURL; ?>/jobs/post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
                        <?php endif;?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo APPURL;?>/users/public-profile.php?id=<?php echo $_SESSION['id'];?>">Public Profile</a>
                                <a class="dropdown-item" href="<?php echo APPURL;?>/users/update-profile.php?upd_id=<?php echo $_SESSION['id'];?>">Update Profile</a>
                                <?php
                                if(isset($_SESSION['type']) AND $_SESSION['type'] == 'Worker'):
                                ?>
                                <a class="dropdown-item" href="<?php echo APPURL;?>/users/saved_jobs.php?id=<?php echo $_SESSION['id'];?>">Saved Jobs</a>
                                <?php endif; ?>

                                <?php
                                if(isset($_SESSION['type']) AND $_SESSION['type'] == 'Company'):
                                    ?>
                                    <a class="dropdown-item" href="<?php echo APPURL;?>/users/show-applicants.php?id=<?php echo $_SESSION['id'];?>">Show Applicants</a>
                                <?php endif; ?>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo APPURL; ?>/auth/logout.php">Logout</a>
                            </div>
                        </li>

                    <?php else: ?>
                    <li class="d-lg-inline"><a href="<?php echo APPURL; ?>/auth/login.php">Log In</a></li>
                    <li class="d-lg-inline"><a href="<?php echo APPURL?>/auth/register.php">Register</a></li>
                    <?php endif;?>
                </ul>
            </nav>

<!--            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">-->
<!--                <div class="ml-auto">-->
<!--                    <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>-->
<!--                    <a href="--><?php //echo APPURL?><!--/auth/register.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>-->
<!--                    <a href="--><?php //echo APPURL?><!--/auth/login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Login</a>-->
<!--<!--                    <a href="-->--><?php ////echo APPURL ?><!--/auth/register.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>-->-->
<!--                </div>-->
<!--                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>-->
<!--            </div>-->
<!---->
<!--        </div>-->
    </div>
</header>
<link rel="shortcut icon" href="ftco-32x32.png">

<link rel="stylesheet" href="<?php echo APPURL; ?>/css/custom-bs.css">
<link rel="stylesheet" href="<?php echo APPURL?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="<?php echo APPURL?>/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo APPURL?>/fonts/icomoon/style.css">
<link rel="stylesheet" href="<?php echo APPURL?>/fonts/line-icons/style.css">
<link rel="stylesheet" href="<?php echo APPURL?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo APPURL?>/css/animate.min.css">
<link rel="stylesheet" href="<?php echo APPURL?>/css/quill.snow.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo APPURL ?>/css/style.css">