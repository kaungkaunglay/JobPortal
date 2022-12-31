<?php
require "layouts/header.php";
require "../config/config.php";

if(!isset($_SESSION['adminname']))
{
    header("Location: ".ADMINURL."/admins/login-admins.php") ;
}
    //grab jobs
    $jobs = $conn->query("SELECT COUNT(*) AS count FROM jobs");
    $jobs->execute();
    $number_of_jobs = $jobs->fetch(PDO::FETCH_OBJ);

    //grab categories
    $categories = $conn->query("SELECT COUNT(*) AS count_cats FROM categories");
    $categories->execute();
    $number_of_categories = $categories->fetch(PDO::FETCH_OBJ);

    //grab admins
    $admins = $conn->query("SELECT COUNT(*) AS count_admin FROM admins");
    $admins->execute();
    $number_of_admins = $admins->fetch(PDO::FETCH_OBJ);
?>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
                <?php echo $_SESSION['adminname']; ?>
              <h5 class="card-title">Jobs</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of jobs: <?php echo $number_of_jobs->count; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $number_of_categories->count_cats; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $number_of_admins->count_admin?></p>
              
            </div>
          </div>
        </div>
      </div>
    <?php  require "layouts/footer.php" ; ?>
