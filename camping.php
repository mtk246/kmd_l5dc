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
<div>
    <div class="mx-auto my-10 max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <?php foreach ($decodeCampingData as $camping) { ?>
                <form action="<?php echo CONST_BASE_URL; ?>/one_camping.php" method="POST">
                    <a href="#" class="group my-10">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700"><?php echo $camping['name']; ?></h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
                        <input type="hidden" name="camping_id" value="<?php echo $camping['id']; ?>">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Button
                        </button>
                    </a>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once("./Components/footer.php");
?>