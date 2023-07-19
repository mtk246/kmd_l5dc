<?php
require_once("./ErrorHandler/error.php");
require_once("./Components/header.php");
require_once("./Components/navbar.php");
require_once("./Controller/Camping.php");
require_once("./Controller/CountryList.php");

if (isset($_POST['search_result'])) {
    $camping = new Camping();
    $campingData = $camping->getCampingDataBySearch($_POST['search_result']);
    $decodeCampingData = json_decode($campingData, true);
    shuffle($decodeCampingData);
} else {
    $camping = new Camping();
    $campingData = $camping->getCampingData();
    $decodeCampingData = json_decode($campingData, true);
    shuffle($decodeCampingData);
}
?>
<div>
    <form action="./auth_contact.php" method="POST">
        <section class="form">
            <h1>JOIN OUT CAMPERS COMMUNITY</h1>
            <input type="text" name="email" placeholder="Enter your email here">
            <input type="email" name="name"placeholder="Enter your name here">
            <button type="submit">JOIN</button>
            <span>Read our Privacy & Policy in this 
                <a href="./privacy.php" class="text-blue-500 text-underline">link</a>
            </span>
        </section>
    </form>
</div>
<?php
require_once("./Components/footer.php");
?>