<?php include('database.php') ?>
<?php 

if(isset($_POST['save_student'])){

      $fname = $_POST['f_name']; 
      $lname =  $_POST['l_name'];
      $age =  $_POST['age'];

   
      if($fname == '' || empty($fname)){
            header('location:index.php?message=you need to fill form first');
      }else{

        $query = "insert into `student` (`first_name`, `last_name`,`age`) values ('$fname','$lname','$age')";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed".mysqli_error());

        }
        else{
            header('location:index.php?insert_msg=data has been addd successfully');  
        }

      }
} 

?>