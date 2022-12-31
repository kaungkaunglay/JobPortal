<?php  require "../includes/header.php"; ?>
<?php  require "../config/config.php"; ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // getting single jobs info
        $select = $conn->query("SELECT * FROM jobs WHERE id = '$id'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ);
        $job_category = $row->job_category;
        //getting related jobs;
        $related_jobs = $conn->query("SELECT * FROM jobs WHERE job_category = '$job_category' AND status = 1 AND id !='$id'");
        $related_jobs->execute();
        $related_jobs =  $related_jobs->fetchAll(PDO::FETCH_OBJ);
        //getting the count of related jobs;
        $job_count = $conn->query("SELECT COUNT(*) as job_count FROM jobs WHERE job_category = '$job_category' AND status = 1 AND id !='$id'");
        $job_count->execute();
        $job_num =  $job_count->fetchAll(PDO::FETCH_OBJ);
    //submit application
        if(isset($_POST['submit_application'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $cv = $_POST['cv'];
            $worker_id = $_POST['worker_id'];
            $job_id = $_POST['job_id'];
            $job_title = $_POST['job_title'];
            $company_id = $_POST['company_id'];

            $insert = $conn->prepare("INSERT INTO job_applications (username, email, cv, worker_id, job_id, job_title, company_id) VALUES (:username, :email, :cv, :worker_id, :job_id, :job_title, :company_id)");
            $insert->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':cv' => $cv,
                    ':worker_id' => $worker_id,
                    ':job_id' => $job_id,
                    ':job_title' => $job_title,
                    ':company_id' => $company_id
            ]);
            echo "<script>alert('Application sent successfully')</script>";
            header("Location: ".APPURL."/jobs/job-single.php?id=".$id);
        }
        //saving jobs
//        if(isset($_POST['submit_save'])){
//            $job_id = $_POST['job_id'];
//            $worker_id = $_POST['worker_id'];
//            $save_jobs = $conn->prepare("INSERT INTO saved_jobs (job_id, worker_id) VALUES (:job_id , :worker_id)");
//            $save_jobs->execute([
//                    ':job_id' => $job_id,
//                    ':worker_id' => $worker_id
//            ]);
//            echo "<script>alert('Jobs saved successfully')</script>";
//        }

        if(isset($_SESSION['id'])){
            //Checking for saved jobs
            $checking_for_saved_jobs = $conn->query("SELECT * FROM saved_jobs WHERE worker_id= '$_SESSION[id]' AND job_id='$id'");
            $checking_for_saved_jobs->execute();

            // Checking for worker application
            $checking_for_application = $conn->query("SELECT * FROM job_applications WHERE worker_id = $_SESSION[id] AND job_id= '$id'");
            $checking_for_application->execute();
        }




        //getting categories
        $categories = $conn->query("SELECT * FROM categories");
        $categories->execute();
        $all_categories = $categories->fetchAll(PDO::FETCH_OBJ) ;
    }else{
        header("Location: ".APPURL."/404.php");
    }
