<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/constants.php");
require_once("../../Controller/Camping.php");
require_once("../../Controller/CountryList.php");

$update_camping_id = isset($_POST['update_camping_id']) ? $_POST['update_camping_id'] : null;

if (!$update_camping_id) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/camping.php';

    header("Location: $redirectUrl");
    exit();
}

$campingController = new Camping();
$campingInfos = $campingController->getCurrentCampingData($update_camping_id);

$campingDecode = json_decode($campingInfos, true);

$country_arr = CountryList::getConstantArray();

$inputsArr = array(
    array(
        "id" => "camping_id",
        "name" => "camping_id",
        "label" => "Camping ID",
        "placeholder" => "Camping ID",
        "type" => "hidden",
        "value" => $campingDecode[0]['id'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "name",
        "name" => "name",
        "label" => "Name",
        "placeholder" => "name",
        "type" => "text",
        "value" => $campingDecode[0]['name'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "location",
        "name" => "location",
        "label" => "Location",
        "placeholder" => "Location",
        "type" => "role",
        "value" => $campingDecode[0]['location'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "description",
        "name" => "description",
        "label" => "Description",
        "placeholder" => "Description",
        "type" => "textarea",
        "value" => $campingDecode[0]['description'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "image",
        "name" => "image",
        "label" => "Image",
        "placeholder" => "Image",
        "type" => "file",
        "value" => $campingDecode[0]['image'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
);
?>

<?php
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");
?>

<div class="container px-6 mx-auto grid p-6">
    <div class="w-full overflow-x-auto">
        <form class="w-full max-w-lg" action="<?php echo CONST_BASE_URL; ?>/pages/admin/auth_update_camping.php" method="POST" enctype="multipart/form-data">
            <div class="flex flex-wrap -mx-3 mb-6">
                <?php foreach($inputsArr as $input) { ?>
                    <?php if ($input['type'] === 'hidden') { ?>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="<?php echo $input['id']; ?>"
                            name="<?php echo $input['name']; ?>"
                            type="<?php echo $input['type']; ?>"
                            placeholder="<?php echo $input['placeholder']; ?>"
                            value="<?php echo $input['value']; ?>"
                            required
                        >
                    <?php } ?>
                    <?php if ($input['type'] !== 'hidden' && $input['type'] !== 'role' && $input['type'] !== 'textarea' && $input['type'] !== 'file') { ?>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="<?php echo $input['id']; ?>">
                                <?php echo $input['label']; ?>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="<?php echo $input['id']; ?>"
                                name="<?php echo $input['name']; ?>"
                                type="<?php echo $input['type']; ?>"
                                placeholder="<?php echo $input['placeholder']; ?>"
                                value="<?php echo $input['value']; ?>"
                                required
                            >
                        </div>
                    <?php } ?>
                    <?php if ($input['type'] === 'role') { ?>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                State
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state"
                                    name="<?php echo $input['name']; ?>"
                                >
                                    <option
                                        value="<?php echo $input['value']; ?>"
                                        selected
                                    >
                                        <?php echo CountryList::getConstantArray()[$input['value']]; ?>
                                    </option>
                                    <?php foreach($country_arr as $country => $value) { ?>
                                        <option value="<?php echo $country; ?>">
                                            <?php echo $value; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($input['type'] === 'textarea') { ?>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                Description
                            </label>
                            <textarea
                                id="message"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="<?php echo $input['name']; ?>"
                                required
                            >
                                <?php echo $input['value'];  ?>
                            </textarea>
                        </div>
                    <?php } ?>
                    <?php if ($input['type'] === 'file') { ?>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                Image
                            </label>
                            <?php if ($input['value'] !== '') { ?>
                                <img
                                    src="../../assets/images/<?php echo $input['value']; ?>"
                                    alt=""
                                    class="py-3"
                                >
                            <?php } ?>
                            <input
                                type="<?php echo $input['type']; ?>"
                                name="imageToUpload"
                                id="<?php echo $input['id']; ?>"
                            >
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <input
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                value="Update Camping"
                name="submit"
            >
        </form>
    </div>
</div>

<!-- from parent adminNavar.php -->
</div>
</div>
<!-- end parent adminNavar.php -->

<?php
require_once("../../Components/admin/footerAdmin.php");
?>