<<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php"; ?>
<?php

if(!isset($_SESSION['adminname']))
{
    $app_url = ADMINURL;
    echo "<script>window.location='$app_url'</script>";
}
if(isset($_POST['submit'])){
    if(empty($_POST['adminname']) OR empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('some inputs are empty')</script>";
    }else {
        $adminname = trim(htmlentities($_POST['adminname']));
        $email = trim(htmlentities($_POST['email']));
        $password = trim(htmlentities($_POST['password']));
        //inserting
        $insert = $conn->prepare("INSERT INTO admins (adminname, email, mypassword) VALUES(:adminname, :email, :mypassword)");
        $insert->execute([
        ':adminname' => $adminname,
        ':email' => $email,
        ':mypassword'  => password_hash($password, PASSWORD_DEFAULT),
         ]);
         header("Location: create-admins.php");
    }
}
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php"">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input required type="text" name="adminname" id="form2Example1" class="form-control" placeholder="Admin name" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input  required type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                </div>
                <div class="form-outline mb-4">
                  <input required  type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"; ?>
