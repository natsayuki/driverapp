$(document).ready(function(){
  const leaveButton = $('#leavingWrapper');
  const returnButton = $('#returningWrapper');
  const leaveContent = $('#leavingContentWrapper');
  const returnContent = $('#returningContentWrapper');
  const doneButton = $('.doneButton');
  const form = $('.form');
  const reasonIn = $('#reasonIn');
  const resultWrapper = $('#resultWrapper');
  const resultText = $('#resultText');
  const settingsText = $('#settingsText');
  const settingsContent = $('#settingsWrapper');
  let token ='';

  reasonIn.val('');

  leaveButton.click(function(){
    leaveContent.animate({'left': '0px'}, 400);
  });

  returnButton.click(function(){
    returnContent.animate({'left': '0px'}, 400);
  });

  doneButton.click(function(){
    $(this).parent().animate({'left': '-100%'}, 400);
  });

  settingsText.click(function(e){
    e.preventDefault();
    settingsContent.animate({'left': '0px'}, 400);
  });

  function result(text, good){
    if(good) resultWrapper.css({'background-color': 'green'});
    else resultWrapper.css({'background-color': 'red'});
    resultText.text(text);
    resultWrapper.animate({'top': '0px', 'opacity': '1'}, 200);
    setTimeout(function(){
      resultWrapper.animate({'top': '-10%', 'opacity': '0'}, 200);
    }, 2000);
  }

  $.ajax('php/creds.php', {
    type: "POST",
    data: {type: "fetch"},
    success: function(data){
      if(data == "no token") console.log("not logged in");
      else token = data;
      console.log(token);
    }
  });

  form.submit(function(e){
    e.preventDefault();
    if($(this).attr('submitType') == 'leave') formData = {type: 'leave', reason: reasonIn.val()};
    else if($(this).attr('submitType') == 'return') formData = {type: 'return'};
    $.ajax('php/submit.php', {
      type: 'POST',
      data: formData,
      success: function(data){
        console.log(data);
        let good;
        if(data == 'success') good = true;
        else good = false;
        result(data, good);
      }
    });
  });
});
