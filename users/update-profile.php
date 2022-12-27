<?php
require "../includes/header.php";
require "../config/config.php" ;
?>

<?php
if(!isset($_SESSION['username'])){
    header("location: ".APPURL);
}

if(isset($_GET['upd_id'])){
    $id = $_GET['upd_id'];
    if($_SESSION['id'] !== $id){
        header("location: ".APPURL);
    }
    $select = $conn->query("SELECT * FROM users WHERE id='$id'");
    $select->execute() ;
    $row = $select->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) OR empty($_POST['email'])){
            echo "<script>alert('username or email is empty')</script>";
        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $bio   = $_POST['bio'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $linkedin  = $_POST['linkedin'];
            // Files
            $image = $_FILES['img']['name'];
            $cv = $row[0]->type=='Worker'? $cv = $_FILES['cv']['name']: $cv = 'NULL';
            // Image for directory
            $dir_img  = 'user-images/'.basename($image);
            $dir_cv = 'user-cvs/'.basename($cv);

            $update = $conn->prepare("UPDATE users SET username =  :username, email = :email, title = :title, bio = :bio, facebook = :facebook, twitter = :twitter, linkedin = :linkedin, img = :img, cv = :cv WHERE id = '$id'");
            if($image !== "" OR $cv !== ""){
                    if(!is_null($image)){
                        $old_img_link = "user-images/".$row[0]->img;
                        if(file_exists($old_img_link)){
                            unlink($old_img_link);
                        }
                    }
                    if(!is_null($cv)){
                        $old_cv_link = "user-cvs/".$row[0]->cv;
                        if(file_exists($old_cv_link)){
                            unlink($old_cv_link);
                        }
                    }



                $update->execute([
                    ':username' => trim($username),
                    ':email' => $email,
                    ':title' => $title,
                    ':bio' => $bio,
                    ':facebook' => $facebook,
                    ':twitter' => $twitter,
                    ':linkedin' => $linkedin,
                    ':img' => $image,
                    ':cv' => $cv
                ]);
            } else{
                $update->execute([
                    ':username' => trim($username),
                    ':email' => $email,
                    ':title' => $title,
                    ':bio' => $bio,
                    ':facebook' => $facebook,
                    ':twitter' => $twitter,
                    ':linkedin' => $linkedin,
                    ':img' => $row[0]->img,
                    ':cv' => $row[0]->cv
                ]);
            }

            if(move_uploaded_file($_FILES['img']['tmp_name'], $dir_img) AND move_uploaded_file($_FILES['cv']['tmp_name'],$dir_cv)){
             //   header("Location: ".APPURL);
            }
        }
    }
}else{
    echo "404";
}
?>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Update Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Update Profile</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form action="update-profile.php?upd_id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="">

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Username</label>
                            <input value="<?php echo $row[0]->username;  ?>" type="text" id="fname" class="form-control" name="username">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Email</label>
                            <input value="<?php echo $row[0]->email ?>" type="email" name="email" id="lname" class="form-control">
                        </div>
                    </div>
        <?php if(isset($_SESSION['type']) AND $_SESSION['type'] == 'Worker'):
        ?>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="fname">Title</label>
                            <input value="<?php echo $row[0]->title ?>" name="title" type="text" id="email" class="form-control">
                        </div>
                    </div>
            <?php else: ?>
        <div class="row form-group">

            <div class="col-md-12">
                <input value="NULL" name="title" type="hidden" id="email" class="form-control">
            </div>
        </div>
            <?php endif;?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Bio</label>
                            <textarea name="bio" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."><?php echo $row[0]->bio ?></textarea>
                        </div>
                    </div>

<!--                    <div class="row form-group">-->
<!---->
<!--                        <div class="col-md-12">-->
<!--                            <label class="text-black" for="subject">bio</label>-->
<!--                            <input type="subject" id="subject" class="form-control">-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Facebook</label>
                            <input value="<?php echo $row[0]->facebook ?>" name="facebook" type="subject" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Twitter</label>
                            <input value="<?php echo $row[0]->twitter ?>" name="twitter" type="subject" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Linkedin</label>
                            <input value="<?php echo $row[0]->linkedin ?>" name="linkedin" type="subject" id="linkedin" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Image</label>
                            <input name="img" type="file" id="linkedin" class="form-control">
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['type']) and $_SESSION['type'] == 'Worker'):
                    ?>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">CV</label>
                            <input name="cv" type="file" id="linkedin" class="form-control">
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <input name="cv" type="hidden" value="NULL" id="linkedin" class="form-control">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>


                </form>
            </div>
<!--            <div class="col-lg-5 ml-auto">-->
<!--                <div class="p-4 mb-3 bg-white">-->
<!--                    <p class="mb-0 font-weight-bold">Address</p>-->
<!--                    <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>-->
<!---->
<!--                    <p class="mb-0 font-weight-bold">Phone</p>-->
<!--                    <p class="mb-4"><a href="#">+1 232 3235 324</a></p>-->
<!---->
<!--                    <p class="mb-0 font-weight-bold">Email Address</p>-->
<!--                    <p class="mb-0"><a href="#">youremail@domain.com</a></p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</section>
<?php require "../includes/footer.php" ?>