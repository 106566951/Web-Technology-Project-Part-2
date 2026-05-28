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
* Last Modified:         28/5/2026
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
            `eoi_id` int AUTO_INCREMENT  PRIMARY KEY NOT NULL,
            `reference_num` varchar(6) NOT NULL,
            `first_name` varchar(50) NOT NULL,
            `last_name` varchar(50) NOT NULL,
            `dob` date NOT NULL,
            `gender` enum('other','Male','Female') NOT NULL DEFAULT 'other',
            `street` text NOT NULL,
            `suburb_town` varchar(100) NOT NULL,
            `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
            `postcode` int(4) UNSIGNED NOT NULL,
            `email` varchar(100) NOT NULL,
            `phone_num` VARCHAR(12) NOT NULL,
            `skill_set` set('Communication','Consultation Strategy Design','Frontend development','Backend development','Knowledge on Git version control') NOT NULL,
            `other_skills` text NOT NULL,
            `status` enum('New','Current','Final','') NOT NULL DEFAULT 'New'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
         ";
         if(!mysqli_query($conn, $create_table)){ # Creates table if it doesn't exist.
            die("Table not created");
         }
      }
      /**
       * Functions:
       */
      # Does a basic clean of parameter variable
      function clean_data($data) {
         $data = htmlspecialchars(stripslashes(trim($data)));
         return $data;
      }
      # Sends an injection safe query to db.
      function safe_query($conn, $query, $data) {
         $stmt = $conn->prepare($query); # Must right query correctly with placeholders.
         $stmt->bind_param("s", $data);
         $stmt->execute();
         if (!empty($result = $stmt->get_result())){
            return $result;
         }
      }
      /**
       * Sanitisation:
       */
      # Takes each text based input field and cleans the $post inputs.
      $input_fields = ['reference_num', 'first_name', 'last_name', 
                  'dob', 'gender', 'street',
                  'suburb_town', 'state', 'postcode', 
                  'email', 'phone_num', 'other_skills'];
      $data = [];
      foreach($input_fields as $field){
         $data[$field] = isset($_POST[$field]) ? clean_data($_POST[$field]) : '';
      }
      $skill_set = isset($_POST['skill_set[]']) ? implode(', ', $_POST['skill_set[]']) : "" ;
      
      /*
      * Validation:
      */
      $error_messages = []; # To store all errors that occur
      # Validating job reference number:
      if(empty($data['reference_num'])) {
         $error_messages['reference_num'] = "A Job reference is required.";
      } else {
         # Checking database for the reference number.
         $query = "SELECT * FROM jobs WHERE reference_num = ?";
         $result = safe_query($conn, $query, $data['reference_num']);

         if(mysqli_num_rows($result) == 0){
            $error_messages['reference_num'] = "This is not in the Job list.";
         }
      }
      # Validating Names input:
      foreach (['first_name', 'last_name'] as $name) {
         if(empty($data[$name])) {
            $error_messages[$name] = "First and last name is required.";
         } elseif(!preg_match('/^[a-zA-Z]{1,20}$/', $data[$name])) { # Moved regex to php 
            $error_messages[$name] = "Letters only.";
         }
      }
      # Validating date of birth:
      if(empty($data['dob'])) {
         $error_messages['dob'] = "Date of birth is required.";
      } elseif(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data['dob'])) {
         $error_messages['dob'] = "Use dd/mm/yyyy format.";
      } else {
         # Checks if date of birth is within a realistic time frame.
         [$day, $month, $year] = explode('/', $data['dob']);
         if (!checkdate((int)$month, (int)$day, (int)$year)) {
            $error_messages['dob'] = "That is not a valid date.";
         } elseif ((int)$year < 1910 || (int)$year > (date('Y') - 15)) {
            $error_messages['dob'] = "This is an unrealistic date.";
         }
      }
      # Validating street address:
      if(empty($data['street'])) {
         $error_messages['street'] = "Street address is required.";
      } 
      # Validating suburb/town input:
      if(empty($data['suburb_town'])) {
         $error_messages['suburb_town'] = "Suburb/Town is required.";
      } elseif(!preg_match("/^[a-zA-Z\s'-]+$/", $data['suburb_town'])) {
         $error_messages['suburb_town'] = "Please input a valid suburb/town name.";
      }
      # Validating State Input: 
      $allowed_states = ['vic','nsw','qld','nt','wa','sa','tas','act']; # White-listing the states
      if(!in_array($data['state'], $allowed_states)) {
         $error_messages['state'] = "Please select a state";
      }
      # Validating Postcode input: 
      if(empty($data['postcode'])) {
         $error_messages['postcode'] = "Postcode is required";
      } elseif(!preg_match('/^\d{4}$/', $data['postcode'])) {
         $error_messages['postcode'] = "4 numbers only.";
      }
      # Validating email input:
      if(empty($data['email'])) {
         $error_messages['email'] = "Email is required.";
      } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
         $error_messages['email'] = "Please enter a valid email address.";
      }
      # Validating mobile number input: 
      if(empty($data['phone_num'])) {
         $error_messages['phone_num'] = "Number is required."; 
      } elseif(!preg_match('/^\d{8,12}$/', $data['phone_num'])) {
         $error_messages['phone_num'] = "Please enter a valid number between 8-12 digits.";
      }
      # Validating other skills textarea: 
      if(strlen($data['other_skills']) > 500) {
         $error_messages['other_skills'] = "Please keep other skills text to under 500 characters.";
      } elseif(preg_match('/<[^>]*>/', $data['other_skills'])) {
         $error_messages['other_skills'] = "Html tags are not allowed.";
      }
      
      # Handling the errors if any
      echo "<table border='1' cellpadding='5'>";
      if(!empty($error_messages)) {
         echo "<tr><th>Input field</th><th>Error</th></tr>";
         foreach($error_messages as $field => $error) {
            echo "<tr>";
            echo "<td>" . $field . "</td>";
            echo "<td>" . $error . "</td>";
            echo "</tr>";
         }
      } else {
         # Converting date of birth into MySQL format
         [$day, $month, $year] = explode('/', $data['dob']);
         $data['dob'] = "$year-$month-$day"; 
         
         /**
          * Inserting data to Database:
          */
         $query = "INSERT INTO eoi (
         reference_num, first_name, last_name, dob,
         gender, street, suburb_town, state,
         postcode, email, phone_num, skill_set, other_skills) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $conn->prepare($query); # Must right query correctly with placeholders.
         $stmt->bind_param("sssssssssssss", 
         $data['reference_num'], $data['first_name'], $data['last_name'],
         $data['dob'], $data['gender'], $data['street'],
         $data['suburb_town'], $data['state'], $data['postcode'],
         $data['email'], $data['phone_num'], $skill_set,
         $data['other_skills']);
         $stmt->execute();
         
      }
      echo "</table>";
      
   } else {
      header("Location: apply.php");
 }
?>