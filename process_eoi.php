/** 
*  process_eoi.php
*
* - Processes the input of the application form 
* - Validates the inputs of the form 
* - Inserts the data into the database.
*
* Author:                Kaleb Larkins
* Date created:          21/5/2026
* Last Modified:         26/5/2026
*/

<?php
require_once "./settings.php";
   # Checks if user came from application form via Post.
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
   #
   $conn = mysqli_connect($host, $user, "", $sql_db);
   if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
   } else{

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
   }
 }  else {
    header("Location: apply.php");
 }
?>