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
        // Generate Random Password
        $tmp_id = hash("sha256",uniqid()) ;
        //Insert into database ;
        $insert = $conn->prepare("INSERT INTO password_rest (temp_password, email) VALUES (:tmp_pass, :email)");
        $insert->execute([
            ":tmp_pass" => $tmp_id,
            ":email" => $_SESSION['reset_email']
        ]);
        //sent password to email
        //Basic Configuration
        try{
            $mail = new PHPMailer(true);
        //            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host=  'ssl://smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "kk8225248@gmail.com";
            $mail->Password = "yikxayiyhlnuictp";
            $mail->Port = 465;
            //recipients
            $mail->setFrom("kk8225248@gmail.com","No Reply",0);
            $mail->addAddress($_SESSION['reset_email']);
            // Content
            $mail->isHTML(true);
            $mail->Subject = "Password Reset Request";
            $mail->Body = "Your Temporary Password is: ".$tmp_id;
            $mail->send();

        }catch(Exception $exception){
            die($exception->getMessage()) ;
        }
    if(!isset($_SESSION['reset_email'])) {
        header("Location: index.php");
    }
    if(isset($_POST['submit'])){
        $password = trim($_POST['password']);
        $email = $_SESSION['reset_email'];
        // select password ;
        $select = $conn->query("SELECT * FROM password_rest WHERE email = '$email'");
        $select->execute();
        $data = $select->fetch(PDO::FETCH_OBJ);
        if($password === $data->temp_password){
            // Delete Existing Password;
            $delete = $conn->prepare("DELETE FROM password_rest WHERE email = '$email'");
            $delete->execute();
            header("Location: create_new_password.php");
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
                    <form action="check.php" class="p-4 border rounded" method="POST">

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Enter Temporary Password sent to Your Email: <?php echo $_SESSION['reset_email']; ?> </label>
                                <input type="text" name="password" id="fname" class="form-control" placeholder="Temporary Password">
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