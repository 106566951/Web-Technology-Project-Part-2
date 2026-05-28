<?php
require_once "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if(!$conn) die("Connection Failed: ". mysqli_connect_error());
if(!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $stmt = mysqli_query($conn, "SELECT * FROM jobs WHERE title LIKE '%$search%' OR reference_num LIKE '%$search%'");
} else {
    $stmt = mysqli_query($conn, "SELECT * FROM jobs");
}

?>

<?php include 'header.inc'; ?>
<?php include 'nav.php'; ?>
<style>
  article {
    background-color: #559455;
    padding: 20px;
    margin: 30px;
    border-radius: 25px;
  }
  article h2 { font-size: 2rem; }
</style>

<main>
  <h2 style="font-size: 1.8rem; color: #2c6e2c; font-style: italic; padding-bottom: 6px;">Current Available Positions</h2>

  <form method="GET" action="jobs.php">
    <input type="text" name="search" placeholder="Search jobs...">
    <button type="submit">Search</button>
    <a href="jobs.php"><button type="button">Reset</button></a>
  </form>

  <?php while ($row = mysqli_fetch_assoc($stmt)) { ?>
    <article>
      <h2><?php echo $row['title']; ?></h2>
      <p>Reference Number: <span class="RefNum"><?php echo $row['reference_num']; ?></span></p>
      <span class="badge"><?php echo $row['badge']; ?></span>
      <p><?php echo $row['description']; ?></p>
      <p>Salary: <?php echo $row['salary']; ?></p>
      <p>Report to <?php echo $row['reports_to']; ?></p>

      <hr>
      <section>
        <h3>Key Responsibilities</h3>
        <ol>
          <?php foreach (explode('|', $row['responsibilities']) as $item) { ?>
            <li><?php echo $item; ?></li>
          <?php } ?>
        </ol>
      </section>

      <hr>
      <section>
        <h3>Essential Requirements</h3>
        <ul>
          <?php foreach (explode('|', $row['essential_requirements']) as $item) { ?>
            <li><?php echo $item; ?></li>
          <?php } ?>
        </ul>
      </section>

      <hr>
      <section>
        <h3>Preferred Requirements</h3>
        <ul>
          <?php foreach (explode('|', $row['preferred_requirements']) as $item) { ?>
            <li><?php echo $item; ?></li>
          <?php } ?>
        </ul>
      </section>

      <a href="apply.php?ref=<?php echo $row['reference_num']; ?>" class="apply_button">Apply Now</a>
    </article>
  <?php } ?>

</main>

<?php include 'footer.inc'; ?>