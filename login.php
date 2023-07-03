<?php
session_start();
require_once("./Components/header.php");

$error = isset($_GET['error']) ? $_GET['error'] : null;

if (isset($_SESSION['login_error_attempt']) && $_SESSION['login_error_attempt'] >= 3) {
    $_SESSION['login_error_time'] = time();
}

if (isset($_SESSION['login_error_time']) && (time() - $_SESSION['login_error_time'] >= 60)) {
    unset($_SESSION['login_error_attempt']);
    unset($_SESSION['login_error_time']);
}
?>

<section>
    <div class="container">
        <div class="user signinBx">
            <div class="imgBx">
                <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" />
            </div>
            <div class="formBx">
                <form action="./Auth/auth.php" method="POST">
                    <?php if (isset($_GET['success']) && $_GET['success'] === 'true') { ?>
                        <div class="bg-green-600 text-white text-center p-3 rounded my-6">
                            User registered successfully.
                        </div>
                    <?php } else if (isset($_GET['success']) && $_GET['success'] === 'false') { ?>
                        <div class="bg-red-600 text-white text-center p-3 rounded my-6">
                            User already exists.
                        </div>
                    <?php } ?>
                    <h2>Sign In</h2>
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <div class="g-recaptcha" data-sitekey="6Lfgce4mAAAAAJw20N758aB4z8kkfPP9zYhQIL_Q"></div>
                    <?php if (isset($_SESSION['login_error_attempt']) && $_SESSION['login_error_attempt'] >= 3) { ?>
                        <input type="submit" name="submit" value="Login" disabled/>
                    <?php } else { ?>
                        <input type="submit" name="submit" value="Login" />
                    <?php } ?>
                    <br/>
                    <?php if (isset($_GET['verify'])) { ?>
                        <p class="text-danger text-sm">
                            There's an error with the reCAPTCHA.
                        </p>
                    <?php } ?>
                    <?php if ($error === 'true') { ?>
                        <p class="text-danger text-sm">
                            Invalid username or password
                        </p>
                    <?php } ?>
                    <?php if (isset($_SESSION['login_error_attempt']) && $_SESSION['login_error_attempt'] >= 3) { ?>
                        <p class="text-danger text-sm">
                            Login and register are disabled for 1 minute due to multiple login attempts. Please try again later.
                        </p>
                    <?php } ?>
                    <p class="signup">
                        Don't have an account ?
                        <a href="#" onclick="toggleForm();">Sign Up.</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="user signupBx">
            <div class="formBx">
                <form action="./Auth/auth.php" method="POST">
                    <h2>Create an account</h2>
                    <input type="text" name="name" placeholder="Name" />
                    <input type="text" name="user_name" placeholder="User Name" />
                    <input type="password" name="password" placeholder="Create Password" />
                    <input type="submit" name="register" value="Sign Up" />
                    <p class="signup">
                        Already have an account ?
                        <a href="#" onclick="toggleForm();">Sign in.</a>
                    </p>
                </form>
            </div>
            <div class="imgBx">
                <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" />
            </div>
        </div>
    </div>
</section>

<?php
require_once("./Components/footer.php");
?>