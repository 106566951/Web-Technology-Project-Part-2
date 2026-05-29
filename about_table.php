<?php

require_once "./settings.php";
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        
        $create_table = "CREATE TABLE IF NOT EXISTS `member_contributions` (
            `id` int(11) NOT NULL,
            `firstname` varchar(50) NOT NULL,
            `lastname` varchar(50) NOT NULL,
            `shared_responsibility` text NOT NULL,
            `individual1` text NOT NULL,
            `individual2` text NOT NULL,
            `quote` text NOT NULL,
            `translation` text NOT NULL,
            `individual3` text NOT NULL,
            `individual4` text NOT NULL,
            `individual5` text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";        
        
        if (!mysqli_query($conn, $create_table)) { 
            die("Table not created: " . mysqli_error($conn));
        }
        
        $query = "INSERT INTO `member_contributions` (`id`, `firstname`, `lastname`, `shared_responsibility`, `individual1`, `individual2`, `quote`, `translation`, `individual3`, `individual4`, `individual5`) VALUES
        (105917590, 'Kaleb', 'Larkins', 'CSS File', 'Apply.html', 'Styles for application form', 'Non tutti i supereroi indossano un mantello: ALT+TAB', 'Not all heroes wear capes: ALT+TAB', 'ind3','ind4', 'ind5' ),
        (106216450, 'Joshua', 'Joshi', 'CSS File', 'About.html', 'Managing Jira account', 'ബഗ് സ്പ്രേ അടിച്ചിട്ടും ബഗ് റിസോൾവാവണ്ണില്ല', 'The bugs still exist even after I emptied the bug spray', 'Contributions Part 2', 'Contributions Part 3', 'Contributions Part 4', 'Contributions Part 5'),
        (106520711, 'Leo', 'Dalton', 'CSS File', 'Index.html', 'Create navigation menu common', '睡眠方面, 我没睡过.', 'In terms of sleep, I had no sleep', 'Ensure structure of HTML follows accessibility guidelines (semantic tags, readability, etc)', 'Contributions Part 4', 'Contributions Part 5'),
        (106566951, 'Andy', 'Huynh', 'CSS File', 'Jobs page', 'Create appropriate links to Jira project, GitHub repository, Email', 'si ça marche n\'y touchez pas', 'If it works, don\'t touch it.', 'Contributions Part 2', 'Contributions Part 3', 'Contributions Part 4', 'Contributions Part 5')"; 
        
        // ADDED: Execute the insertion query (it was missing in the original)
        if (!mysqli_query($conn, $query)) {
            die("Data insertion failed: " . mysqli_error($conn));
        }
    }
}
?>