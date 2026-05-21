<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="The Coders" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page</title>
    <link rel="stylesheet" href="/styles/style.css">
    <style></style>
</head>
<body>
    <!-- Header and Navigation Bar --> 
    <header>
        <nav>
            <ul>
                <li><img src="images/greengrid_logo.png" width="50px" height="45px" alt="greengrid_logo"></li>
                <li><h1>GREEN GRID</h1></li>
                <li><a class="navlink" href="index.html">Home Page</a></li>
                <li><a class="navlink" href="apply.html">Apply Now</a></li>
                <li><a class="navlink" href="jobs.html">Job Listings</a></li>
                <li><a class="navlink" href="about.html">About Us</a></li>
            </ul>
    </nav>
    </header>
    <main>
        <h2 class="form_title">Application Form</h2>  
        <form method="post" action="process_eoi.php" class="input_form"> 
            <fieldset class="form_field" id="job_num">
                <legend>Job Vacancy</legend>
                <p> 
                    <label for="reference_num">Job Reference Number:</label>
                    <input class="form_input" type="text" id="reference_num" name="reference_number" maxlength="5" minlength="5" pattern="^[a-zA-Z0-9]+$" required>
                </p>
            </fieldset>
            <fieldset class="form_field" id="input_user">
                <legend>Applicant Details</legend>
                <p>
                    <label for="first_name">First Name:</label>
                    <input class="form_input" type="text" id="first_name" maxlength="20" pattern="^[a-zA-Z]+$" required>
                </p>
                <p>
                    <label for="last_name">Last Name:</label>
                    <input class="form_input" type="text" id="last_name" maxlength="20" pattern="^[a-zA-Z]+$" required>
                </p>
                <p>
                    <label for="DOB">Date of Birth:</label>
                    <input class="form_input" type="text" name="date" id="DOB" placeholder="dd/mm/yyyy" maxlength="10" size="10" pattern="\d{2}/\d{2}/\d{4}" required>
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_gender">
                <legend>Gender</legend>
                <p>
                    <input class="radio_input" type="radio" name="gender" id="other" value="other" required checked>
                    <label for="other">Other</label>
                    <input class="radio_input" type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input class="radio_input" type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_address">
                <legend>Applicant Address</legend>
                <p>
                    <label for="street">Street Address:</label>
                    <input class="form_input" type="text" name="street" id="street" maxlength="40" required>
                </p>
                <p>
                    <label for="town">Suburb/Town:</label>
                    <input class="form_input" type="text" name="town" id="town" maxlength="40" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" required>
                </p>
                <p>
                    <label for="state">State:</label>
                    <select class="select_input" name="state" id="state" required>
                        <option value="">Select State</option>
                        <option value="vic">VIC</option>
                        <option value="nsw">NSW</option>
                        <option value="qld">QLD</option>
                        <option value="nt">NT</option>
                        <option value="wa">WA</option>
                        <option value="sa">SA</option>
                        <option value="tas">TAS</option>
                        <option value="act">ACT</option>
                    </select>
                </p>
                <p>
                    <label for="postcode">Postcode:</label>
                    <input class="form_input" type="text" name="postcode" id="postcode" maxlength="4" minlength="4" pattern="\d{4}" required>
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_contact">
                <legend>Applicant Contact Details</legend>
                <p>
                    <label for="email">Email:</label>
                    <input class="form_input" type="email" name="email" id="email" required>
                </p>
                <p>
                    <label for="number">Mobile Number:</label>
                    <input class="form_input" type="text" name="number" id="number" minlength="8" maxlength="12" pattern="\d{8,12}" required>
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_skills">
                <legend>Applicant Skill-set</legend>
                <p>
                    <label for="comms">Communication</label>
                    <input type="checkbox" name="skills[]" id="comms" value="comms">
                    <label for="strategy">Consultation Strategy Design</label>
                    <input type="checkbox" name="skills[]" id="strategy" value="design strategy">
                    <label for="frontend">Frontend development</label>
                    <input type="checkbox" name="skills[]" id="frontend" value="frontend">
                    <label for="backend">Backend development</label>
                    <input type="checkbox" name="skills[]" id="backend" value="backend">
                </p>
                <p>
                    <label for="other_skills">Other Skills</label><br>
                    <textarea name="other_skills" id="other_skills" rows="5" style="width: 100%; font-size:1rem;" placeholder="List any other skills you think may be useful for this position..."></textarea>
                </p>
            </fieldset>
            <div class="form_field" id="submit_reset">
                <p>
                    <input class="submit_but" type="submit" value="Submit">
                </p>
                <p>
                    <input class="reset_but" type="reset" value="Reset Form">
                </p>
            </fieldset>

	            
        </form>
    </main>
    
    <footer>
        <ul>
            <li><a href="https://greengrid.atlassian.net/jira/software/projects/GG/boards/2"> Jira Project</a></li>
            <li><a href="https://github.com/106566951/Web-Technology-Project-Part-1"> Github Repository</a></li>
            <li>Email: <a href="mailto:info@greengridbusiness.com">info@greengridbusiness.com</a></li>
        </ul>
    </footer>
</body>
</html>