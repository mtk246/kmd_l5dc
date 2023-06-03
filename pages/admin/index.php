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



<!-- from parent adminNavar.php -->
</div>
</div>
<!-- end parent adminNavar.php -->

<?php
require_once("../../Components/admin/footerAdmin.php");
?>