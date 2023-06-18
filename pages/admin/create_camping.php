<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/constants.php");
require_once("../../Controller/CountryList.php");

$update_user_id = 1;

$userController = new User();
$userInfos = $userController->getCurrentUserData($update_user_id);

$userDecode = json_decode($userInfos, true);

$inputsArr = array(
    array(
        "id" => "camping_site_name",
        "name" => "camping_site_name",
        "label" => "Camping Name",
        "placeholder" => "Camping Name",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "location",
        "name" => "location",
        "label" => "Location",
        "placeholder" => "Location",
        "type" => "select",
        "isRequired" => true,
        "isTypeSelect" => true,
    ),
    array(
        "id" => "description",
        "name" => "description",
        "label" => "Description",
        "placeholder" => "Description",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "feature_name",
        "name" => "feature_name",
        "label" => "Feature Name",
        "placeholder" => "Feature Name",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "attraction_name",
        "name" => "attraction_name",
        "label" => "Attraction Name",
        "placeholder" => "Attraction Name",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "contact_name",
        "name" => "contact_name",
        "label" => "Contact Name",
        "placeholder" => "Contact Name",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "contact_email",
        "name" => "contact_email",
        "label" => "Contact Email",
        "placeholder" => "Contact Email",
        "type" => "email",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "contact_phone",
        "name" => "contact_phone",
        "label" => "Contact Phone",
        "placeholder" => "Contact Phone",
        "type" => "number",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
);
?>

<?php
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");

$country_arr = CountryList::getConstantArray();
?>

<div class="container px-6 mx-auto grid p-6">
    <div class="w-full overflow-x-auto">
        <form
            class="w-full max-w-lg"
            action="<?php echo CONST_BASE_URL . '/pages/admin/auth_create_camping.php'; ?>"
            method="POST"
        >
            <div class="flex flex-wrap -mx-3 mb-6">
                <?php foreach($inputsArr as $input) { ?>
                    <?php if ($input['type'] !== 'select') { ?>
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
                                required
                            >
                        </div>
                    <?php } ?>
                    <?php if ($input['type'] === 'select') { ?>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            <?php echo $input['name']; ?>
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state"
                                    name="<?php echo $input['name']; ?>"
                                >
                                    <?php foreach($country_arr as $country => $value) { ?>
                                        <option value="<?php echo $country; ?>">
                                            <?php echo $value; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <input
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                value="Create"
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