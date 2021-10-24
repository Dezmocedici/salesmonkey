<?php
  if (!defined("PERMIT"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }
?>
<li class="nav-item">
  <a data-aos="fade-right" data-aos-once="true" class="nav-link sidebar-link <?php navitem("class"); ?>" href=" <?php navitem("link");?> ">
    <?php navitem("text");?>
  </a>
</li>


<li class="nav-item"><a data-aos="fade-right" data-aos-delay="200" data-aos-once="true" class="nav-link sidebar-link <?php printActive("profile"); ?>"
  href="<?php printLink("profile") ?>">Profile</a></li>
<li class="nav-item"><button class="btn btn-block nav-link logout-btn sidebar-link" data-aos="fade-right" data-aos-delay="400" data-aos-once="true" type="submit" name="logout_btn">Logout</button></li>
