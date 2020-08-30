$(document).ready(function(){
   $("#pay-ico").click(function(){
      $("#pay-div").load("pay.php" ,function() {
        $('#pay-div').hide().fadeIn();
      });
   });
   $("#pay-ico-ver").click(function(){
      $("#pay-div").load("pay.php" ,function() {
        $('#pay-div').hide().fadeIn();
      });
   });
  $('#name').keyup( function() {
     if(this.value.length > 0) {
     document.getElementById('name-label').style.top = "3px";
     }
  });
  $('#email').keyup( function() {
     if(this.value.length > 0) {
     document.getElementById('email-label').style.top = "3px";
     }
  });
   $('#name').focusout(function() {
    if (this.value.length < 1) {
     document.getElementById('name-label').style.top = "40px";
    }
  });
  $('#name').focus(function() {
    if (this.value.length < 1) {
     document.getElementById('name-label').style.top = "3px";
    }
  });
  $('#email').focusout(function() {
    if (this.value.length < 1) {
     document.getElementById('email-label').style.top = "40px";
    }
  });
  $('#email').focus(function() {
    if (this.value.length < 1) {
     document.getElementById('email-label').style.top = "3px";
    }
  });
  /* Start PDF Download */
  $('#pdf-ico, #pdf-ico-ver').click(function() {
    window.open("pdf/Tutorial-List.pdf", '_blank');
  });
  /* End PDF Download */
  $('.close').click(function() {
    $('.alert').fadeOut(170);
  });
});