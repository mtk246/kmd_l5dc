<?php
require_once("./ErrorHandler/error.php");
require_once("./Components/header.php");
require_once("./Components/navbar.php");
require_once("./Controller/Camping.php");
require_once("./Controller/CountryList.php");

$camping = new Camping();
$campingData = $camping->getCampingData();
$decodeCampingData = json_decode($campingData, true);
shuffle($decodeCampingData);
?>

    <!--Home Section-->
    <section class="banner" id="banner">
        <div class="title">
            <h1>YOUR BEST FRIEND<br>DESERVES THE<br>BEST MEAL</h1>
        </div>
        <a href="" class="btn">SHOP NOW</a>
    </section>

    <!--Shop Section-->

    <section class="shop" id="shop">
        <div class="title">
            <h2 class="titetext">Featured Camping</h2>
        </div>
        <div class="content">
            <?php for($i = 0; $i < 4; $i++) {
                $campingSite = $decodeCampingData[$i];    
            ?>
                <div class="box">
                    <div class="imgbx">
                        <img src="https://static.wixstatic.com/media/84770f_b29b9b581f7743aa9b5aafd7c2f8398c~mv2_d_2635_2710_s_4_2.png/v1/fill/w_246,h_253,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/84770f_b29b9b581f7743aa9b5aafd7c2f8398c~mv2_d_2635_2710_s_4_2.png" alt="">
                    </div>
                    <div class="text">
                        <?php echo $campingSite['name'] ?>
                    </div>
                    <div class="price">
                    <?php echo CountryList::getConstantArray()[$campingSite['location']]; ?>
                    </div>
                    <div class="imgbtn">
                        <a href="" class="btn1">Buy Now</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href="" class="sall">SHOW ALL</a>
    </section>

    <!--About Section-->

    <section class="about" id="about">
        <div class="title">
            <h2 class="titetext">ABOUT US</h2>
        </div>
        <div class="imgtext">
            <img src="https://i.postimg.cc/G2v0JHVQ/pexels-blue-bird-7210284.jpg" alt="">
            <div class="info">
                <div class="infocontent">
                    <h3>NATURAL <br>INGREDIENTS</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, facilis!"</p>
                </div>
                <div class="infocontent">
                    <h3>100% HOME MADE</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, facilis!"</p>
                </div>
                <div class="infocontent">
                    <h3>SOURCED IN US</h3>
                    <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, facilis!"</p>
                </div>
            </div>
        </div>
    </section>

    <!--Reviews Section-->

    <section class="review" id="review">
        <div class="title">
            <h2 class="titetext">DOGGO REVIEWS</h2>
            <p>“ Dogs do speak, but only to those who know how to listen. ”</p>
        </div>
        <div class="container">
                <div class="cbox1 bbox">
                    <img src="https://i.postimg.cc/HxdpGL8T/pexels-yaroslav-shuraev-8499233.jpg" alt="">
                </div>
                <div class="cbox2 bbox">
                    <h1>OUR HAPPY CUSTOMERS</h1>
                </div>
                <div class="cbox3 bbox">
                    <img src="https://i.postimg.cc/pX9sHJHL/pexels-ad-thiry-13270038.jpg" alt="">
                </div>
                <div class="cbox4 bbox">
                    <div class="boxdetail">
                        <h1>COOKIE</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ex praesentium quaerat magnam minima ut dicta facere ullam ipsum, tempore consectetur, repellat distinctio corporis veritatis!</p>
                    </div>
                </div>
                <div class="cbox5 bbox">
                    <div class="boxdetail">
                    <h1>JACKSON</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, voluptatem amet? Omnis exercitationem esse quos, voluptate praesentium minus est voluptas tenetur iusto nulla tempore consequuntur, natus dicta repellat officiis dolor!</p>
                    </div>
                </div>
                <div class="cbox6 bbox">
                    <img src="https://i.postimg.cc/j2ymRHp9/pexels-barnabas-davoti-14172889.jpg" alt="">
                </div>
                <div class="cbox7 bbox">
                    <div class="boxdetail">
                    <h1>BOLT</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur exercitationem non incidunt similique omnis ad facilis quidem quae! Numquam saepe odio doloribus doloremque quis temporibus debitis.</p>
                    </div>
                </div>
                <div class="cbox58 bbox">
                    <img src="https://i.postimg.cc/sXbCjDvB/pexels-apunto-group-agencia-de-publicidad-7752793.jpg" alt="">
                </div>
        </div>
    </section>

    <!--Reviews Section-->

    <section class="contact" id="contact">
        <div class="footer">
            <div class="links">
                <ul class="navigation">
                    <li><a href="#banner" class="out">HOME</a></li>
                    <li><a href="#shop" class="out">SHOP</a></li>
                    <li><a href="#about" class="out">ABOUT</a></li>
                    <li><a href="#reviews" class="out">REVIEWS</a></li>
                    <li><a href="#contact" class="out">CONTACT</a></li>
                </ul>
            </div>
            <div class="info">
                <h1>INFO</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel quo eligendi laborum explicabo, porro quaerat eveniet ad iusto natus, maiores cupiditate fuga magnam impedit! Ipsam eum aut obcaecati consequuntur veniam!</p>
            </div>
            <div class="cs">
                <h1>CUSTOMER SERVICE</h1>
                <ul>
                    <li>123-456-789</li>
                    <li>0000-3615-9756-2519</li>
                    <li>dogsbites@gmail.com</li>
                </ul>
            </div>
            <div class="slinks">
                <h1>FOLLOW US</h1>
                <div class="link">
                    <a href="https://www.linkedin.com/in/gururaj-math-223360255/" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
                    <a href="https://codepen.io/gururajmath"><i class='bx bxl-codepen' target="_blank"></i></a>
                    <a href="https://github.com/Gururaj-Math" target="_blank"><i class='bx bxl-github'></i></a>
            </div>
        </div>
    </section>

    <!--Form-->
    
    <section class="form">
        <h1>JOIN OUT FURRY COMMUNITY</h1>
        <input type="email" placeholder="Enter your email here">
        <button>JOIN</button>
    </section>

    <section class="strip">
        <h1>Design and code by Gururaj</h1>
        <div class="icons">
            <a href="https://www.linkedin.com/in/gururaj-math-223360255/" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
            <a href="https://codepen.io/gururajmath"><i class='bx bxl-codepen' target="_blank"></i></a>
            <a href="https://github.com/Gururaj-Math" target="_blank"><i class='bx bxl-github'></i></a>
            </div>
        </div>
    </section>
<?php
require_once("./Components/footer.php");
?>