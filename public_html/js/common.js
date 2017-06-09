/* global $ */
var pid = "";

// This must be applied to a form (or an object inside a form).
// http://stackoverflow.com/questions/2601223/jquery-add-hidden-element-to-form-programmatically/16215385#16215385
// $('#myform').addHidden('name', 'value');     =>     <input type="hidden" name="theHidden" value="jam">
$.fn.addHidden = function (name, value) {
    return this.each(function () {
        var input = {};
        if (Object.prototype.toString.call(value) === '[object Array]') {
            var r = /\[\]/;
            // Pass an array as a series of separate hidden fields.
            for (var i = 0; i < value.length; i++) {
                input = $("<input>").attr("type", "hidden")
                                    .attr("name", name.replace(r, '[' + i + ']'))
                                    .val(value[i]);
                $(this).append($(input));
            }
        } else {
            input = $("<input>").attr("type", "hidden")
                                .attr("name", name)
                                .val(value);
            $(this).append($(input));
        }
    });
};



$(document).ready(function() {
  pid = $("#pid").val();

  $(".navbar-brand").click(function(event) {
    c 
    $("#frm input[name=pid]").val('index_view');
    $("#frm").attr("action", "index.php").submit();
  });

  $("#btn_signin").click(function() {
    $("#frm input[name=pid]").val('signin_view');
    $("#frm").attr("action", "index.php").submit();
  });

  $("#btn_signout").click(function() {
    $("#frm input[name=pid]").val('signin_out');
    $("#frm").attr("action", "index.php").submit();
  });

  $("#btn_signup").click(function() {
    $("#frm input[name=pid]").val('signup_view');
    $("#frm").attr("action", "index.php").submit();
  });
  


  // call init function in each pages
  if(pid == "index_view") {
    init_index();
  } else if(pid =="signin_view") {
    init_signin();
  } else if(pid =="register") {
    
  }


});


// init index  
function init_index() {

}  


// init signin
function init_signin() {
  







}  










