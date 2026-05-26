<?php include 'header.inc'; ?>

<!--Embedded css styling for the articles  -->
<style>
  article {
    background-color: #559455;
    padding: 20px;
    margin: 30px;
    border-radius: 25px;
  }
  article h2 {
    font-size: 2rem;
  }
</style>

<!-- Main content of the page, job listings-->
<main>
  <!-- Inline styling on this H2 to make it stand out-->
    <h2 style="font-size: 1.8rem; color: #2c6e2c; font-style: italic; padding-bottom: 6px;">Current Available Positions</h2>
    <!-- Job Listing 1: Public engagement officer-->

    <form method = "GET" action="jobs.php">
      <input type ="text" name = "search" placeholder="Search jobs...">
      <button type="submit">Search</button>
    </form>
    
  <article>
    <h2> Public Engagement Officer </h2>
    <!-- RefNum class to later style-->
    <p>Reference Number: <span class="RefNum">PE241</span></p>
    <!-- badge class to later style-->
    <aside class="badge"> Visa Sponsorship Available </aside>
    <p>Pioneer the creation of content to foster the promotion of sustainable energy within the wider community. </p>
    <p>Salary: 100k - 120k </p>
    <p>Report to head of Public Engagement</p>

    <hr>
    <section>
      <!-- List of key responsibilities-->
      <h3> Key Responsibilities </h3>
      <ol>
        <li>Create innovative community engagement activities that aid individuals with the benefits of clean energy solutions</li>
        <li>Aid in the planning of community engagement activities </li>
        <li>Create social media content that provides impact on a wider audience </li>
        <li>Ability to work outside of normal work hours to participate within public engagement events </li>
      </ol>
    </section>

    <hr>
    <section>
      <!-- List of essential requirements-->
      <h3>Essential Requirements </h3>
      <ul>
        <li>Experience planning public engagement events</li>
        <li>Experience creating social media content </li>
        <li>Previous experience in communications and community outreach </li>
        <li>Willing to undergo a crime check </li>
      </ul>
    </section>

    <hr>
    <section>
      <!-- List of preferred requirements-->
      <h3>Preferred Requirements</h3>
      <ul>
        <li>Some knowledge about green energy solutions </li>
        <li>Excellent verbal communication skills </li>
        <li>Confidence in public speaking scenarios </li>
        <li>Ability to work in teams and independently</li>
        <li>3+ years of experience in a similar role</li>
      </ul>
    </section>
    <a href="apply.php" class="apply_button">Apply Now</a>
  </article>


  <article>
    <h2>Web Developer</h2>
    <p>Reference Number: <span class="RefNum">WD821</span></p>
    <aside class="badge">Hybrid Work model - 3 days in Office</aside>
    <p> Pioneer the creation of websites to foster the promotion of sustainable energy within the wider community. </p>
    <p> Salary: 120k - 150k</p>
    <p>Report to head of Technology</p>

    <hr>
    <section>
      <!-- List of key responsibilities-->
      <h3> Key Responsibilities </h3>
      <ol>
        <li>Assist in developing frontend web solutions</li>
        <li>Participate in the agile framework</li>
        <li>Write clear maintainable code</li>
        <li>Follow development standards, processes and provide documentation</li>
      </ol>
    </section>

    <hr>
    <section>
      <!-- List of essential requirements-->
      <h3>Essential Requirements </h3>
      <ul>
        <li>1-2 years in software development experience</li>
        <li>Knowledge about git version control </li>
        <li>Problem solving mindset </li>
        <li><strong>Knowledge of CSS, HTML and Javascript </strong></li>
        <li>Willing to undergo a crime check </li>
      </ul>
    </section>

    <hr>
    <section>
      <!-- List of preferred requirements-->
      <h3>Preferred Requirements</h3>
      <ul>
        <li>Some knowledge about green energy solutions </li>
        <li>Excellent verbal communication skills </li>
        <li>Personal Projects</li>
        <li>Ability to work in teams and independently</li>
      </ul>
    </section>
    <a href="apply.php" class="apply_button">Apply Now</a>
  </article>

  <article>
    <h2>Clean Energies Research Expert</h2>
    <p>Reference Number: <span class="RefNum">CE801</span></p>
    <aside class="badge">Hybrid Work model - 2 days in Office</aside>
    <p> Lead research and advocacy efforts to advance clean and sustainable energy solutions, informing policy, engaging communities, and contributing to the global energy transition. </p>
    <p> Salary: 90k - 110k</p>
    <p>Report to head of Science</p>

    <hr>
    <section>
      <!-- List of key responsibilities-->
      <h3> Key Responsibilities </h3>
      <ol>
        <li>Support public engagement initiatives and community outreach programs</li>
        <li>Participate in cross-functional teams and contribute to project planning</li>
        <li>Develop reports and briefs for public and stakeholders</li>
        <li>Lead research and advocacy efforts to advance clean and sustainable energy solutions, informing policy, engaging communities, and contributing to the global energy transition. </li>
      </ol>
    </section>

    <hr>
    <section>
      <!-- List of essential requirements-->
      <h3>Essential Requirements </h3>
      <ul>
        <li>2-4 years of experience in energy research, environmental science, or related field</li>
        <li>Knowledge of renewable energy systems and sustainability frameworks</li>
        <li>Problem solving mindset </li>
        <li>Proficiency in research tools and documentation practices</li>
        <li>Willing to undergo a crime check </li>
      </ul>
    </section>

    <hr>
    <section>
      <!-- List of preferred requirements-->
      <h3>Preferred Requirements</h3>
      <ul>
        <li>Collaborative, curious, and passionate about sustainability </li>
        <li>Excellent verbal communication skills </li>
        <li>Experience with policy engagement or community outreach</li>
        <li>Ability to work in teams and independently</li>
      </ul>
    </section>
    <a href="apply.php" class="apply_button">Apply Now</a>
  </article>

</main>

<?php include 'footer.inc'; ?>