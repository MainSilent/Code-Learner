<?php

session_start();
if (!isset($_SESSION['payment_auth']) || !isset($_POST['refid'])) {
    header('HTTP/1.0 403');
    session_destroy();
    die();
}
session_destroy();

$headers = "From: purchase@code-learner.ir \r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$Subject = "پرداخت با موفقیت انجام شد";
$Body = "
<body style='text-align: center;padding: 40px 0;background: #ccc;'>
  <div style='background: white;padding: 60px;border-radius: 4px;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);display: inline-block;margin: 0 auto;'>
  <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
    <i style='color: #9ABC66;font-size: 100px;line-height: 200px;margin-left:-15px;' class='checkmark'>✓</i>
  </div>
    <h1 style='color: #88B04B;font-family: 'Nunito Sans', 'Helvetica Neue', sans-serif;font-weight: 900;font-size: 40px;margin-bottom: 10px;'>پرداخت با موفقیت انجام شد</h1><hr>
    <h2 dir='rtl'>کد رهگیری: <span>".$_POST['refid']."</span></h2><hr>
    <a href='https://drive.google.com/drive/folders/1CmR76YTNKO5SMeS3CgIoQqYWKl-f0r1G?usp=sharing'><h2>لینک فیلم ها</h2></a>
    <p style='color: #404F5E;font-size:20px;margin: 0;' dir='rtl'>توضیحات: 
    <span>تمامی فیلم های آموزشی در سرویس Google Drive ذخیره شده است.</span><br>
    <span>شما به راحتی می توانید تمامی فیلم هارا دانلود و یا به طور انلاین مشاهده کنید.</span><br>
	<span>توجه داشته باشید برای مشاهده ی انلاین فیلم ها باید از فیلتر شکن استفاده کنید،<br> به دلیل اینکه از سرویس YouTube برای پخش انلاین استفاده می شود.</span>
	</p>
  </div>
</body>
";

mail($_POST['email'],$Subject,$Body, $headers);

?>
<!DOCTYPE html>
<html>
  <head>
  	<title>پرداخت با موفقیت انجام شد</title>
	<link rel="icon" href="/img/icon.png">
	<script src="/js/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
	  @font-face
	  {
	    font-family: iran;
	    src:url(/font/iran.ttf);
	  }
      body {
        text-align: center;
        padding: 40px 0;
        background: #ccc;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: iran;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>پرداخت با موفقیت انجام شد</h1><hr>
        <h2 dir="rtl">کد رهگیری: <span><?php echo $_POST['refid']; ?></span></h2><hr>
        <a href="https://drive.google.com/drive/folders/1CmR76YTNKO5SMeS3CgIoQqYWKl-f0r1G?usp=sharing" target="_blank"><h2>لینک فیلم ها</h2></a>
        <p dir="rtl">توضیحات: 
        <span>تمامی فیلم های آموزشی در سرویس Google Drive ذخیره شده است.</span><br>
        <span>شما به راحتی می توانید تمامی فیلم هارا دانلود و یا به طور انلاین مشاهده کنید.</span><br>
    	<span>توجه داشته باشید برای مشاهده ی انلاین فیلم ها باید از فیلتر شکن استفاده کنید،<br> به دلیل اینکه از سرویس YouTube برای پخش انلاین استفاده می شود.</span>
    	</p>
    	<hr><p dir="rtl">این صفحه به ایمیل شما ارسال می شود (پوشه ی spam را چک کنید).<br> و درصورتی که این صفحه را دوباره بارگذاری کنید، دسترسی شما <span style="color: red;">لغو </span>می شود.</p>
      </div>
    </body>
</html>