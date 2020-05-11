  <main>

  	<!-- jumbotron -->
  	<div class="jumbotron jumbotron-atas jumbotron-fluid" id="jumbotron" data-aos="fade">
  		<div class="container banner-tittle">
  			<h3>WELCOME</h3>
  			<h1 class="display-4 text-uppercase">RUMAH <?= $info_kost['nama_kost'] ?></h1>
  			<p class="lead"><?= $info_kost['deskripsi_kost'] ?></p>
  			<a href="<?= base_url('welcome/ketersediaankamar'); ?>" class="btn up-1 btn-gradient">Cek Ketersediaan Kamar</a>
  		</div>
  	</div>
  	<!-- jumbotron -->

  	<section id="tentang">
  		<!-- tentang -->
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col">
  					<h2 class="tentang pt-5">Rumah Kost Ini Menggunakan Layanan <span class="biru">INDIEKOS</span> <br>
  						Software Pengelolaan Rumah Kost. <span class="biru">Simple, Fleksibel, Mudah Digunakan</span>
  					</h2>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col">
  					<p class="text-muted text-center mt-2 ">Mengapa pemilik kost perlu INDIEKOST?</p>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col col-12 col-md-6 pb-3" data-aos="fade-up" data-aos-easing="ease-in-out">
  					<!-- img preview1 -->
  					<img src="<?= base_url('assets/img/preview1.jpg') ?>" class="img-fluid mt-n3" alt="Indiekost Mockup">
  				</div>
  				<div class="col col-12 col-md-6 pt-md-3 mt-md-5 pr-5" data-aos="fade-up" data-aos-easing="ease-in-out">
  					<!-- deskripsi -->
  					<h4 class="font-weight-bold" >Diperlukan Untuk Mengelola Rumah Kos Secara Mandiri</h4>
  					<p class="text-muted">Integrasi semua operasi penting dalam satu platform</p>
  					<p class="font-weight-bold text-break">
  						<i class="fas fa-check-circle text-success"></i> Pengelolaan Kamar dan Penghuni/Penyewa <br>
  						<i class="fas fa-check-circle text-success"></i> Booking <br>
  						<i class="fas fa-check-circle text-success"></i> Laporan keuangan & Laba-rugi <br>
  						<i class="fas fa-check-circle text-success"></i> Inventarisasi

  					</p>
  					<p class="text-muted">Anda bisa mendapatkan informasi terkini secara <span
  							class="font-weight-bold font-italic text-muted text-break">real time</span>, kapan saja, dimana saja</p>
  				</div>
  			</div>
  		</div>
  	</section>
  	<!-- tentang -->

  	<!-- keunggulan atas-->
  	<div class="container-fluid bg-light pt-5 pb-4">
  		<div class="container">
  			<div class="row">
  				<!-- kiri -->
  				<div class="col col-12 col-md-6" ">
  					<!-- kiri atas -->
  					<div class="row" data-aos="fade-up">
  						<div class="col col-2">
  							<i class="fas fa-shield-alt ikon-besar"></i>
  						</div>
  						<div class="col col-10">
  							<h6 class="font-weight-bold">Mencegah Kecurangan Biaya & Pendapatan</h6>
  							<p class="text-muted">
  								Catatan booking, pemasukan, dan pengeluaran tercatat rapi sehingga akan meminimalisir
  								kecurangan
  							</p>
  						</div>
  					</div>

  					<!-- kiri bawah -->
  					<div class="row mt-md-4" data-aos="fade-up">
  						<div class="col col-2">
  							<i class="fas fa-clock ikon-besar"></i>
  						</div>
  						<div class="col col-10">
  							<h6 class="font-weight-bold">Full Online 24-Jam</h6>
  							<p class="text-muted">
  								Dimana pun lokasi kost Anda, manajemen dan perkembangan bisnis bisa diakses secara realtime
  							</p>
  						</div>
  					</div>
  				</div>

  				<!-- kanan -->
  				<div class="col col-12 col-md-6" >
  					<!-- kanan atas -->
  					<div class="row" data-aos="fade-up">
  						<div class="col col-2">
  							<i class="fas fa-chart-line ikon-besar"></i>
  						</div>
  						<div class="col col-10">
  							<h6 class="font-weight-bold">Meningkatkan Hunian Kost</h6>
  							<p class="text-muted">
  								INDIEKOST membantu meningkatkan hunian kost. Kami juga memampangkan informasi tentang rumah kost Anda
  								di halaman Homepage, sebagai bussiness profile dari rumah kost Anda
  							</p>
  						</div>
  					</div>

  					<!-- kanan bawah -->
  					<div class="row" data-aos="fade-up"> 
  						<div class="col col-2">
  							<i class="fas fa-shopping-cart ikon-besar"></i>
  						</div>
  						<div class="col col-10">
  							<h6 class="font-weight-bold">Reservasi Online</h6>
  							<p class="text-muted">
  								Reservasi bisa dilakukan secara Online, kapan saja dan dimana saja
  							</p>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- keunggulan atas-->

	<div id="keunggulan"></div>

  	<div class="container bg-keunggulan" id="keunggulan2" data-aos="fade-up">
  		<!-- keuunggulan deskripsi -->
  		<div class="row mt-5">
  			<div class="container">
  				<h5 class="font-weight-bold text-center">Keunggulan INDIEKOST</h5>
  				<p class="text-muted text-center">INDIEKOST merupakan aplikasi pengelola rumah kos berbasis online (WEB) yang
  					akan membantu meningkatkan produktivitas usaha Anda. Satu aplikasi, banyak solusi. <span
  						class="text-ungu font-weight-bold">Didesain untuk orang awam IT</span></p>
  			</div>
  		</div>

  		<!-- keunggulan dengan gambar -->
  		<div class="row mt-3 pb-5">
  			<!-- kiri -->
  			<div class="col col-12 col-md-6">

  				<div class="row" data-aos="fade-up">
  					<div class="col col-2">
  						<div class="lingkar">1</div>
  					</div>
  					<div class="col col-10">
  						<h6 class="font-weight-bold ml-2">Sistem yang handal dan lengkap</h6>
  						<p class="text-muted ml-2">Tersedia semua hal yang Anda butuhkan untuk mengelola rumah kos Anda</p>
  					</div>
  				</div>

  				<div class="row" data-aos="fade-up">
  					<div class="col col-2">
  						<div class="lingkar mt-2">2</div>
  					</div>
  					<div class="col col-10">
  						<h6 class="font-weight-bold ml-2">Multi device, multi platform</h6>
  						<p class="text-muted ml-2">Yang Anda butuhkan hanyalah koneksi internet dan web browser. Aplikasi dapat
  							diakses dari mana saja dan kapan saja</p>
  					</div>
  				</div>

  				<div class="row" data-aos="fade-up">
  					<div class="col col-2">
  						<div class="lingkar mt-2">3</div>
  					</div>
  					<div class="col col-10">
  						<h6 class="font-weight-bold ml-2">Mudah digunakan</h6>
  						<p class="text-muted ml-2">Tampilan tatap muka didesain sedemikian rupa sehingga mudah digunakan oleh
  							pengguna. Dan memenuhi standar UI/UX yang ada</p>
  					</div>
  				</div>
  			</div>

  			<!-- kanan -->
  			<div class="col col-12 col-md-6" data-aos="fade-left">
  				<img src="<?= base_url('assets/img/preview2.png') ?>" class="img-fluid mt-n3 scale" alt="Indiekost Mockup">
  			</div>
  		</div>
  	</div>


  	<!-- testimoni -->
  	<!-- jumbotron -->
  	<div class="jumbotron testimoni jumbotron-fluid" id="testimoni" data-aos="fade-up">
  		<div class="container item">
  			<div class="row">
  				<div class="col-12" data-aos="fade-up">
  					<h2 class="text-light text-center font-weight-bold">Testimoni</h2>
  					<p class="text-center text-light">Apa kata mereka yang telah menggunakan INDIEKOST</p>
  				</div>
  			</div>
  			<div class="row">
  				<div class="container">
  					<div class="row">
  						<div class="col-md-12">
  							<div class="testmonial_slider_area text-center owl-carousel">
  								<div class="row">
  									<div class="col col-12 col-md-6">
  										<div class="single_testimonial" data-aos="zoom-in" data-aos-duration="800">
  											<div class="pic">
  												<img src="<?= base_url('assets/images/abduljali.jpg ')?>" style="height : 70px" alt="">
  											</div>
  											<h5 class="testimonial-title">Abdul Jali</h5>
  											<span class="test_designation">Pemilik Kost Putri Bidadari</span>
  											<p class="text-muted">
  												Saya tertarik untuk menggunakan, karena saya memiliki banyak kost saya fikir akan sangat
  												terbantu untuk merekap pengeluaran, pemasukan, serta melakukan tagihan kepada penghuni kost.
  												Saran saya segera direalisasikan agar orang tua seperti kami dapat merasakan kemudahan ini.
  											</p>
  										</div><!-- end Single Testimonials -->
  									</div>

  									<div class="col col-12 col-md-6">
  										<div class="single_testimonial" data-aos="zoom-in" data-aos-duration="800">
  											<div class="pic">
  												<img src="<?= base_url('assets/images/ibucahyani.jpeg')?>" style="height : 70px" alt="">
  											</div>
  											<h5 class="testimonial-title">Ibu Cahyani</h5>
  											<span class="test_designation">Pemilik Kost Niyan</span>
  											<p class="text-muted">
  												Saya mencoba dan saya merasa sangat dibantu untuk Manajemen Keuangan. Meskipun perlu banyak
  												penyempurnaan contohnya pada laporan, namun menurut saya jka sudah sempurna akan terasa
  												manfaatnya.
  											</p>
  										</div><!-- end Single Testimonials -->
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- jumbotron -->
  	<!-- testimoni -->


  	<!-- bergabung -->
  	<div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
  		<div class="row">
  			<div class="col">
  				<h2 class="text-center font-weight-bolder mt-3 mb-3">BERGABUNG DENGAN INDIEKOST SEKARANG</h2>
  			</div>
  		</div>
  		<div class="row">
  			<a href="https://api.whatsapp.com/send?phone=6281555997843" target="_blank"
  				class="btn btn-gradient-big mb-5">BERGABUNG</a>
  		</div>
  	</div>
  	<!-- bergabung -->
  </main>
