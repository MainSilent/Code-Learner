<?php
require_once 'admin/db.php';

try {
  $sql = "SELECT id, name, email, comment, feedback FROM comment ORDER BY id DESC";
  $res = $conn->query($sql);

?>
<link rel="stylesheet" type="text/css" href="css/content.css">
<script src='https://www.google.com/recaptcha/api.js?hl=fa'></script>
<script src="js/ui.js"></script>
<script src="js/content.js"></script>

<div id="pay-div">

<div id="content-page">
    <img id="banner" src="img/banner.png">
    <p id="text" dir="rtl">
     ما در این مجموعه سعی کردیم تمامی زبان های مورد نیاز طراحی وب را به شکل کامل، حرفه ای و کاربردی آموزش دهیم. با یادگیری این مجموعه به راحتی با کمترین هزینه وارد بازار کار شوید. تمامی فیلم های آموزشی کامل و خلاصه شده است تا در وقت شما صرف جویی شود و مطالب را بهتر فرا گیرید به شکلی که ما برای نشان دادن کامل بودن فیلم های آموزشی زمان فیلم ها را با استفاده از حرف های طولانی و بی فایده طولانی نکرده ایم و در کنار صرفه جویی در وقت شما مطالب را به شکل ساده توضیح داده ایم و در پایان آموزش یک قسمت دیگر هم برای ساخت یک وب سایت داینامیک آماده کرده ایم تا به راحتی کاربر تمامی مطالب را به شکل کاربردی فرا گیرد. برای اطلاعات بیشتر فایل پی دی اف زیر را دانلود نمایید.
    <br><span style="color: red;">توجه: در صورت نارضایتی هزینه ی پرداخت شده به شما برگشت داده می شود.</span></p>
</div>
    <div id="but">
          <h2 id="price">129.999 تومان</h2>
          <h2><a style="margin-left: 15px; cursor: pointer;" id="pdf-ico">PDF</a></h2>
          <h2><a id="pay-ico" href="#">پرداخت</a></h2>
    </div>
    <div id="but-ver">
          <h2 id="price-ver" >129.999 تومان</h1>
          <h2 style="width: 100%; padding-top: 10px;"><a id="pay-ico-ver" href="#">پرداخت</a></h2>
          <div class="pdf-ico-ver-div">
            <h2><a style="margin-left: 15px;  cursor: pointer;" id="pdf-ico-ver">PDF</a></h2>
          </div>
    </div>
<!-- Comment ++++++++++++++++++++++++++++-->
    <div id="comment">
      <form name="comment-form" method="post">
<!-- Forms +++++++++++++++++++++++++++++++++++-->
        <div class="centered-name">
         <div class="group">
          <input type="text" minlength="3" maxlength="18" pattern="([ا-یa-zA-Z ]+)" dir="rtl" class="input res" id="name" name="name" required autocomplete="off" />
          <label class="label res" id="name-label" for="name">نام</label>
          <div class="bar"></div>
         </div>
        </div>
        <div class="centered-email">
         <div class="group">
          <input type="email" pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$" maxlength="64" class="input res" id="email" name="email" required autocomplete="off"/>
          <label class="label res" id="email-label" for="email">ایمیل</label>
          <div class="bar"></div>
         </div>
        </div>
        <div class="label-com">
           <textarea id="comment-text" name="comment-text" maxlength="2000" dir="rtl" required></textarea>
           <div style="color: #666666;" class="label-text">نظر</div>
           <br>
        </div>
        <div id="captcha" class="g-recaptcha center" data-sitekey="6Lc3OfYUAAAAACgrMyW15fZKv8uK0z4UuIIL7DH6"></div>
        </form>
<!-- Forms +++++++++++++++++++++++++++++++++++-->
        <button class="center" id="send">ارسال</button>
        <div id="comment-line"></div>
<!--Comment Text+++++++++++++++++++++++++++++++++-->
<?php
while ($row = $res->fetch()) { 
$check_email = $row['email'];
$check_sql = "SELECT email FROM transaction WHERE email = '$check_email'";
$check_res = $conn->query($check_sql)->fetch();
?>
        <div id="comments">
          <p id="comments-name"><?php echo $row['name'] ?>
           <img src="img/confirm.png" alt="مشتری تایید شده" class="confirm" id="img_<?= $row['id'] ?>" title="مشتری تایید شده" style="display: none;">
          </p>
          <div id="comments-line"></div>
          <p id="comments-text" dir="rtl"><?php echo $row['comment'] ?></p>
          <?php if($row['feedback'] != '') { ?>
          <div id="reply">
            <p id="reply-text" dir="rtl"><?php echo $row['feedback'] ?></p>
          </div>
          <?php } ?>
        </div>
<?php
  if ($check_res != false) {
    echo("<script>$('#img_".$row['id']."').show();</script>");
  }
} ?>
<!--Comment Text+++++++++++++++++++++++++++++++++-->
<br>
    </div>
</div>
<!-- Start Alerts -->
<div class="message">
  <div class="alert-div">
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" style="outline: none;" class="close" data-dismiss="alert">&times;</button>
       نظر شما با موفقیت ثبت شد و پس از تایید نمایش داده می شود.
    </div>
  </div>
</div>
<div class="message">
  <div class="alert-div">
    <div class="alert alert-warning alert-dismissible fade show input-warning">
      <button type="button" style="outline: none;" class="close" data-dismiss="alert">&times;</button>
        <strong>اخطار! </strong><span style="font-weight: lighter;"> اطلاعات را بدرستی  وارد نمایید.</span>
    </div>
  </div>
</div>
<div class="message">
  <div class="alert-div">
    <div class="alert alert-warning alert-dismissible fade show email-warning">
      <button type="button" style="outline: none;" class="close" data-dismiss="alert">&times;</button>
        <strong>اخطار! </strong><span style="font-weight: lighter;">دو نظر با این ایمیل ثبت شده، ایمیل دیگری وارد نمایید.</span>
    </div>
  </div>
</div>
<div class="message">
  <div class="alert-div">
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" style="outline: none;" class="close" data-dismiss="alert">&times;</button>
        <strong>خطا!</strong><span style="font-weight: lighter;"> مجددا امتحان کنید.</span>
    </div>
  </div>
</div>
<!-- End Alerts -->
<?php
  $conn=null;
} catch(PDOException $e){echo $e->getMessage();}
?>