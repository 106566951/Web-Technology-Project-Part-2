<?php
    session_start();
    require_once 'settings.php';

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete all EOIs for a job reference
    if (isset($_POST['action']) && $_POST['action'] == "delete_by_ref") {

        $ref = mysqli_real_escape_string($conn, $_POST['delete_reference']);
        mysqli_query($conn, "DELETE FROM eoi WHERE reference_num = '" . $ref . "'");
        header('Location: manage.php');
        exit;

    }

    // Change status of a single EOI
    if (isset($_POST['action']) && $_POST['action'] == "change_status") {

        $eoi_id = mysqli_real_escape_string($conn, $_POST['eoi_id']);
        $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
        mysqli_query($conn, "UPDATE eoi SET status = '" . $new_status . "' WHERE EOInumber = '" . $eoi_id . "'");
        header('Location: manage.php');
        exit;

    }

    // Build query
    $where = "";
    if (isset($_GET['reference_num']) && trim($_GET['reference_num']) != "") {
        $where = " WHERE reference_num = '" . mysqli_real_escape_string($conn, trim($_GET['reference_num'])) . "'";
    }

    $sort = "EOInumber";
    if (isset($_GET['sort']) && $_GET['sort'] != "") {
        $sort = $_GET['sort'];
    }

    $direction = "ASC";
    if (isset($_GET['direction']) && $_GET['direction'] == "DESC") {
        $direction = "DESC";
    }

    $result = mysqli_query($conn, "SELECT * FROM eoi" . $where . " ORDER BY " . $sort . " " . $direction);

?>

<?php include 'header.inc'; ?>

<main>
    <div class="manage_container">

        <div class="manage_header">
            <h1>Manager Dashboard</h1>
            <p>Welcome back, <?php echo $_SESSION['user']; ?>.</p>
        </div>

        <!-- Search + Sort -->
        <form method="GET" class="manage_card">
            <h2>Search &amp; Sort</h2>
            <div class="controls_row">

                <div class="control_field">
                    <label for="reference_num">Job Reference</label>
                    <input type="text" id="reference_num" name="reference_num" value="<?php if (isset($_GET['reference_num'])) { echo trim($_GET['reference_num']); } ?>">
                </div>

                <div class="control_field">
                    <label for="sort">Sort By</label>
                    <select id="sort" name="sort">
                        <option value="EOInumber"     <?php if ($sort == 'EOInumber') echo 'selected'; ?>>EOI Number</option>
                        <option value="reference_num" <?php if ($sort == 'reference_num') echo 'selected'; ?>>Job Reference</option>
                        <option value="first_name"    <?php if ($sort == 'first_name') echo 'selected'; ?>>First Name</option>
                        <option value="last_name"     <?php if ($sort == 'last_name') echo 'selected'; ?>>Last Name</option>
                        <option value="status"        <?php if ($sort == 'status') echo 'selected'; ?>>Status</option>
                    </select>
                </div>

                <div class="control_field">
                    <label for="direction">Order</label>
                    <select id="direction" name="direction">
                        <option value="ASC"  <?php if ($direction == 'ASC') echo 'selected'; ?>>Ascending</option>
                        <option value="DESC" <?php if ($direction == 'DESC') echo 'selected'; ?>>Descending</option>
                    </select>
                </div>

                <button type="submit" class="manage_btn">Apply</button>
                <a href="manage.php" class="manage_btn">Reset Filters</a>

            </div>
        </form>

        <!-- Delete by Job Reference -->
        <form method="POST" class="manage_card">

            <h2>Delete EOIs by Job Reference</h2>
            <div class="controls_row">
                <div class="control_field">
                    <label for="delete_reference">Job Reference</label>
                    <input type="text" id="delete_reference" name="delete_reference" required>
                </div>
                <input type="hidden" name="action" value="delete_by_ref">
                <button type="submit" class="manage_btn">Delete</button>
            </div>

        </form>

        <!-- Results -->
        <div class="manage_card">
            <h2>Expressions of Interest</h2>

            <?php if ($result && mysqli_num_rows($result) > 0) { ?>
            <table class="eoi_table">
                <tr>
                    <th>EOI #</th>
                    <th>Job Ref</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['EOInumber']; ?></td>
                    <td><?php echo $row['reference_num']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_num']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form method="POST" class="status_form">
                            <input type="hidden" name="action" value="change_status">
                            <input type="hidden" name="eoi_id" value="<?php echo $row['EOInumber']; ?>">
                            <select name="new_status">
                                <option value="New"     <?php if ($row['status'] == 'New') echo 'selected'; ?>>New</option>
                                <option value="Current" <?php if ($row['status'] == 'Current') echo 'selected'; ?>>Current</option>
                                <option value="Final"   <?php if ($row['status'] == 'Final') echo 'selected'; ?>>Final</option>
                            </select>
                            <button type="submit" class="manage_btn">Update</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>

            </table>
            
            <?php } else { ?>
                <p>No EOIs found.</p>
            <?php } ?>

        </div>

    </div>
</main>

<?php include 'footer.inc'; ?>