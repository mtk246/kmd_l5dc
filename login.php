<?php
require_once("./Components/header.php");

$error = isset($_GET['error']) ? $_GET['error'] : null;
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
                    <input type="submit" name="submit" value="Login" />
                    <br/>
                    <?php if ($error === 'true') { ?>
                        <p class="text-danger text-sm">
                            Invalid username or password
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