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
    <div class="banner" id="banner">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <?php for($i = 0; $i < $count; $i++) {
                    if ($i < count($decodeCampingData)) {
                        $campingSite = $decodeCampingData[$i];
                ?>
                    <?php if ($campingSite['image'] !== '') { ?>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="./assets/images/<?php echo $campingSite['image']; ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <?php for($i = 0; $i < $count; $i++) {
                    if ($i < count($decodeCampingData)) {
                        $campingSite = $decodeCampingData[$i];
                ?>
                    <?php if ($campingSite['image'] !== '') { ?>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

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
                        <?php if ($campingSite['image'] !== '') { ?>
                            <img src="./assets/images/<?php echo $campingSite['image']; ?>" alt="" width="200" height="200">
                        <?php } else { ?>
                            <img src="./assets/images/no_image_found.png" alt="" width="200" height="200">
                        <?php } ?>
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