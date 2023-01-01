<?php
require "../layouts/header.php";
require "../../config/config.php";
?>
<?php
if(!isset($_SESSION['adminname']))
{
    $app_url = ADMINURL;
    echo "<script>window.location='$app_url'</script>";
}
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = $conn->prepare("DELETE FROM categories WHERE id = '$id'");
        $delete->execute();
        header("Location: ".ADMINURL."/categories-admins/show-categories.php");
    }else{
        header("Location: ".APPURL."/404.php");
    }
?>
<?php require "../layouts/footer.php";  ?>