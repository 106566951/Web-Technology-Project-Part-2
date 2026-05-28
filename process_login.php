
<?php 

    include 'header.inc'; 

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

    include 'footer.inc'; 

?>