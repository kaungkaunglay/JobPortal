<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php"; ?>
<?php
$select = $conn->query("SELECT * FROM admins");
$select->execute();
$admins = $select->fetchAll(PDO::FETCH_OBJ) ;
if(!isset($_SESSION['adminname']))
{
    $app_url = ADMINURL;
    echo "<script>window.location='$app_url'</script>";
}
?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <a  href="<?php echo ADMINURL ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($admins as $admin ):  ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id;; ?></th>
                    <td><?php echo $admin->adminname; ?></td>
                    <td><?php echo $admin->email; ?></td>
                  </tr>
                <?php  endforeach;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php" ; ?>