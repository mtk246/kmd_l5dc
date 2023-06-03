<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/constants.php");

$id = $_SESSION['user_id'];
$update_user_id = isset($_POST['update_user_id']) ? $_POST['update_user_id'] : null;

if (!$update_user_id) {
    $redirectUrl = '/' . CONST_PROJECT_FOLDER . '/pages/admin/index.php';

    header("Location: $redirectUrl");
    exit();
}

$userController = new User();
$userInfos = $userController->getCurrentUserData($update_user_id);
?>

<?php
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");
?>

<div class="container px-6 mx-auto grid p-6">
    <div class="w-full overflow-x-auto">
        <form action="<?php echo '/' . CONST_PROJECT_FOLDER . '/pages/admin/update_user.php'; ?>" method="POST">
            
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