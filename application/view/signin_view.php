<?php include(VIEW_PATH . 'top.php'); ?>

<div class="container">
  
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Sign in</h3>
      <form id="frm_signin" data-parsley-validate="" method="post">
        <div class="form-group">
          <label for="email">Email <span class="required">*</span></label>
          <input id="email" name="email" type="email" required="required" data-parsley-trigger="change" class="form-control" placeholder="Your Email Address">
        </div>
        <div class="form-group">
          <label for="password">Password <span class="required">*</span></label>
          <input id="password" name="password" type="password" required="required" class="form-control" placeholder="Your Password">
        </div>
        <button id="btn_signin_submit" class="btn btn-default">SIGN IN</button>
        <input type="hidden" name="pid" value="<?php echo $pid;?>">
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <?php echo $errMsg ?>
    </div>
  </div>

</div>

<script type="text/javascript">
/* global $ */
$(document).ready(function() {

  $('#frm_signin').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    $("#frm_signin input[name=pid]").val('signin_view');
    // $("#frm_signin").attr("action", "index.php").submit();
    // return false; // Don't submit form for this demo
  });  
  

});  
</script>


<?php include(VIEW_PATH . 'bottom.php'); ?>
