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
   $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
   if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
   } else{
      $table_name = "eoi";
      $stmt = $conn->prepare("SHOW TABLES LIKE ?"); # A query that checks if a table exists
      $stmt->bind_param("s", $table_name); # Verifying which table to check for
      $stmt->execute(); 
      $result = $stmt->get_result(); # Gaining result from query
      
      if ($result->num_rows < 0) { # Checks if table has any rows, if not, Create a table.
         $create_table = "
            CREATE TABLE `eoi` (
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
         if(mysqli_query($conn, $create_table)){
            echo "Created Table!";
         }
      }
         
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