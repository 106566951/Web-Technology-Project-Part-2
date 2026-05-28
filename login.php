<?php include 'header.inc'; ?>

<main>
    <div class="login_container">

        <div class="login_card">

            <!-- Form -->
            <div class="login_form_panel">

                <h1>Welcome Back</h1>
                <p class="login_subtitle">Sign in to your GreenGrid account</p>

                <form action="process_login.php" method="POST">
                    <!-- Username -->
                    <div class="input_container">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>

                    <!-- Password -->
                    <div class="input_container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
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