<?php
require "../includes/header.php";
require "../config/config.php";
?>
<?php
if(isset($_SESSION['type']) AND $_SESSION['type'] !== "Company"){
    header("Location: ".APPURL);
}
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = $conn->prepare("DELETE FROM jobs WHERE id='$id'");
        $delete->execute();
        header("Location: ".APPURL);
    }else{
        echo "404";
    }

?>

<?php require "../includes/footer.php";
?>
