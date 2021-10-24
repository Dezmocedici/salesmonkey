<?php
  if (!defined("PERMIT"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }
 ?>
</div>

<?php generateValidator(); ?>
<?php  //generateEmailBuilder(); ?>
</body>
</html>
