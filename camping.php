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
    <div class="mx-auto my-20 max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-x-6 gap-y-48 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <?php if (!empty($decodeCampingData)) { ?>
                <?php foreach ($decodeCampingData as $camping) { ?>
                    <form action="<?php echo CONST_BASE_URL; ?>/one_camping.php" method="POST">
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <?php if ($camping['image'] !== '') { ?>
                                    <img src="./assets/images/<?php echo $camping['image']; ?>" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                <?php } else { ?>
                                    <img src="./assets/images/no_image_found.png" alt="No image found" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                <?php } ?>
                            </div>
                            <h3 class="mt-4 font-medium text-lg text-gray-700"><?php echo $camping['name']; ?></h3>
                            <p class="my-2 text-sm font-normal text-gray-900"><?php echo CountryList::getConstantArray()[$camping['location']]; ?></p>
                            <input type="hidden" name="camping_id" value="<?php echo $camping['id']; ?>">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Show
                            </button>
                        </a>
                    </form>
                <?php } ?>
            <?php } else { ?>
                <h1 class="text-4xl">Result not found</h1>
                <a href="<?php echo CONST_BASE_URL; ?>/camping.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Show All
                </a>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once("./Components/footer.php");
?>