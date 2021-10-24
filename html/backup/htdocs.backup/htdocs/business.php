<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
  registerBusiness($conn);

  if (empty($_SESSION['businessID']) || !isset($_SESSION['businessID']))
  {
    include_once($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/inactiveBusinessCard.inc.php");
  }
  else
  {
    include_once($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/activeBusinessCard.inc.php");
  }
?>

<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
