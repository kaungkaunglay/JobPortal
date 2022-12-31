<?php  require "../includes/header.php"; ?>
<?php  require "../config/config.php"; ?>

<?php
$select = $conn->query("SELECT * FROM users WHERE type = 'Company'");
$select->execute();
$all_companies = $select->fetchAll(PDO::FETCH_OBJ) ;
?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APPURL.'/images/hero_1.jpg' ?>');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Companies</h1>
                <div class="custom-breadcrumbs">
                    <a href="<?php echo APPURL ?>">Companies</a> <span class="mx-2 slash">/</span>
                    <span class="text-white">Workers</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-section" style="" id="home-section">
    <div class="container">
        <div class="row">
            <?php foreach($all_companies as $company): ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 200px;" class="card-img-top" src="../users/user-images/<?php echo $company->img; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $company->username; ?></h5>
                            <p class="card-text"><?php  echo substr($company->bio,0,50) ; ?></p>
                            <a href="../users/public-profile.php?id=<?php echo $company->id; ?>" class="btn btn-primary">Go to Profile</a>
                        </div>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
require "../includes/footer.php";
?>
