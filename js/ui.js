$(document).ready(function () {
	var $button = $('#send');
	$button.on('click', function () {
		var name_val = document.getElementById("name").checkValidity();
		var email_val = document.getElementById("email").checkValidity();
		var comment_val = document.getElementById("comment-text").checkValidity();
		var captcha_val = grecaptcha.getResponse();
		if (name_val == false || email_val == false || comment_val == false || captcha_val == false) {
			$('.alert').hide();
			$('.alert.input-warning').css('display','block');
			setTimeout(function () {
				$('.alert.alert-warning').fadeOut(170);
			}, 4000);
		} else {
			var $this = $(this);
			if ($this.hasClass('active') || $this.hasClass('success')) {
				return false;
			}
			$this.addClass('active');
			$this.addClass('loader');
			$.post("/include/comment.php", $("form").serialize())
			.done( function(data, status, xhr){
				if (status == 'success') {
					$('.alert').hide();
					$('.alert.alert-success').css('display','block');
					setTimeout(function () {
						$('.alert.alert-success').fadeOut(170);
					}, 8000);
					$('#name, #email, #comment-text').val(null);
					$('#name-label, #email-label').css('top', '40px');
					//setTimeout(function () {
					$this.removeClass('loader active');
					$this.text("\u2713");
					$this.addClass('success animated pulse');
					//}, 1600);
					setTimeout(function () {
						$this.text('ارسال');
						$this.removeClass('success animated pulse');
						$this.blur();
					}, 2200);
				}
			})
			.fail( function(code) {
				if(code.status == 302) {
					$('.alert').hide();
					$('.alert.email-warning').css('display','block');
					setTimeout(function () {
						$('.alert.email-warning').fadeOut(170);
					}, 4000);
				} else {
			        $('.alert').hide();
					$('.alert.alert-danger').css('display','block');
					setTimeout(function () {
						$('.alert.alert-danger').fadeOut(170);
					}, 4000);
				}
				$this.removeClass('loader active');
		    });
		}
	});
});