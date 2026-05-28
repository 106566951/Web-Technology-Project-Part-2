<?php include 'header.inc'; ?>
<?php include 'nav.php'; ?>
    <main>
        <h2 class="form_title">Application Form</h2>  
        <form method="post" action="process_eoi.php" class="input_form"> 
            <fieldset class="form_field" id="job_num">
                <legend>Job Vacancy</legend>
                <p> 
                    <label for="reference_num">Job Reference Number:</label>
                    <input class="form_input" type="text" id="reference_num" name="reference_num" maxlength="5" minlength="5">
                </p>
            </fieldset>
            <fieldset class="form_field" id="input_user">
                <legend>Applicant Details</legend>
                <p>
                    <label for="first_name">First Name:</label>
                    <input class="form_input" type="text" name="first_name" id="first_name" maxlength="20">
                </p>
                <p>
                    <label for="last_name">Last Name:</label>
                    <input class="form_input" type="text" name="last_name" id="last_name" maxlength="20">
                </p>
                <p>
                    <label for="DOB">Date of Birth:</label>
                    <input class="form_input" type="text" name="dob" id="DOB" placeholder="dd/mm/yyyy" maxlength="10" size="10">
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_gender">
                <legend>Gender</legend>
                <p>
                    <input class="radio_input" type="radio" name="gender" id="other" value="other" checked>
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
                    <input class="form_input" type="text" name="street" id="street" maxlength="40" >
                </p>
                <p>
                    <label for="town">Suburb/Town:</label>
                    <input class="form_input" type="text" name="suburb_town" id="town" maxlength="40"  >
                </p>
                <p>
                    <label for="state">State:</label>
                    <select class="select_input" name="state" id="state">
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
                    <input class="form_input" type="text" name="postcode" id="postcode" maxlength="4" minlength="4">
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_contact">
                <legend>Applicant Contact Details</legend>
                <p>
                    <label for="email">Email:</label>
                    <input class="form_input" type="text" name="email" id="email">
                </p>
                <p>
                    <label for="number">Mobile Number:</label>
                    <input class="form_input" type="text" name="phone_num" id="number" minlength="8" maxlength="12">
                </p>
            </fieldset>
            <fieldset  class="form_field" id="input_skills">
                <legend>Applicant Skill-set</legend>
                <p>
                    <label for="comms">Communication</label>
                    <input type="checkbox" name="skill_set[]" id="comms" value="comms">
                    <label for="strategy">Consultation Strategy Design</label>
                    <input type="checkbox" name="skill_set[]" id="strategy" value="design strategy">
                    <label for="frontend">Frontend development</label>
                    <input type="checkbox" name="skill_set[]" id="frontend" value="frontend">
                    <label for="backend">Backend development</label>
                    <input type="checkbox" name="skill_set[]" id="backend" value="backend">
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
    
<?php include 'footer.inc'; ?>
