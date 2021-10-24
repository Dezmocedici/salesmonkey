<?php
  if (!defined("permit"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }
 ?>
        <div id="sidebar" class="shadow-lg">
          <div id="nav-wrapper">
            <div id="brand-container"><img class="brand-logo" src="assets/img/logo.png"></div>
            <div id="nav-container">
              <form method="post">
                <ul id="nav-list" class="nav flex-column">
                  <?php
                    if ($_SESSION['status'] == 1)
                    {
                      include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/activateNavItems.inc.php");
                    }
                    if ($_SESSION['status'] == 0)
                    {
                      include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/inactivateNavItems.inc.php");
                    }
                  ?>
                </ul>
              </form>
              <div id="nav-user-wrapper">
                <div id="nav-user-icon">
                  <i class="fas fa-user-astronaut fa-2x circle-icon" id="user-icon"></i>
                </div>
                <button id="nav-user-detail">
                  <div id="nav-user-detail-wrapper">
                    <p id="nav-user-name">
                      <?php printInitial(); ?>
                    </p>
                    <p id="nav-user-email">
                      <?php printEmail(); ?>
                    </p>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
