<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/RSS.php");
require_once("../../Controller/constants.php");

$update_rss_id = isset($_POST['update_rss_id']) ? $_POST['update_rss_id'] : null;

if (!$update_rss_id) {
    $redirectUrl = CONST_BASE_URL . '/pages/admin/rss.php';

    header("Location: $redirectUrl");
    exit();
}

$rssController = new RSS();
$rssInfos = $rssController->getCurrentRssData($update_rss_id);

$rssDecode = json_decode($rssInfos, true);

$inputsArr = array(
    array(
        "id" => "id",
        "name" => "id",
        "label" => "Name",
        "placeholder" => "Username",
        "type" => "hidden",
        "value" => $rssDecode[0]['id'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "title",
        "name" => "title",
        "label" => "Title",
        "placeholder" => "Title",
        "type" => "text",
        "value" => $rssDecode[0]['title'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "description",
        "name" => "description",
        "label" => "Link",
        "placeholder" => "Link",
        "type" => "text",
        "value" => $rssDecode[0]['description'],
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
        <form class="w-full max-w-lg" action="<?php echo CONST_BASE_URL; ?>/pages/admin/auth_update_rss.php" method="POST">
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
                    <?php } else if ($input['type'] !== 'hidden') { ?>
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
                <?php } ?>
            </div>
            <input
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                value="Update RSS"
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