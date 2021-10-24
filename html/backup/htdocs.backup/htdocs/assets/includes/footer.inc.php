</div>
<?php

$url = $_SERVER['PHP_SELF'];
$audience = "/audience/i";

if(!preg_match($audience, $url))
{
  echo '<script src="assets/js/jquery.min.js"></script>';
  echo '<script src="assets/js/dt-init.js"></script>';
  echo '<script src="assets/bootstrap/js/bootstrap.min.js"></script>';
  dataTablesLink("script");
}

 ?>

<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<?php generateValidator(); ?>
<?php generateEmailBuilder(); ?>
</body>
</html>
