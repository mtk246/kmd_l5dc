<?php
require_once("../../ErrorHandler/error.php");
require_once("../../Controller/User.php");
require_once("../../Controller/constants.php");

$update_user_id = isset($_POST['update_user_id']) ? $_POST['update_user_id'] : null;

if (!$update_user_id) {
    $redirectUrl = '/pages/admin/index.php';

    header("Location: $redirectUrl");
    exit();
}

$userController = new User();
$userInfos = $userController->getCurrentUserData($update_user_id);

$userDecode = json_decode($userInfos, true);

$inputsArr = array(
    array(
        "id" => "id",
        "name" => "id",
        "label" => "Name",
        "placeholder" => "Username",
        "type" => "hidden",
        "value" => $userDecode[0]['id'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "name",
        "name" => "name",
        "label" => "Name",
        "placeholder" => "name",
        "type" => "text",
        "value" => $userDecode[0]['name'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "user_name",
        "name" => "user_name",
        "label" => "User Name",
        "placeholder" => "User Name",
        "type" => "text",
        "value" => $userDecode[0]['username'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "password",
        "name" => "password",
        "label" => "Password",
        "placeholder" => "*****",
        "type" => "password",
        "value" => $userDecode[0]['password'],
        "isRequired" => true,
        "isTypeSelect" => false,
    ),
    array(
        "id" => "role",
        "name" => "role",
        "label" => "role",
        "placeholder" => "Role",
        "type" => "role",
        "value" => $userDecode[0]['role'],
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
        <form class="w-full max-w-lg" action="./auth_update_user.php" method="POST">
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
                    <?php if ($input['type'] !== 'hidden' && $input['type'] !== 'role') { ?>
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
                                        value="<?php echo $input['value'] === 'admin' ? '1' : '2'; ?>"
                                        selected
                                    >
                                        <?php echo $input['value']; ?>
                                    </option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <input
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                value="Update User"
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