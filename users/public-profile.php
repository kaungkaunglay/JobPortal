<?php
require "../includes/header.php" ;
require "../config/config.php" ;
?>
<?php
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = $conn->query("SELECT * FROM users WHERE id='$id'");
        $select->execute();
        $profile = $select->fetchAll(PDO::FETCH_OBJ);
}else{
    echo "404" ;
}
?>
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL.'/images/hero_1.jpg' ?>');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Log In</h1>
                    <div class="custom-breadcrumbs">
                        <a href="<?php echo APPURL ?>">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong><?php echo $profile[0]->username; ?></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="site-section" style="" id="home-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="user-images/<?php echo $profile[0]->img;  ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <?php
                        if(isset($_SESSION['type']) AND $_SESSION['type'] == 'Worker'):
                        ?>
                             <a class="btn btn-success" href="#" role="button" download>Download CV</a>
                        <?php endif; ?>
                        <h5 class="mt-2 mb-0"><?php echo $profile[0]->username; ?></h5>
                       <?php
                    if(isset($_SESSION['type']) AND $_SESSION['type'] == 'worker'):
                       ?>
                        <span><?php echo $profile[0]->title; ?></span>
                    <?php endif; ?>
                        <div class="px-4 mt-1">
                            <p class="fonts"><?php echo $profile[0]->bio; ?> </p>

                        </div>

                        <div class="px-3">
                            <a href="<?php echo $profile[0]->facebook; ?>" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            <a href="<?php echo $profile[0]->twitter; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="<?php echo $profile[0]->linkedin; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>



                    </div>




                </div>
            </div>
        </div>


    </div>
</section>
<?php  require "../includes/footer.php"?>