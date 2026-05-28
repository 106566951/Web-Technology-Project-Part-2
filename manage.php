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

<?php include 'footer.inc'; ?>