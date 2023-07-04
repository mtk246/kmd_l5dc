<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/constants.php");
require_once("../../Controller/CountryList.php");

$inputsArr = array(
    array(
        "id" => "title",
        "name" => "title",
        "label" => "Title",
        "placeholder" => "Rss Title",
        "type" => "text",
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "description",
        "name" => "description",
        "label" => "Link",
        "placeholder" => "Link",
        "type" => "text",
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
        <form
            class="w-full max-w-lg"
            action="<?php echo CONST_BASE_URL . '/pages/admin/auth_create_rss.php'; ?>"
            method="POST"
        >
            <div class="flex flex-wrap -mx-3 mb-6">
                <?php foreach($inputsArr as $input) { ?>
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