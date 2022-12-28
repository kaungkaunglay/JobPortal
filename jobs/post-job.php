<?php
require_once "../config/config.php";
require_once "../includes/header.php";
    ?>
<?php
if(isset($_SESSION['type']) AND $_SESSION['type'] !== "Company"){
    header("Location: ".APPURL);
}
$get_categories = $conn->query("SELECT * FROM categories");
$get_categories->execute();
$get_category = $get_categories->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST['submit'])){
    $job_title = $_POST['job_title'];
    $job_region = $_POST['job_region'];
    $job_type = $_POST['job_type'];
    $vacancy = $_POST['vacancy'];
    $job_category = $_POST['job_category'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    $application_deadline = $_POST['application_deadline'];
    $job_description = $_POST['job_description'];
    $responsibilities = $_POST['responsibilities'];
    $education_experience = $_POST['education_experience'];
    $other_benifits = $_POST['other_benifits'];
    $company_email = $_POST['company_email'];
    $company_name = $_POST['company_name'];
    $company_id = $_POST['company_id'];
    $company_image = $_POST['company_image'];


    $insert = $conn->prepare("INSERT INTO jobs (job_title, job_region, job_type, vacancy, job_category , experience, salary, gender, application_deadline,
         job_description, responsibilities, education_experience, other_benifits, company_email, company_name, company_id, company_image) VALUES(
          :job_title, :job_region, :job_type, :vacancy, :job_category , :experience, :salary, :gender, :application_deadline,
          :job_description, :responsibilities, :education_experience, :other_benifits,  :company_email, :company_name, :company_id, :company_image
         )");

    $insert->execute([

        ':job_title' => $job_title,
        ':job_region' => $job_region,
        ':job_type' => $job_type,
        ':vacancy' => $vacancy,
        ':job_category'  => $job_category ,
        ':experience' => $experience,
        ':salary' => $salary,
        ':gender' => $gender,
        ':application_deadline' => $application_deadline,
        ':job_description' => $job_description,
        ':responsibilities' => $responsibilities,
        ':education_experience' => $education_experience,
        ':other_benifits' => $other_benifits,
        ':company_email' => $company_email,
        ':company_name' => $company_name,
        ':company_id' => $company_id,
        ':company_image' => $company_image
    ]);
    header("Location: ".APPURL.'/jobs/post-job.php');
}

?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="<?php  ?>">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
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
              <div>
                <h2>Post A Job</h2>
              </div>
            </div>
          </div>

        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" action="post-job.php" method="post">

              <!--job details-->

              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input required type="text" name="job_title" class="form-control" id="job-title" placeholder="Product Designer">
              </div>


              <div class="form-group">
                <label for="job-region">Job Region</label>
                <select required name="job_region" class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                      <option>Anywhere</option>
                      <option>San Francisco</option>
                      <option>Palo Alto</option>
                      <option>New York</option>
                      <option>Manhattan</option>
                      <option>Ontario</option>
                      <option>Toronto</option>
                      <option>Kansas</option>
                      <option>Mountain View</option>
                    </select>
              </div>

              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select required name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option>Part Time</option>
                  <option>Full Time</option>
                </select>
              </div>
              <div class="form-group">
                <label for="job-location">Vacancy</label>
                <input required name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
              </div>
                <div class="form-group">
                    <label for="job-type">Job Category</label>
                    <select required name="job_category" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Category">
                        <?php
                        foreach($get_category as $category):
                        ?>
                            <option><?php echo $category->name;  ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

              <div class="form-group">
                <label for="job-type">Experience</label>
                <select required name="experience" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                  <option>1-3 years</option>
                  <option>3-6 years</option>
                  <option>6-9 years</option>
                </select>
              </div>
              <div class="form-group">
                <label for="job-type">Salary</label>
                <select required name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                  <option>$50k - $70k</option>
                  <option>$70k - $100k</option>
                  <option>$100k - $150k</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-type">Gender</label>
                <select required name="gender" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Any</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-location">Application Deadline</label>
                <input required name="application_deadline" type="text" class="form-control" id="" placeholder="e.g. 20-12-2022">
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Job Description</label>
                  <textarea required name="job_description" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Responsibilities</label>
                  <textarea required name="responsibilities" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Education & Experience</label>
                  <textarea required name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Other Benifits</label>
                  <textarea required name="other_benifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
                </div>
              </div>

              <!--company details-->


              <div class="form-group">

                <input value="<?php echo $_SESSION['email']; ?>" required type="hidden" name="company_email" class="form-control" id="" placeholder="Company Email">
              </div>
              <div class="form-group">

                <input required type="hidden" value="<?php echo $_SESSION['username'];  ?>" name="company_name" class="form-control" id="" placeholder="Company Name">
              </div>
              <div class="form-group">

                <input value="<?php echo $_SESSION['id']; ?>" required type="hidden" name="company_id" class="form-control" id="" placeholder="Company ID">
              </div>
              <div class="form-group">

                <input value="<?php echo $_SESSION['image'];?>" required type="hidden" name="company_image" class="form-control" id="" placeholder="Company Image">
              </div>


              <div class="col-lg-4 ml-auto">
                  <div class="row">
                    <div class="col-6">
                      <input required type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                    </div>
                  </div>
              </div>


            </form>
          </div>


        </div>

      </div>
    </section>

    <?php require "../includes/footer.php" ?>

  </div>
  </body>
</html>