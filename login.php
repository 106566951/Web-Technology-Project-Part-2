<?php
    session_start();
    require_once 'settings.php';

    $error = "";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) {

            // Connection failed
            $_SESSION['login_error'] = "Connection failed: " . mysqli_connect_error();
            die("Connection failed: " . mysqli_connect_error());

        } else {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql_query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
            $result = mysqli_query($conn, $sql_query);

            // If username exists, and if theres only one match
            if ($result && mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);

                // Compare the submitted password against the stored one
                if ($password == $row['password']) {

                    $_SESSION['user'] = $row['username'];
                    header('Location: manage.php');
                    exit;

                } else {

                    $_SESSION['login_error'] = "Invalid username or password. Please try again.";
                    header('Location: login.php');   // change to this page's actual filename
                    exit;

                }

            } else {

                // No matching username found
                $_SESSION['login_error'] = "Invalid username or password. Please try again.";
                header('Location: login.php');   // change to this page's actual filename
                exit;

            }

        }
    }

    // Read the error once, then clear it
    if (isset($_SESSION['login_error'])) {
        $error = $_SESSION['login_error'];
        unset($_SESSION['login_error']);
    }

?>

<?php include 'header.inc'; ?>

<style>

    .login_error {
        padding: 12px;  
        margin-bottom: 32px;
        text-align: center;
        font-weight: 400;
        background-color: #ffb34f;
        border: 1px solid #ff8c00;
        border-radius: 8px;
    }

</style>

<main>
    <div class="login_container">

        <div class="login_card">

            <!-- Form -->
            <div class="login_form_panel">

                <h1>Welcome Back</h1>
                <p class="login_subtitle">Sign in to your GreenGrid account</p>

                <?php
                    if ($error != "") {

                        echo '<section class="login_error">';
                        echo '<h3>Login Failed</h3>';
                        echo '<p>' . $error . '</p>';
                        echo '</section>';

                    }
                ?>

                <form method="POST" novalidate="novalidate">
                    <!-- Username -->
                    <div class="input_container">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username">
                    </div>

                    <!-- Password -->
                    <div class="input_container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>

                    <!-- Submit -->
                    <button class="login_btn" type="submit" value="Submit">Login</button>
                </form>

            </div>

            <!-- Image -->
            <div class="login_image_panel">
                <img src="styles/images/greengrid_logo.png" alt="GreenGrid_Logo">
                <p class="image_slogan">Making the Future <span>Sustainable!</span></p>
            </div>

        </div>

    </div>
</main>

<?php include 'footer.inc'; ?>