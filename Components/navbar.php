<?php
session_start();
require_once("./Controller/constants.php");

$user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

$link_arr = array(
  array(
    "href" => CONST_BASE_URL . "/",
    "text" => "HOME",
    "type" => "text",
  ),
  array(
    "href" => CONST_BASE_URL . "/camping.php",
    "text" => "Camping",
    "type" => "text",
  ),
  array(
    "href" => CONST_BASE_URL . "/contact.php",
    "text" => "Contact Us",
    "type" => "text",
  ),
  array(
    "href" => $user !== "" ? CONST_BASE_URL . '/Auth/destroy_session.php' : CONST_BASE_URL . '/login.php',
    "text" => $user !== "" ? "Logout" : "Register / Login",
    "type" => "button",
  ),
);
?>
<header>
    <div class="logo">MTK</div>
    <ul class="navigation d-flex align-items-center">
      <form class="flex items-center" action="<?php echo CONST_BASE_URL . "/camping.php"; ?>" method="POST">   
          <label for="simple-search" class="sr-only">Search</label>
          <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              </div>
              <input name="search_result" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
          </div>
          <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              <span class="sr-only">Search</span>
          </button>
      </form>

      <?php foreach ($link_arr as $link) { ?>
        <?php
        if ($link["type"] === "button") { ?>
          <li>
            <a
              href="<?php echo $link["href"]; ?>"
              class="rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 login-button">
              <?php echo $link["text"]; ?>
            </a>
          </li>
        <?php } else { ?>
        <li>
          <a
            href="<?php echo $link["href"]; ?>"
            class="out"
          >
            <?php echo $link["text"]; ?>
          </a>
        </li>
        <?php } ?>
      <?php } ?>
      <div id="google_translate_element"></div>
    </ul>
    <div class="hamburger">
        <i class="fa-solid fa-bars on" id="on"></i>
    </div>
    <div class="alert">
      <ul class="navigation1">
          <i class='bx bxs-x-circle close'></i>
          <form class="flex items-center">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

          <?php foreach ($link_arr as $link) { ?>
            <?php
            if ($link["type"] === "button") { ?>
              <li>
                <a
                  href="<?php echo $link["href"]; ?>"
                  class="rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 login-button">
                  <?php echo $link["text"]; ?>
                </a>
              </li>
            <?php } else { ?>
            <li>
              <a
                href="<?php echo $link["href"]; ?>"
                class="out"
              >
                <?php echo $link["text"]; ?>
              </a>
            </li>
            <?php } ?>
          <?php } ?>
        <div id="google_translate_element_2"></div>
      </ul>
    </div>
</header>