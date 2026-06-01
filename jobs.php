<?php
//Connect to database
require_once "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
//If connection fails, show error
if(!$conn) die("Connection Failed: ". mysqli_connect_error());

// If a search term was submitted, use a prepared statement to prevent SQL injection
if(!empty($_GET['search'])) {
    $search = "%" . $_GET['search'] . "%";
    // Prepare the query with placeholders for title and reference number search
    $stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE title LIKE ? OR reference_num LIKE ?");
    // Bind the search parameter to both placeholders
    mysqli_stmt_bind_param($stmt, "ss", $search, $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // No search term, show all items
} else {
    $result = mysqli_query($conn, "SELECT * FROM jobs");
}
?>


<?php include 'header.inc'; ?>


<style>
  /* Styling for article */
  article {
    background-color: #559455;
    padding: 20px;
    margin: 30px;
    border-radius: 25px;
  }

  article:hover {
    transform: scale(1.04);
  } 

  article h2 { font-size: 2rem; }
</style>


<!-- Main content of the page, job listings-->
<main>
  <!-- Inline styling on this H2 to make it stand out-->
  <h2 style="font-size: 1.8rem; color: #2c6e2c; font-style: italic; padding-bottom: 6px;">Current Available Positions</h2>
  <form method="GET" action="jobs.php">

    <!--Suggested search items for job searchbar-->
    <input type="text" id="search" name="search" placeholder="Search jobs..." list="search-suggestions">
      <datalist id="search-suggestions">
      <option value="Public Engagement Officer"></option>
      <option value="Web Developer"></option>
      <option value="Clean Energies Research Expert"></option>
      <option value="Sustainability Communications Manager"></option>
      <option value="Green Energy Education Coordinator"></option>
      <option value="Digital Outreach Specialist"></option>
      <option value="Corporate Partnerships Officer"></option>
    </datalist>
    <button type="submit">Search</button>
    <a href="jobs.php"><button type="button">Reset</button></a>
  </form>

  <?php if (mysqli_num_rows($result) === 0): ?>
    <p>No jobs found matching your search.</p>
  <?php else: ?>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <article class="jobs_article">
      <h2><?php echo htmlspecialchars($row['title']); ?></h2>
      <p>Reference Number: <span class="RefNum"><?php echo htmlspecialchars($row['reference_num']); ?></span></p>
      <span class="badge"><?php echo htmlspecialchars($row['badge']); ?></span>
      <p><?php echo htmlspecialchars($row['description']); ?></p>
      <p>Salary: <?php echo htmlspecialchars($row['salary']); ?></p>
      <p>Report to <?php echo htmlspecialchars($row['reports_to']); ?></p>
      <hr>
      <section>
        <!-- List of key responsibilities-->
        <h3>Key Responsibilities</h3>
        <ol>
          <?php foreach (explode('|', $row['responsibilities']) as $item) { ?>
            <li><?php echo htmlspecialchars($item); ?></li>
          <?php } ?>
        </ol>
      </section>
      <hr>
      <section>
        <!-- List of essential requirements-->
        <h3>Essential Requirements</h3>
        <ul>
          <?php foreach (explode('|', $row['essential_requirements']) as $item) { ?>
            <li><?php echo htmlspecialchars($item); ?></li>
          <?php } ?>
        </ul>
      </section>
      <hr>
      <section>
        <!-- List of preferred requirements-->
        <h3>Preferred Requirements</h3>
        <ul>
          <?php foreach (explode('|', $row['preferred_requirements']) as $item) { ?>
            <li><?php echo htmlspecialchars($item); ?></li>
          <?php } ?>
        </ul>
      </section>
      <!-- Apply button passes the job reference number to apply.php -->
      <a href="apply.php" class="apply_button">Apply Now</a>
    </article>
  <?php } ?>
  <?php endif; ?>
</main>
<?php include 'footer.inc'; ?>