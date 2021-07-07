<script>
$(document).ready(function(){
	$("#more").click(function(){
		$("#content").load("content.php" ,function(res,error) {
			if(error != 'success') {
				$('#content').html(res);
			}
			$('#content').hide().fadeIn();
		});
	});
}); 
</script>
<div id="content">
   <div class="product" id="product">
      <img id="product-img" src="img/product.gif"><br><br>
      <h1 id="title">اولین مجوعه آموزشی طراحی وب با تمامی زبان های مورد نیاز</h1>
      <div style="padding: 15px; "> <hr>
        <h3 id="body" style="">آیا برای شما هم اتفاق افتاده که بخواهید طراحی وب را شروع کنید ولی زبان های زیادی را باید یاد بگیرید و نمی دانید کدام است و یا کدام خوب است؟ آیا برای شما اتفاق افتاده که برای یادگیری طراحی وب هزینه های زیادی برای کلاس ها و یا برای هر زبان هزینه های زیادی برای خرید فیلم های آموزشی صرف کنید؟</h3>
      </div>
      <a href="#" id="more"><img id="more-img" src="img/more.png"></a>
    </div>
</div>