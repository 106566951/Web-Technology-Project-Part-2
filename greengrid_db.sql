-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 01:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greengrid_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
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
  `phone_num` varchar(12) NOT NULL,
  `skill_set` text NOT NULL,
  `other_skills` text NOT NULL,
  `status` enum('New','Current','Final','') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `reference_num`, `first_name`, `last_name`, `dob`, `gender`, `street`, `suburb_town`, `state`, `postcode`, `email`, `phone_num`, `skill_set`, `other_skills`, `status`) VALUES
(1, 'ce801', 'Josh', 'Allen', '2007-04-22', 'Male', '100 swanston st', 'melbourne', 'VIC', 3000, 'rty@hmail.com', '0487649300', 'Communication, Frontend development', 'nn', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `reference_num` varchar(50) NOT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `reports_to` varchar(255) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_requirements` text DEFAULT NULL,
  `preferred_requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `reference_num`, `badge`, `description`, `salary`, `reports_to`, `responsibilities`, `essential_requirements`, `preferred_requirements`) VALUES
(1, 'Public Engagement Officer', 'PE241', 'Visa Sponsorship Available', 'Pioneer the creation of content to foster the promotion of sustainable energy within the wider community.', '100k - 120k', 'Head of Public Engagement', 'Create innovative community engagement activities that aid individuals with the benefits of clean energy solutions|Aid in the planning of community engagement activities|Create social media content that provides impact on a wider audience|Ability to work outside of normal work hours to participate within public engagement events', 'Experience planning public engagement events|Experience creating social media content|Previous experience in communications and community outreach|Willing to undergo a crime check', 'Some knowledge about green energy solutions|Excellent verbal communication skills|Confidence in public speaking scenarios|Ability to work in teams and independently|3+ years of experience in a similar role'),
(2, 'Web Developer', 'WD821', 'Hybrid Work Model - 3 days in Office', 'Pioneer the creation of websites to foster the promotion of sustainable energy within the wider community.', '120k - 150k', 'Head of Technology', 'Assist in developing frontend web solutions|Participate in the agile framework|Write clear maintainable code|Follow development standards, processes and provide documentation', '1–2 years in software development experience|Knowledge about git version control|Problem solving mindset|Knowledge of CSS, HTML and Javascript|Willing to undergo a crime check', 'Some knowledge about green energy solutions|Excellent verbal communication skills|Personal Projects|Ability to work in teams and independently'),
(3, 'Clean Energies Research Expert', 'CE801', 'Hybrid Work Model - 2 days in Office', 'Lead research and advocacy efforts to advance clean and sustainable energy solutions, informing policy, engaging communities, and contributing to the global energy transition.', '90k - 110k', 'Head of Science', 'Support public engagement initiatives and community outreach programs|Participate in cross-functional teams and contribute to project planning|Develop reports and briefs for public and stakeholders|Lead research and advocacy efforts to advance clean and sustainable energy solutions', '2–4 years of experience in energy research, environmental science, or related field|Knowledge of renewable energy systems and sustainability frameworks|Problem solving mindset|Proficiency in research tools and documentation practices|Willing to undergo a crime check', 'Collaborative, curious, and passionate about sustainability|Excellent verbal communication skills|Experience with policy engagement or community outreach|Ability to work in teams and independently'),
(4, 'Sustainability Communications Manager', 'SCM242', 'Remote Friendly', 'Lead the internal and external communications strategies to advance our clean energy mission and drive public understanding of renewable energy projects and initiatives.', '90k - 110k', 'Head of Communications', 'Develop and manage communications campaigns promoting renewable energy projects and website content|Coordinate press releases, media inquiries, and stakeholder briefings|Oversee internal newsletters and staff communications relating to project updates|Track campaign performance metrics and prepare reports for leadership', '3+ years experience in a communications role|Proven media relations experience|Strong copywriting and editing proficiency|Demonstrated stakeholder management skills|Willing to undergo a crime check', 'Background in the energy or sustainability sector|Crisis communications experience|Proficiency in Adobe Creative Suite|Ability to work in teams and independently'),
(5, 'Green Energy Education Coordinator', 'GEE243', 'Visa Sponsorship Available', 'Design and deliver educational programmes that inspire schools, universities, and community groups to engage with renewable energy principles and clean energy projects.', '80k - 95k', 'Education Lead', 'Develop curriculum materials on clean energy topics for diverse age groups|Facilitate workshops and presentations at schools, community centres, and public events|Build and maintain partnerships with educational institutions to expand outreach|Evaluate programme effectiveness and refine content based on participant feedback', 'Experience in teaching, training, or programme facilitation|Demonstrated curriculum or programme development skills|Strong written and verbal communication|Valid drivers licence for travel to event locations|Willing to undergo a crime check', 'Background in science or environmental education|Bilingual communication skills|Familiarity with solar, wind, or other renewable energy technologies|Ability to work in teams and independently'),
(6, 'Digital Outreach Specialist', 'DOS244', 'Remote Friendly', 'Grow our digital presence and drive online engagement across social platforms, email, and web channels to raise awareness of our renewable energy solutions and project updates.', '75k - 90k', 'Digital Marketing Manager', 'Manage day-to-day social media accounts across Instagram, LinkedIn, and X|Produce short-form video content, infographics, and written posts aligned with project campaigns|Plan and run targeted digital advertising campaigns and monitor ROI|Engage with online communities and respond to audience queries about energy solutions', '2+ years experience in social media management|Proven content creation skills across multiple formats|Experience with analytics platforms such as GA4|Hands-on paid media and digital advertising experience|Willing to undergo a crime check', 'Video editing skills using tools such as Premiere or CapCut|Working knowledge of SEO best practices|Genuine interest in environmental advocacy or clean energy|Ability to work in teams and independently'),
(7, 'Corporate Partnerships Officer', 'CPO245', 'Immediate Start', 'Identify and cultivate strategic partnerships with businesses and organisations to co-develop and co-fund clean energy community initiatives and expand project reach.', '105k - 125k', 'Director of Partnerships', 'Prospect and onboard corporate partners whose values align with our sustainability mission|Negotiate sponsorship agreements, MoUs, and co-branding arrangements|Steward existing partner relationships through regular reporting, updates, and events|Contribute to annual partnership revenue targets in line with strategic objectives', 'Proven B2B relationship management experience|Experience in contract negotiation and partnership agreements|Proficiency with CRM platforms|Bachelor degree or equivalent professional experience|Willing to undergo a crime check', 'Knowledge of CSR, ESG frameworks, or sustainability reporting|Established corporate network relevant to the energy sector|5+ years experience in partnerships or business development|Ability to work in teams and independently');

