<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Components/admin/headerAdmin.php");
require_once("../../Components/admin/adminNavbar.php");

$id = $_SESSION['user_id'];

$userController = new User();
$userData = $userController->getCurrentUserData($id);
$decodeUserData = json_decode($userData, true);
?>


<div class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Dashboard
    </h2>
</div>

<!-- from parent adminNavar.php -->
</div>
</div>
<!-- end parent adminNavar.php -->

<?php
require_once("../../Components/admin/footerAdmin.php");
?>