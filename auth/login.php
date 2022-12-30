<?php
require_once "../config/config.php";
?>
<?php
require_once "../includes/header.php";
?>
<?php
if(isset($_SESSION['username']))
{
    header("Location: ".APPURL) ;
}
    if(isset($_POST['submit'])){
    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('some inputs are empty')</script>";
    }else {
        // checked for the form-submission
        // we need to grap the data
        // do the query with the email only
        // execute and fetch the data
        // check for row count
        // check for password
        $email =  trim(htmlentities($_POST['email']));
        $password = trim(htmlentities($_POST['password']));

        $login = $conn->query("SELECT * FROM users WHERE email= '$email'");
        $login->execute();

        $select = $login->fetch(PDO::FETCH_ASSOC);
        if($login->rowCount() > 0){
            if(password_verify($password, $select['mypassword'])){
                $_SESSION['username'] = $select['username'];
                $_SESSION['id'] = $select['id'];
                $_SESSION['type'] = $select['type'];

                $_SESSION['email'] = $select['email'];
                $_SESSION['image'] = $select['img'];
                $_SESSION['cv']    = $select['cv'];
                    header("Location: ".APPURL);
            }else{
                echo "<script>alert('user is invalid')</script>";
            }
        }else{
            echo "<script>alert('user is invalid')</script>";
        }
    }
    }
?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL.'/images/hero_1.jpg' ?>');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Log In</h1>
                    <div class="custom-breadcrumbs">
                        <a href="<?php echo APPURL ?>">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Log In</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form action="login.php" class="p-4 border rounded" method="POST">

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input type="email" id="fname" name="email" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input type="password" name="password" id="fname" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
require_once "../includes/footer.php";
?>