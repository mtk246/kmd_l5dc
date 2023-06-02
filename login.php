<?php
require_once("./Components/header.php");
?>

<section>
    <div class="container">
        <div class="user signinBx">
            <div class="imgBx">
                <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" />
            </div>
            <div class="formBx">
                <form action="./Auth/auth.php" method="POST">
                    <h2>Sign In</h2>
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="submit" name="submit" value="Login" />
                    <p class="signup">
                        Don't have an account ?
                        <a href="#" onclick="toggleForm();">Sign Up.</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="user signupBx">
            <div class="formBx">
                <form action="" onsubmit="return false;">
                    <h2>Create an account</h2>
                    <input type="text" name="" placeholder="Username" />
                    <input type="email" name="" placeholder="Email Address" />
                    <input type="password" name="" placeholder="Create Password" />
                    <input type="password" name="" placeholder="Confirm Password" />
                    <input type="submit" name="" value="Sign Up" />
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