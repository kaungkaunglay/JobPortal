<?php
// To Email Required Files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

require_once "../../config/config.php";
?>
<?php
require_once "../../includes/header.php";
?>
<?php
if(!isset($_SESSION['reset_email'])){
    header("Location: check.php");
}else{
    $email = $_SESSION['reset_email'];
}
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $retype_password = $_POST['re_type_password'];
        if($password != $retype_password){
            echo "<script>alert('passwords are not the same ')</script>";
        }else{
            $update = $conn->prepare("UPDATE users SET mypassword = :password WHERE email = '$email'");
            $update->execute([
                ':password' => hash("sha256",$password)
            ]);
            unset($_SESSION['reset_email']);
            header("Location: ".APPURL."/auth/login.php");
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
                    <form action="create_new_password.php" class="p-4 border rounded" method="POST">

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Enter New Password </label>
                                <input type="text" name="password" id="fname" class="form-control" placeholder="Password*********">
                            </div>
                        </div>

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Retype New Password </label>
                                <input type="text" name="re_type_password" id="fname" class="form-control" placeholder="New Password*********">
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
require_once "../../includes/footer.php";
?>