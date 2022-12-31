<?php  require "../includes/header.php"; ?>
<?php  require "../config/config.php"; ?>

<?php
//if the worker is not the worker type of user
if(!isset($_SESSION['type']) AND $_SESSION['type'] !== 'Worker'){
    header("Location: ".APPURL);
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    //Other user id is not allowed
    if($_SESSION['id'] !== $id)
    {
        header("Location: ". APPURL);
    }
    $select = $conn->query("SELECT * FROM users WHERE id='$id'");
    $select->execute();
    $profile = $select->fetchAll(PDO::FETCH_OBJ);

    // Grapping saved_jobs
    $saved_jobs = $conn->query("SELECT * FROM jobs INNER JOIN saved_jobs ON jobs.id = saved_jobs.job_id WHERE worker_id = 3");
    $saved_jobs->execute();
    $jobs = $saved_jobs->fetchAll(PDO::FETCH_OBJ);

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
<section class="site-section">
    <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Saved Jobs</h2>
                </div>
            </div>

        <ul class="job-listings mb-5">
            <?php
            foreach($jobs as $job):
                ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                    <a href="<?php echo APPURL; ?>/jobs/job-single.php?id=<?php echo $job->id; ?>"></a>
                    <div class="job-listing-logo">
                        <img src="user-images/<?php echo $job->company_image; ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
                    </div>

                    <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2><?php echo $job->job_title; ?></h2>
                            <strong><?php echo $job->company_name; ?></strong>
                        </div>
                        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> <?php echo $job->job_region; ?>
                        </div>
                        <div class="job-listing-meta">
                            <span class="badge badge-<?php if($job->job_type == 'Part Time'){ echo 'danger'; } else {echo 'success'; } ?>"><?php echo $job->job_type; ?></span>
                        </div>
                    </div>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php require "../includes/footer.php "; ?>
