<?php include(VIEW_PATH . 'top.php'); ?>



<div class="container">
  <div class="main">
    <!-- start registration -->
    <div class="registration">
      <div class="registration_left">
        <h2>new user? <span> create an account </span></h2>
        <div class="registration_form">
          
          <div class="bs-callout bs-callout-warning sign-up-warning hidden">
            <h4>Ooops!</h4>
            <p><?php echo $errMsg ?></p>
          </div>

          <!-- Form -->
          <form id="frm_signup" data-parsley-validate="" action="index.php" method="post">
            <div>
              <input type="email" name="email" placeholder="Your Email *" required="required" data-parsley-trigger="change" tabindex="1">
            </div>
            <div>
              <input type="text" name="user_first_name" placeholder="Your First Name *" tabindex="2" required="required">
            </div>
            <div>
              <input type="text" name="user_last_name" placeholder="Your Last Name" tabindex="3">
            </div>
            <div>
              <input type="password" id="password" name="password" placeholder="Password *" tabindex="4" required="required">
            </div>						
            <div>
              <input type="password" name="password2" placeholder="Retype Password *" data-parsley-equalto="#password" tabindex="5" required="required">
            </div>	
            <div>
              <input type="submit" value="create an account" id="register-submit">
            </div>
            <input type="hidden" name="type" value="register">
            <input type="hidden" name="pid" value="<?php echo $pid;?>">
          </form>
          <!-- /Form -->
        </div>
      </div>
      <div class="registration_left">
        <h2>existing user</h2>
          <div class="bs-callout bs-callout-warning sign-in-warning hidden">
            <h4>Ooops!</h4>
            <p><?php echo $errMsg ?></p>
          </div>
          <div class="registration_form">
            <!-- Form -->
            <form id="frm_signin" data-parsley-validate="" action="index.php" method="post">
              <div>
                <input type="email" name="email" placeholder="Your Email Address" required="required" data-parsley-trigger="change" tabindex="6"  required="required">
              </div>
              <div>
                <input type="password" name="password" placeholder="password" tabindex="7"  required="required">
              </div>						
              <div>
                <input type="submit" value="sign in" id="register-submit">
              </div>
              <div class="forget">
                <a href="#">forgot your password</a>
              </div>
              <input type="hidden" name="type" value="login">
              <input type="hidden" name="pid" value="<?php echo $pid;?>">
            </form>
            <!-- /Form -->
          </div>
        </div>
      <div class="clearfix"></div>
    </div>
    <!-- end registration -->
  </div>
</div>



<script type="text/javascript">
/* global $ */
$(document).ready(function() {

  $('#frm_signup').parsley().on('field:validated', function() {
    // var ok = $('.parsley-error').length === 0;
    // $('.bs-callout-info').toggleClass('hidden', !ok);
    // $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    // $("#frm_signup input[name=pid]").val('signup_proc');
  });

  $('#frm_signin').parsley().on('field:validated', function() {
    // var ok = $('.parsley-error').length === 0;
    // $('.bs-callout-info').toggleClass('hidden', !ok);
    // $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    // $("#frm_signin input[name=pid]").val('signin_view');
    // $("#frm_signin").attr("action", "index.php").submit();
    // return false; // Don't submit form for this demo
  });  

  var errMsg = "<?php echo $errMsg ?>";
  var type = "<?php echo $type ?>";
  var isError = errMsg === "" ? true : false;
  if(type === "register") {
    $('.sign-up-warning').toggleClass('hidden', isError);
  } else if(type === "login") {
    $('.sign-in-warning').toggleClass('hidden', isError);
  }

});  
</script>