-- --------------------------------------------------------

--
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `shared_responsibility` text NOT NULL,
  `quote` text NOT NULL,
  `translation` text NOT NULL,
  `individual1` text DEFAULT NULL,
  `individual2` text DEFAULT NULL,
  `individual3` text DEFAULT NULL,
  `individual4` text DEFAULT NULL,
  `individual5` text DEFAULT NULL,
  `individual6` text DEFAULT NULL,
  `individual7` text DEFAULT NULL,
  `individual8` text DEFAULT NULL,
  `individual9` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`id`, `firstname`, `lastname`, `shared_responsibility`, `quote`, `translation`, `individual1`, `individual2`, `individual3`, `individual4`, `individual5`, `individual6`, `individual7`, `individual8`, `individual9`) VALUES
(105917590, 'Kaleb', 'Larkins', 'CSS File', 'Non tutti i supereroi indossano un mantello: ALT+TAB', 'Not all heroes wear capes: ALT+TAB', 'apply.html', 'Styles for application form', 'Created Expression of Interest table, if not existing then dynamically through SQL code in php.', 'Implemented record validation to secure the data', 'Created specify functions such clean_data($data), safe_query($conn, $query, $data) to validate to prevent Cross-Site Scripting ', 'Created process_eoi.php which loads the EOI form created by the user and stores it to the EOI table.', 'Implemented array to store all fields declared in the apply.php', NULL, NULL),
(106216450, 'Joshua', 'Joshi', 'CSS File', 'ബഗ് സ്പ്രേ അടിച്ചിട്ടും ബഗ് റിസോൾവാവണ്ണില്ല', 'The bugs still exist even after I emptied the bug spray', 'about.html', 'Managing Jira account', 'Created greengrid_db Database for storing and loading data into the web pages', 'Created settings.php with host, user name, password, database name.', 'Created table for dynamically loading member contributions to about page.', 'Managing group presentation and assigning topics to members.', 'Validating  Code in W3C and WAVE extension.', 'Ensuring the web pages are user friendly and follow Web Accessibility guidelines', 'Creating README.md page'),
(106520711, 'Leo', 'Dalton', 'CSS File', '睡眠方面, 我没睡过', 'In terms of sleep, I had no sleep.', 'index.html', 'Create navigation menu common.', 'Created shared header.php and footer.php', 'Improved the overall CSS of the Web pages', 'Created manage.php to handle user login session', 'Created user table to store user associated session details', 'Security aspect for HD', 'Updated manage.php page to give certain controls to the manager*', NULL),
(106566951, 'Andy', 'Huynh', 'CSS File', 'si ça marche n\'y touchez pas', 'If it works, don\'t touch it.', 'jobs.html', 'Create appropriate links to Jira project, GitHub repository, Email', 'Created job  table', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi` 
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE `eoi` ADD FULLTEXT KEY `street` (`street`);
ALTER TABLE `eoi` ADD FULLTEXT KEY `suburb_town` (`suburb_town`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_num` (`reference_num`);

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
