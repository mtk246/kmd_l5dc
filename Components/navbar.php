<?php
session_start();
require_once("./Controller/constants.php");

$user = $_SESSION['user_id'];

$link_arr = array(
  array(
    "href" => "#banner",
    "text" => "HOME",
    "type" => "text",
  ),
  array(
    "href" => CONST_BASE_URL . "/camping.php",
    "text" => "Camping",
    "type" => "text",
  ),
  array(
    "href" => "#banner",
    "text" => "About",
    "type" => "text",
  ),
  array(
    "href" => "#banner",
    "text" => "Review",
    "type" => "text",
  ),
  array(
    "href" => "#banner",
    "text" => "Contact",
    "type" => "text",
  ),
  array(
    "href" => $user ? CONST_BASE_URL . '/Auth/destroy_session.php' : CONST_BASE_URL . '/login.php',
    "text" => $user ? "Logout" : "Login",
    "type" => "button",
  ),
);
?>
<header>
    <div class="logo">MTK</div>
    <ul class="navigation">
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
    </ul>
    <div class="hamburger">
        <i class="fa-solid fa-bars on" id="on"></i>
    </div>
    <div class="alert">
            <ul class="navigation1">
                <i class='bx bxs-x-circle close'></i>
                <?php foreach ($link_arr as $link) { ?>
                  <?php
                  if ($link["type"] === "button") { ?>
                    <li><?php echo $link["type"]; ?></li>
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
            </ul>
        </i>
    </div>
</header>