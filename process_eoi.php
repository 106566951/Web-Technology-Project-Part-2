<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $job_num = $_POST['']
   $first_name = $_POST['']
   $last_name = $_POST['']
   $DOB = $_POST['']
   $gender = $_POST['']
   $street_address = $_POST['']
   $suburb = $_POST['']
   $state = $_POST['']
   $postcode = $_POST['']
   $email = $_POST['']
   $mobile = $_POST['']
   $skills = $_POST['']
   $extra_skills = $_POST['']
   
 
   function validate_address(){}
   
 
 
   function clean_data($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
 }  else {
    header("Location: apply.php");
 }
?>