<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/Rss.php");
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");
require_once("../../Controller/constants.php");

$id = $_SESSION['user_id'];
$isSuccess = isset($_GET['success']) && $_GET['success'];

$rssController = new RSS();
$rssInfos = $rssController->getRssData();
$decodeRssInfos = json_decode($rssInfos, true);

$tableHeading = array(
    "Name",
    "Link",
    "Published At",
    "Action"
);
?>

<?php if ($isSuccess) { ?>
    <div class="text-center my-6 p-6">
        <span class="bg-green-100 p-6 rounded">RSS updated successfully</span>
    </div>
<?php } ?>
<div class="container px-6 mx-auto grid p-6">
    <div class="w-full overflow-x-auto">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="location.href='create_rss.php'">Create</button>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <?php foreach ($tableHeading as $tHead) { ?>
                        <th class="px-4 py-3">
                            <?php echo $tHead; ?>
                        </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
                <?php foreach ($decodeRssInfos as $rss) { ?>
                    <form action="update_rss.php" method="POST">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                <?php echo $rss['title']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $rss['description']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $rss['published_at']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <input
                                    type="hidden"
                                    name="update_rss_id"
                                    value="<?php echo $rss['id']; ?>"
                                />
                                <button
                                    type="submit"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- from parent adminNavar.php -->
</div>
</div>
<!-- end parent adminNavar.php -->

<?php
require_once("../../Components/admin/footerAdmin.php");
?>