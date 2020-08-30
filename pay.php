<link rel="stylesheet" type="text/css" href="css/pay.css">
<script>
$('.input1').focus(function() {
  if(!$(this).attr('data-value') || $(this).val() === $(this).attr('data-value')) {
    $(this).attr('data-value', $(this).val());
    $(this).val('');
  }
}).blur(function() {
  if($(this).val()==='') {
    $(this).val($(this).attr('data-value'));
  }
});
$('.alert').hide();
</script>

<div id="pay-page">
	<p id="pay-text">پرداخت</p>
	<hr id="line">
  <div>
    <form method="post" action="include/request.php">
        <div class="prefix">
          <img src="img/pay/name-prefix.png" class="img-prefix">
          <input type="text" name="name" pattern=".{4,32}([ا-یa-zA-Z ]+)" maxlength="32" class="input1 name" spellcheck="false" value="نام" autocomplete="off" required>
        </div>
          <div class="prefix">
          <img src="img/pay/phone-prefix.png" class="img-prefix">
          <input type="tel" name="number" pattern="[\d]{11}" maxlength="11" class="input1 num1" spellcheck="false" value="تلفن همراه" autocomplete="off" required>
        </div>
        <div class="prefix">
          <img src="img/pay/email-prefix.png" class="img-prefix">
          <input type="email" name="email" pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$" maxlength="64" class="input1 email" spellcheck="false" value="ایمیل" required>
        </div>
        <button id="btn">پرداخت</button>
        <div style="padding-bottom: 20px;"></div>
    </form>
  </div>
</div>