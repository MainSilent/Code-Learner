<?php
$msie = (preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
$trident = (preg_match('/Trident/',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
if (($msie == 1) || ($trident == 1)) {
  echo "<script>alert('متاسفانه امکان دسترسی با اینترنت اکسپلولر مقدور نمی باشد');";
  echo("window.location.href='https://google.com';</script>");
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171065584-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171065584-1');
</script>

	<title>-Code Learner-</title>
	<link rel="icon" href="img/icon.png">
	<meta charset="utf-8">
<meta name="google-site-verification" content="cEtRb4O0miUXZdvQPaGOZg_6c0h_MWiRb5nrxoz66eo" />
    <meta name="keywords" content="code learner, php, html, css, javascript, codelearner, کدلرنر, کد لرنر , طراحی وبسایت, اموزش طراحی وب سایت">
    <meta name="description" content="اموزش طراحی سایت - کد لرنر: ما در این مجموعه سعی کردیم تمامی زبان های مورد نیاز طراحی وب را به شکل کامل، حرفه ای و کاربردی آموزش دهیم. با یادگیری این مجموعه به راحتی با کمترین هزینه وارد بازار کار شوید. تمامی فیلم های آموزشی کامل و خلاصه شده است تا در وقت شما صرف جویی شود و مطالب را بهتر فرا گیرید
اموزش html css javascript jquery php کدلرنر طراحی وب سایت جاوا اسکریپت پی اچ پی ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.backstretch.js"></script>
  <script src="js/index.js"></script>
</head>
<body>
<!-- Header -->
<div class="header" id="header-id">
  <ul>
      <!-- FireFox --><li id="contact-firefox" class="hide contact"><a style="cursor: pointer;">ارتباط باما</a></li>
   	  <li id="home" class="hide home"><a style="cursor: pointer;">خانه</a></li>
    	<li><a style="cursor: pointer;"><img  class="logo" src="img/icon.png"></a></li>
      <li id="contact" class="hide contact"><a style="cursor: pointer;">ارتباط باما</a></li>
      <!-- FireFox --><li id="home-firefox" class="hide home"><a style="cursor: pointer;">خانه</a></li>
      <li><a style="cursor: pointer;" style="font-size: 40px;" class="icon"><img class="menu-icon" src="img/menu-ico.png"></a></li>
  </ul>
  <ul style="display: none;" id="respon-menu" class="respon-menu">
   	<li><a style="cursor: pointer;" class="home">خانه</a></li><br><br>
   	<li><a style="cursor: pointer;" class="contact">ارتباط باما</a></li>
  </ul>
</div>
  <!--JQ  MENU Responsive-->
  <script>
    $(".icon").click(function() {
    	$("#respon-menu").slideToggle();
    });
    $(document).ready(function() {
      $("#content").click(function() {
       $("#respon-menu").slideUp();
      });
    });
  </script>
  <!--JQ  MENU Responsive-->
  <!-- Header -->
  <div id="content">
     <div class="product" id="product">
        <img id="product-img" src="img/product.gif"><br><br>
        <h1 id="h1">اولین مجموعه آموزشی طراحی وب با تمامی زبان های مورد نیاز</h1>
        <div style="padding: 15px; "> <hr>
          <h3 id="h3">آیا برای شما هم اتفاق افتاده که بخواهید طراحی وب را شروع کنید ولی زبان های زیادی را باید یاد بگیرید و نمی دانید کدام است و یا کدام خوب است؟ آیا برای شما اتفاق افتاده که برای یادگیری طراحی وب هزینه های زیادی برای کلاس ها و یا برای هر زبان هزینه های زیادی برای خرید فیلم های آموزشی صرف کنید؟</h3>
        </div>
        <a href="#" id="more"><img id="more-img" src="img/more.png"></a>
     </div>  
  </div>
</body>
</html>
<!-- Background Slide -->
<script>
$.backstretch([
  "img/background/back2.jpeg",
  "img/background/back3.png",
  "img/background/back4.jpg",
  "img/background/back5.jpeg",
  "img/background/back6.jpg"
  ], {
    fade: 750,
    duration: 3000
});
</script>
<!-- Background Slide -->