<?php
/** 
*  process_eoi.php
*
* - Processes the input of the application form 
* - Validates the inputs of the form 
* - Inserts the data into the database.
*
* Author:                Kaleb Larkins
* Date created:          21/5/2026
* Last Modified:         27/5/2026
*/

require_once "./settings.php";
   # Checks if user came from application form via Post.
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
      # Connects to the database with a check.
      $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
      } else{
         $create_table = "
            CREATE TABLE IF NOT EXISTS `eoi` (
            `EOI_ID` INT AUTO_INCREMENT PRIMARY KEY,
            `reference_num` int(6) UNSIGNED NOT NULL,
            `firstname` varchar(50) NOT NULL,
            `lastname` varchar(50) NOT NULL,
            `dob` date NOT NULL,
            `gender` enum('other','Male','Female') NOT NULL DEFAULT 'other',
            `street_address` text NOT NULL,
            `suburb_town` varchar(100) NOT NULL,
            `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
            `postcode` int(4) UNSIGNED NOT NULL,
            `email` varchar(100) NOT NULL,
            `phone_num` int(10) UNSIGNED ZEROFILL NOT NULL,
            `skill_set` set('Communication','Consultation Strategy Design','Frontend development','Backend development','Knowledge on Git version control') NOT NULL,
            `other_skills` text NOT NULL,
            `status` enum('New','Current','Final','') NOT NULL DEFAULT 'New'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
         ";
         if(!mysqli_query($conn, $create_table)){ # Creates table if it doesn't exist.
            die("Table not created");
         }
      }
         
      # Does a basic clean of parameter variable
      function clean_data($data) {
         $data = htmlspecialchars(stripslashes(trim($data)));
         return $data;
      }
      # Takes each text based input field and cleans the $post inputs.
      $input_fields = ['reference_num', 'first_name', 'last_name', 
                  'dob', 'gender', 'street',
                  'town', 'state', 'postcode', 
                  'email', 'number', 'other_skills'];
      $data = [];
      foreach($input_fields as $field){
         $data[$field] = isset($_POST[$field]) ? clean_data($_POST[$field]) : '';
      }
      
      /*
      * This next chunk of code validates each field
      * and generates errors if any.
      */
      $error_messages = []; # To store all errors that occur
      # Validating job reference number
      if(empty($data['reference_num'])) {
         $error_messages['reference_num'] = "A Job reference is required.";
      } else {
         # Checking database for the reference number.
         $stmt = $conn->prepare("SELECT * FROM jobs WHERE reference_num = ?");
         $stmt->bind_param("s", $data['reference_num']);
         $stmt->execute();
         $result = $stmt->get_result();
         if(mysqli_num_rows($result) == 0){
            $error_messages['reference_num'] = "This is not in the Job list.";
         }
      }
      # Validating Name input
      foreach (['first_name', 'last_name'] as $name) {
         if(empty($data[$name])) {
            $error_messages[$name] = "First and last name is required.";
         } elsif(!preg_match('^[a-zA-Z]+$', $data[$name])) {
            $error_messages[$name] = "Letters only.";
         }
      }

   } else {
      header("Location: apply.php");
 }
?>