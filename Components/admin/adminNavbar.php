<?php
session_start();

require_once("../../ErrorHandler/error.php");
require_once("../../Controller/constants.php");
require_once("../../Controller/User.php");

$user_id = $_SESSION['user_id'];

$user = new User();
$getCurrentUser = $user->getCurrentUserData($user_id);
$decodeUserData = json_decode($getCurrentUser, true);

$url = '/' . CONST_PROJECT_FOLDER;

$navbarArr = array(
    array(
        "name" => "User Management",
        "icon" => "fa fa-home fa-2x",
        "path" =>  $url . '/pages/admin/user.php'
    ),
    array(
        "name" => "Dashboard",
        "icon" => "fa fa-globe fa-2x",
        "path" => $url . '/pages/admin/'
    )
);
?>

<div class="d-flex flex-column">
    <div>
        <nav class="main-menu">
            <ul>
                <?php foreach($navbarArr as $navbar) { ?>
                    <li>
                        <a href="<?php echo $navbar['path']; ?>">
                            <i class="<?php echo $navbar['icon']; ?>"></i>
                            <span class="nav-text"><?php echo $navbar['name']; ?></span>
                    </li>
                <?php } ?>
            </ul>

            <ul class="logout">
                <li>
                    <a href="#">
                            <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
    </div>
    <div class="ml-4 p-1 text-white bg-dark d-flex justify-content-space-between">
        <div>
            hello
        </div>
        <div>
            <?php echo $decodeUserData[0]['name']; ?>
        </div>
    </div>
    <div class="ml-4">

