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

$count = 4;
?>
    <!--Home Section-->
    <section class="banner" id="banner">
        <div class="title">
            <h1>YOUR BEST COLLEAGUES<br>DESERVES THE<br>BEST CAMPING EXPERIENCE</h1>
        </div>
        <a href="" class="btn">Discover Now</a>
    </section>

    <!--Shop Section-->

    <section class="shop" id="shop">
        <div class="title">
            <h2 class="titetext">Featured Camping</h2>
        </div>
        <div class="content">
            <?php for($i = 0; $i < $count; $i++) {
                if ($i < count($decodeCampingData)) {
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
                        <a href="./one_camping.php?camping_id=<?php echo $decodeCampingData[$i]['id']; ?>" class="btn1">Show</a>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
        </div>
        <a href="./camping.php" class="sall">SHOW ALL</a>
    </section>

    <!--About Section-->

    <section class="about" id="about">
        <div class="title">
            <h2 class="titetext">ABOUT US</h2>
        </div>
        <div class="imgtext">
            <img src="https://wallpaperaccess.com/full/181060.jpg" alt="">
            <div class="info">
                <div class="infocontent">
                    <h3>BEST <br>CAMPING EXPERIENCE</h3>
                    <p>"We are the best camping experience"</p>
                </div>
                <div class="infocontent">
                    <h3>BEST <br>CAMPER</h3>
                    <p>"Best campers in the world"</p>
                </div>
                <div class="infocontent">
                    <h3>Discover Worldwide</h3>
                    <p>"Discover the world in our camping website"</p>
                </div>
            </div>
        </div>
    </section>

    <!--Reviews Section-->

    <section class="review" id="review">
        <div class="title">
            <h2 class="titetext">CAMPERS REVIEWS</h2>
            <p>“ Dogs do speak, but only to those who know how to listen. ”</p>
        </div>
        <div class="container">
                <div class="cbox1 bbox">
                    <img src="https://images.alphacoders.com/112/1129769.jpg" alt="">
                </div>
                <div class="cbox2 bbox">
                    <h1>OUR HAPPY CUSTOMERS</h1>
                </div>
                <div class="cbox3 bbox">
                    <img src="https://images.alphacoders.com/112/1129769.jpg" alt="">
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

    <!--Form-->
    
    <section class="form">
        <h1>JOIN OUT CAMPERS COMMUNITY</h1>
        <input type="email" placeholder="Enter your email here">
        <button>JOIN</button>
    </section>
<?php
require_once("./Components/footer.php");
?>