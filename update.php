<?php include('header.php') ?>
<?php include('database.php') ?>

<?php 


if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = " select *  from `student` where `id` = '$id'";

    $result =  mysqli_query($connection, $query);

    if (!$result) {
        die("query Failed" . mysqli_error());
    } 
    else {
  

        $row = mysqli_fetch_assoc($result);

        // print_r($row);

}
    }

    ?>


<?php

if(isset($_POST['update_student'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
 

    $query =  "UPDATE `student` SET `first_name`='$fname',`last_name`='$lname',`age`='$age' WHERE `id`= '$idnew'";

    $result =  mysqli_query($connection, $query);

    if (!$result) {
        die("query Failed" . mysqli_error());
    }else{
        header('location:index.php?update_msg=data has been updated successfully'); 
    }
}

?>

<form action="update.php?id_new=<?php echo $id; ?>" method="post">
<div class="modal-body">

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" Name="f_name" value="<?php echo $row['first_name'] ?>">

</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" Name="l_name" value="<?php echo $row['last_name'] ?>">
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    <input type="text" class="form-control" id="exampleInputPassword1" Name="age" value="<?php echo $row['age'] ?>">
</div>


</div>

<button type="submit" class="btn btn-primary" value="add student" Name="update_student">Update Student</button>

</form>


<?php include('footer.php') ?>