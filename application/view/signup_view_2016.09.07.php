<?php include(VIEW_PATH . 'top.php'); ?>

<div class="container" style="padding:30px 0 50px 0;">
  
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Sign up</h3>
      <form id="frm_signup" method="post">
        <div class="form-group">
          <label for="email">Email <span class="required">*</span></label>
          <input id="email" name="email" type="email" required="required"  data-parsley-trigger="change" class="form-control" placeholder="Your Email">
        </div>
        <div class="form-group">
          <label for="user_first_name">First Name <span class="required">*</span></label>
          <input id="user_first_name" name="user_first_name" required="required" type="text" class="form-control" placeholder="Your First Name">
        </div>
        <div class="form-group">
          <label for="user_last_name">Last Name</label>
          <input id="user_last_name" name="user_last_name" type="text" class="form-control" placeholder="Your Last Name">
        </div>
        <div class="form-group">
          <label for="user_password">Password <span class="required">*</span></label>
          <input id="user_password" name="user_password" type="password" required="required" class="form-control" placeholder="Your Password">
        </div>
        <div class="form-group">
          <label for="user_password2">Confirm Password <span class="required">*</span></label>
          <input id="user_password2" name="user_password2" type="password" required="required" data-parsley-equalto="#user_password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input id="address" name="address" type="text" class="form-control" placeholder="Your Address">
        </div>
        <div class="form-group">
          <label for="suburb">Suburb</label>
          <input id="suburb" name="suburb" type="text" class="form-control" placeholder="Your Suburb">
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input id="state" name="state" type="text" class="form-control" placeholder="Your State">
        </div>
        <div class="form-group">
          <label for="zipcode">Zipcode</label>
          <input id="zipcode" name="zipcode" type="text" class="form-control" placeholder="Your Zipcode">
        </div>
        <button id="btn_signup_submit" type="submit" class="btn btn-default">SIGN UP</button>
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

  $('#frm_signup').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    $("#frm_signup input[name=pid]").val('signup_proc');
  });  
  

});  
</script>



<?php include(VIEW_PATH . 'bottom.php'); ?>
