$(document).ready(function(){
  const emailForm = $('#emailForm');
  const emailIn = $('#emailIn');

  emailForm.submit(function(e){
    e.preventDefault();
    let email = emailIn.val();
    re = /([a-zA-Z0-9_\-\.]+)@cfsnc\.org$/gm;
    valid = re.test(email);
    if(valid){
      console.log("valid email");
      $.ajax('signup.php', {
        type: "POST",
        data: {email: `${email}`},
        success: function(data){
          console.log(data);
        }
      });
    }
    else{
      console.log("invalid email");
    }
  });
});
