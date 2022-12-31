<<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php"; ?>
<?php
if(isset($_SESSION['adminname']))
{
    header("Location: ".ADMINURL) ;
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

        $login = $conn->query("SELECT * FROM admins WHERE email= '$email'");
        $login->execute();

        $select = $login->fetch(PDO::FETCH_ASSOC);
        if($login->rowCount() > 0){
            if(password_verify($password, $select['mypassword'])){
                $_SESSION['adminname'] = $select['adminname'];

                $_SESSION['email'] = $select['email'];

                header("Location: ".ADMINURL."");

            }else{
                echo "<script>alert('user is invalid')</script>";
            }
        }else{
            echo "<script>alert('user is invalid')</script>";
        }
    }
}
?>

        </div>
    </nav>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-5">Login</h5>
                        <form method="POST" class="p-auto" action="login-admins.php">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                            </div>


                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

                            </div>



                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


                        </form>

              <?php  require "../layouts/footer.php"?>