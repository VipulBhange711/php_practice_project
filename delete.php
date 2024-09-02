
<?php include('database.php') ?>
<?php
if (isset($_GET['id'])) {

    $id =  $_GET['id'];

    // print_r($id);

    $query = "DELETE FROM `student` WHERE  `id` = '$id'";

    $result =  mysqli_query($connection, $query);

    if (!$result) {
        die("query Failed" . mysqli_error());
    }else{
        header('location:index.php?delete_msg=data has been Delete successfully');
    }
}
?>