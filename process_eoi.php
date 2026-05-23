<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
   # Does a basic clean of the input data
    function clean_data($data) {
      $data = htmlspecialchars(stripslashes(trim($data)));
      return $data;
   }
   
   $input_fields = ['reference_num', 'first_name', 'last_name', 
                  'dob', 'gender', 'street',
                  'town', 'state', 'postcode', 
                  'email', 'number', 'other_skills'];
   $data = [];
   foreach($input_fields as $field){
      $data[$field] = clean_data(isset($_POST[$field]));
   }
   foreach($data as $field => $data){
      echo "$data\n";
   }
   
   function validate_address(){}
   
 
 
  
 }  else {
    header("Location: apply.php");
 }
?>