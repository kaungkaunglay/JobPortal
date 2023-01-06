<?php
require_once "../../config/config.php";
?>
<?php
require_once "../../includes/header.php";
?>
<?php
    if(isset($_POST['submit'])){
        $email = trim(htmlentities($_POST['email']));
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            //Check Email is having
            $select = $conn->query("SELECT COUNT(*) As num_of_user FROM users WHERE email = '$email'") ;
            $select->execute();
            $data = $select->fetch(PDO::FETCH_OBJ);
            if($data->num_of_user >= 1 ){
                $_SESSION['reset_email'] = $email;
                header("Location: check.php");
            } else{
                echo "<script>alert('Email is not found')</script>";
            }

        }
    }
?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL.'/images/hero_1.jpg' ?>');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Password Reset</h1>
                    <div class="custom-breadcrumbs">
                        <a href="<?php echo APPURL ?>">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Password Reset</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form action="index.php" class="p-4 border rounded" method="POST">

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Enter Email address</label>
                                <input type="email" name="email" id="fname" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Check" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
require_once "../../includes/footer.php";
?>