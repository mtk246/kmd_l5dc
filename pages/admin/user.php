<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");
require_once("../../Controller/constants.php");

$id = $_SESSION['user_id'];

$userController = new User();
$userInfos = $userController->getUserData();
$decodeUserInfos = json_decode($userInfos, true);

$tableHeading = array(
    "Name",
    "User Name",
    "Role",
    "Created At",
    "Updated At",
    "Action"
);
?>

<div class="container px-6 mx-auto grid p-6">
    <div class="w-full overflow-x-auto">
        <form action="<?php echo '/' . CONST_PROJECT_FOLDER . '/pages/admin/update_user.php'; ?>" method="POST">
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
                    <?php foreach ($decodeUserInfos as $user) { ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                <?php echo $user['name']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $user['username']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $user['role']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $user['created_at']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $user['updated_at']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <input
                                    type="hidden"
                                    name="user_id"
                                    value="<?php echo $user['id']; ?>"
                                />
                                <button
                                    type="submit"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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