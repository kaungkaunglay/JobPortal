<?php
require "../layouts/header.php";
require "../../config/config.php";
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM jobs WHERE id = '$id'");
    $delete->execute();
    header("Location: ".ADMINURL."/categories-admins/show-jobs.php");
}else{
    header("Location: ".APPURL."/404.php");
}
?>
<?php require "../layouts/footer.php";  ?>