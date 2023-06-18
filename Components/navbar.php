<?php
session_start();
require_once("./Controller/constants.php");

$link_arr = array(
  array(
    "href" => "#banner",
    "text" => "HOME",
  ),
  array(
    "href" => CONST_BASE_URL . "/camping.php",
    "text" => "Camping",
  ),
  array(
    "href" => "#banner",
    "text" => "About",
  ),
  array(
    "href" => "#banner",
    "text" => "Review",
  ),
  array(
    "href" => "#banner",
    "text" => "Contact",
  ),
);
?>
<header>
    <div class="logo">MTK</div>
    <ul class="navigation">
        <?php foreach ($link_arr as $link) { ?>
          <li>
            <a href="<?php echo $link["href"]; ?>">
              <?php echo $link["text"]; ?>
            </a>
          </li>
        <?php } ?>
    </ul>
    <div class="hamburger">
        <i class="fa-solid fa-bars on" id="on"></i>
    </div>
    <div class="alert">
            <ul class="navigation1">
                <i class='bx bxs-x-circle close'></i>
                <?php foreach ($link_arr as $link) { ?>
                  <li>
                    <a
                      href="<?php echo $link["href"]; ?>"
                      class="out"
                    >
                      <?php echo $link["text"]; ?>
                    </a>
                  </li>
                <?php } ?>
            </ul>
        </i>
    </div>
</header>