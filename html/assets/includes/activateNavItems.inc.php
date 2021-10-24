<?php
  if (!defined("PERMIT"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }
?>

<li class="nav-item"><a data-aos="fade-right" data-aos-once="true" class="nav-link <?php printActive("Dashboard") ?> sidebar-link" href="<?php printLink("Dashboard")?>">Dashboard</a></li>
<li class="nav-item"><a data-aos="fade-right" data-aos-delay="200" data-aos-once="true" class="nav-link <?php printActive("Organisation") ;?> sidebar-link" href="<?php printLink("Organisation");?>">Organisation</a></li>
<li class="nav-item"><a data-aos="fade-right" data-aos-delay="400" data-aos-once="true" class="nav-link <?php printActive("Profile") ;?> sidebar-link" href="<?php printLink("Profile");?>">Profile</a></li>
<li class="nav-item"><a data-aos="fade-right" data-aos-delay="600" data-aos-once="true" class="nav-link <?php printActive("Audiences") ;?> sidebar-link" href="<?php printLink("Audiences");?>">Audience</a></li>
<li class="nav-item"><a data-aos="fade-right" data-aos-delay="800" data-aos-once="true" class="nav-link <?php printActive("Campaigns") ;?> sidebar-link" href="http://localhost/marketing-campaign/src/builder.php">Campaigns</a></li>
<li class="nav-item"><button class="btn btn-block nav-link logout-btn sidebar-link" data-aos="fade-right" data-aos-delay="1000" data-aos-once="true" type="submit" name="logout_btn">Logout</button></li>
