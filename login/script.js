$(document).ready(function(){
  const loginForm = $('#loginForm');
  const emailIn = $('#emailIn');

  loginForm.submit(function(){
    let email = emailIn.val();
    $.ajax('login.php', {
      type: "POST",
      data: {email: `${email}`},
      success: function(data){

      }
    });
  });
});
