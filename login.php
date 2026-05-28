<?php include 'header.inc'; ?>

<main>
    <div class="login_container">

        <div class="login_card">

            <!-- Form -->
            <div class="login_form_panel">

                <h1>Welcome Back</h1>
                <p class="login_subtitle">Sign in to your GreenGrid account</p>

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
                <img src="images/greengrid_logo.png" alt="GreenGrid_Logo">
                <p class="image_slogan">Making the Future <span>Sustainable!</span></p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.inc'; ?>

<?php  

    // Takes user to manage.php if they are the right user
    session_start();

    /* Use `$_POST` to capture the username and password from the form. */
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        exit();
    }
    
    /*  If theusername is correct 'YourName' and the password is 'YourStudentID' */
    if ($username == 'admin' && $password == 'admin') {

        /* set asession variable `$_SESSION['user']` to store the username.*/
        $_SESSION['user'] = $username;

        /* Redirect to welcome.php if login succeeds; */
        header('Location: manage.php');

    } 
    else {

        /* otherwise return to login.php with an error. */
        header('Location: login.php');

    }

?>