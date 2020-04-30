  <!-- footer -->
  <footer>
  	<!-- footer atas -->
  	<div class="container-fluid bg-dark text-light m-0 pt-4 pl-3">
  		<div class="row">
  			<div class="col col-12 col-md-3" data-aos="fade-up" data-aos-duration="800">
  				<h5 class="text-white font-weight-bold h6 mt-2">Apa itu INDIEKOST?</h5>
  				<p class="text-light smaller-text small">INDIEKOST adalah software aplikasi customer managemen
  					relationship (CRM)
  					untuk kos-kosan berbasis cloud (internet) sehingga memudahkan anda dalam mengelola bisnis.
  					Dirancang simpel
  					untuk orang awam, sehingga mudah digunakan, semudah menggunakan handphone. Saat ini Indiekost juga
  					sebagai
  					operator kos-kosan. Kami membantu klien yang ingin bisnis kos-kosan tapi tidak memiliki waktu dan
  					keahlian
  					yang memadai.</p>
  			</div>
  			<div class="col col-12 col-md-3" data-aos="fade-up" data-aos-duration="800">
  				<h5 class="text-white font-weight-bold h6 mt-2">Mengapa Rumah Kost Putri Bidadari Bergabung?</h5>
  				<p class="text-light smaller-text small">Aplikasi ini membantu pengelolaan dan pembukuan rumah kost.
  					Dapat
  					diakses kapan saja, dimana saja, dan mudah digunakan. Semua transaksi terlacak dan tercatat rapih.
  					Aplikasi
  					ini adalah solusi bagi pengelolaan rumah kost untuk lebih modern dan rapih</p>
  			</div>

  			<div class="col col-12 col-md-3 footer-atas" data-aos="fade-up" data-aos-duration="800">
  				<h5 class="text-light font-weight-bold h6 mt-2">Rumah <?= $info_kost['nama_kost'] ?></h5>
  				<p class="text-light smaller-text h6">
  					<i class="fas fa-map mr-1"></i> <?= $info_kost['alamat_kost'] ?>
  				</p>
  				<p class="text-light smaller-text h6">
  					<i class="fas fa-phone-alt mr-1"></i> <?= $info_kost['no_kost'] ?>
  				</p>
  				<p class="text-light smaller-text h6">
  					<i class="fas fa-envelope mr-1"></i> <?= $info_kost['email_kost'] ?>
  				</p>
  			</div>

  			<div class="col col-12 col-md-3 mt-2" data-aos="fade-up" data-aos-duration="800">
  				<div class="embed-responsive embed-responsive-1by1">
  					<iframe class="embed-responsive-item"
  						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246.8414214129651!2d113.72065420428963!3d-8.156044683963293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6959f09cf5559%3A0x590acea3e32c2478!2sKOS%20PUTRI%20BIDADARI!5e0!3m2!1sid!2sid!4v1584193282659!5m2!1sid!2sid"
  						width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
  						aria-hidden="false" tabindex="0"></iframe>
  				</div>
  			</div>
  		</div>
  		<div class="row footer-bawah pt-3 pl-3 mt-3">
  			<p class="text-muted">Powered by TeknoTirta</p>
  		</div>
  	</div> <!-- akhir footer atas -->
  </footer>

  <!-- <div class="button-up">
  		<i class="fas fa-arrow-circle-up"></i>
  	</div> -->

  <!--        Optional JavaScript -->
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

  <script src="<?= base_url('assets/js/script.js') ?>"></script>

  <script>
  	// var mymap = L.map('mapid').setView([-8.156050, 113.720791], 15);

  	// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  	// 	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  	// }).addTo(mymap);


  	// var marker = L.marker([-8.156050, 113.720791]).addTo(mymap);

  	// marker.bindPopup("<b>Rumah Kost Putri Bidadari!</b><br>Baturaden 10").openPopup();


  	// Header scroll class

  	$(function () {
  		$(".jumbotron-atas").css({
  			"background-image": "url(<?= base_url('assets/img/'); echo $info_kost['foto_kost'] ?>)"
  		})
  	});

  	AOS.init();

  </script>
  </body>

  </html>
