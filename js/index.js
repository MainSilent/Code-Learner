$(document).ready(function(){
   $(".home").click(function(){
      $("#content").load("index-copy.php" ,function() {
      	$('#content').hide().fadeIn();
      });
   });
   $(".contact").click(function(){
      $("#content").load("contact.php" ,function() {
      	$('#content').hide().fadeIn();
      });
   });
   $("#more").click(function(){
      $("#content").load("content.php" ,function(res,error) {
         if(error != 'success') {
            $('#content').html(res);
         }
         $('#content').hide().fadeIn();
      });
   });
});