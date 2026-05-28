<?php

    include 'header.inc';

    /* Bring in session data and check $_SESSION['user']. */
    session_start();

    /* If logged in, show a personalised welcome message. */
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

?>

<style>
    .manage_container {
        min-height: 800px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 32px;
    }
</style>

<main>
    <div class="manage_container">
        <!-- Manager Dashboard Title -->
        <!-- Welcome Message -->
        <!-- Search Controls Bar (Search Bar, Sort By Options) -->
        <!-- Search Bar, Sort By Options -->
        <!-- List of EOI -->
            
    </div>
</main>


<?php  

    // Takes user to manage.php if they are the right user
    session_start();

    /* Use `$_POST` to capture the username and password from the form. */
    $username = $_POST['username'];
    $password = $_POST['password'];
    
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

<?php include 'footer.inc'; ?>