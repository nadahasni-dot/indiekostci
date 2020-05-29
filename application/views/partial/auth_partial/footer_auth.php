<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script>
	AOS.init();

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function () {
		'use strict';
		window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();


	$(function () {
		$(".bg-gradient-primary").css({
			"background-image": "url(<?= base_url('assets/img/'); echo $info_kost['foto_kost']; ?>)"
		})
	})


	$(function(){
      $(".bg-login-image").css({"background-image": "url(<?= base_url('assets/img/'); echo $info_kost['foto_kost']; ?>)"});
    })


	$(function(){
		$(".bg-password-image").css({"background-image": "url(<?= base_url('assets/img/'); echo $info_kost['foto_kost']; ?>)"})
	})

	$(document).ready(function () {
		$('#submit').click(function (event) {

			if ($('.password').val() != $('.confpass').val()) {
				alert("Password dan Konfirmasi Password Tidak Sama!");
				// Prevent form submission
				event.preventDefault();
			}

		});
	});

</script>
</body>

</html>
