<?php include(VIEW_PATH . 'top.php'); ?>
<?php include(VIEW_PATH . 'top_sub.php'); ?>

  <div class="container">

<?php

  if($ses_userId != "") {
    echo "<br> Login Success";
    echo "<br> user id( ". $ses_userId  ." )";
    echo "<br> user name(". $ses_userName .")";
  }


?>

  </div>

<?php include(VIEW_PATH . 'bottom.php'); ?>