?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php echo $row->job_title; ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?php echo $row->job_title; ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img style="width: 100px; height: 100px; margin-bottom: 10px; border-radius: 8px;" src="../users/user-images/<?php echo $row->company_image; ?>" alt="Image">
              </div>
              <div>
                <h2><?php echo $row->job_title; ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?php echo $row->company_name; ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?php echo $row->job_region; ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $row->job_type; ?></span></span>
                </div>
              </div>
            </div>
          </div>
    
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="../images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Description</h3>
                <p><?php echo $row->job_description; ?></p>
            </div>
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row->responsibilities; ?></span></li>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <ul class="list-unstyled m-0 p-0">
                  <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row->education_experience?></span></li>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row->other_benifits;?></span></li>
              </ul>
            </div>
            <?php
            if(isset($_SESSION['username'])):
            if(isset($_SESSION['type']) AND $_SESSION['type'] == "Worker"):
            ?>
            <div class="row mb-5">
                <form action="job-single.php?id=<?php  echo $id?>" method="post">
                   <?php
                   if(   $checking_for_saved_jobs->rowCount() ==0):
                   ?>
                    <div style="" class="col-6">
                        <a style="width: 300px; height: 50px;" href="job-save.php?job_id=<?php echo $id; ?>&worker_id=<?php echo $_SESSION['id']; ?>&status=save" class="btn btn-block btn-light btn-md"><i class="icon-heart"></i> Save Job</a>
                    </div>
                   <?php else: ?>
                       <div style="" class="col-6">
                           <a style="width: 300px; height: 50px;" href="job-save.php?job_id=<?php echo $id; ?>&worker_id=<?php echo $_SESSION['id']; ?>&status=delete" class="btn btn-block btn-light btn-md">Delete Saved Job</a>
                       </div>
                   <?php endif; ?>
                </form>
                <?php
                if($checking_for_application->rowCount() == 0):
                    ?>
                <form action="job-single.php?id=<?php echo $id; ?>" method="post">
                    <!--job details-->

                    <div class="form-group">
                        <input  value="<?php echo $_SESSION['username']; ?>" required type="hidden" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['email']; ?>" required type="hidden" name="email" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['cv'];  ?>" required type="hidden" name="cv" class="form-control" id="username" placeholder="cv">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['id'] ?>" required type="hidden" name="worker_id" class="form-control" id="username" placeholder="worker_id">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $id; ?>" required type="hidden" name="job_id" class="form-control" id="username" placeholder="job_id">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $row->job_title; ?>" required type="hidden" name="job_title" class="form-control" id="username" placeholder="job_title">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $row->company_id; ?>" required type="hidden" name="company_id" class="form-control" id="username" placeholder="company_id">
                    </div>
                    <div style="" class="col-6">
                        <button style="padding: 13px 120px; margin-top: -17px;" type="submit" name="submit_application" class="btn btn-inline btn-primary btn-md">Apply</button>
                    </div>
                </form>
                <?php else:  ?>
                    <div class="col-6">
                        <h4 class="d-inline">You've applied for this job.</h4>
                    </div>
                <?php endif;?>
            </div>

            <?php endif; ?>
              <?php else: ?>
              <h2>Login so you can apply for job</h2>
              <?php endif; ?>
            <?php
            if(isset($_SESSION['username'])):
            if(isset($_SESSION['type']) AND $_SESSION['type'] == "Company"):
            if(isset($_SESSION['id']) AND $_SESSION['id'] == $row->company_id):
            ?>

              <div class="row mb-5">
                  <div class="col-6">
                      <a href="<?php echo APPURL ?>/jobs/job-update.php?id=<?php echo $row->id; ?>" class="btn btn-block btn-light btn-md">Update</a>
                      <!--add text-danger to it to make it read-->
                  </div>
                  <div class="col-6">
                      <a style="margin-left: 300px;" href="<?php echo APPURL ?>/jobs/job-delete.php?id=<?php echo $row->id; ?>" class="btn btn-block btn-danger btn-md">Delete</a>
                    </div>
              </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
          </div>

          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on: </strong><?php echo date('M',strtotime($row->created_at)).','.date('d',strtotime($row->created_at)).' '.date('Y',strtotime($row->created_at)); ?></li>
                <li class="mb-2"><strong class="text-black">Vacancy: </strong> <?php echo $row->vacancy; ?></li>
                <li class="mb-2"><strong class="text-black">Employment Status: </strong> <?php echo $row->job_type; ?></li>
                <li class="mb-2"><strong class="text-black">Experience: </strong> <?php echo $row->experience; ?></li>
                <li class="mb-2"><strong class="text-black">Job Location: </strong><?php echo $row->job_region; ?></li>
                <li class="mb-2"><strong class="text-black">Salary: </strong> <?php echo $row->salary; ?></li>
                <li class="mb-2"><strong class="text-black">Gender: </strong> <?php echo $row->gender; ?></li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong><?php echo date('M',strtotime($row->application_deadline)).','.date('d',strtotime($row->application_deadline)).' '.date('Y',strtotime($row->application_deadline)); ?></li>
                  <li class="mb-2"><strong class="text-black">Job Categories: </strong><?php echo ucfirst($row->job_category); ?></li>
              </ul>

            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
              <div class="px-3">
                <a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=".APPURL."/jobs/job-single.php?id=".$row->id."&quote=".$row->job_title;?>"  class="pt-3 pb-3 pr-3 pl-0"> <span class="icon-facebook"></span></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo APPURL ?>/jobs/job-single.php?id=<?php echo $row->id; ?>&text=<?php echo $row->job_title; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://linkedin.com/sharing/share-offsite/?url=<?php echo APPURL ?>/jobs/job-single.php?id=<?php echo $row->id; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
              </div>
            </div>

              <div class="bg-light p-3 border rounded mb-4 mt-4">
                  <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Categories</h3>
                  <ul class="list-unstyled pl-3 mb-0">
                      <?php
                      foreach($all_categories as $category):
                      ?>
                          <a target="_blank" style="text-decoration: none;" href="<?php echo APPURL; ?>/categories/show-jobs.php?name=<?php echo $category->name; ?>"> <li class="mb-2"><strong class="text-black"><?php echo ucfirst($category->name); ?></strong></li></a>
                    <?php endforeach; ?>
                  </ul>

              </div>

          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2"><?php echo $job_num[0]->job_count; ?> Related Jobs</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
            <?php
            foreach($related_jobs as $job):
            ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php echo APPURL ?>/jobs/job-single.php?id=<?php echo $job->id; ?>"></a>
            <div class="job-listing-logo">
              <img src="../users/user-images/<?php echo $job->company_image;  ?>" alt="Image" class="img-fluid">
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
            <br>
            <?php
            endforeach;
            ?>

          

          
        </ul>

     

      </div>
    </section>

    <?php require "../includes/footer.php"?>

  </div>

    <!-- SCRIPTS -->
     
  </body>
</html>