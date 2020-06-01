</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; INDIEKOST 2020</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ingin Keluar Aplikasi?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>



<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets'); ?>/vendor/chart.js/Chart.min.js"></script>

<?php if($menu == 'settings_profil'): ?>
    <script>
      $(document).ready(function () {

        // untuk view data
        $('.edit_data').on('click', function () {
          var id_pengguna = $(this).attr('id');
          console.log(id_pengguna);
          $.ajax({
            url: "<?= base_url('candidate/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'settings_profil',
              id_pengguna: id_pengguna
            },
            success: function (data) {
              $('#detail_edit').html(data);
              $('#updateModal').modal();
            }
          });
        });
      });
    </script>
  <?php elseif ($menu == 'booking'): ?>
    <script>
    	$(document).ready(function () {

    		// untuk view data
    		$('.view_data').on('click', function () {
    			var id_kamar = $(this).attr('id');
    			console.log(id_kamar);

    			$.ajax({
    				url: "<?= base_url('candidate/ajax'); ?>",
    				method: "post",
    				data: {
              ajax_menu: 'get_kamar',
    					id_kamar: id_kamar
    				},
    				success: function (data) {
    					$('#detail_kamar').html(data);
    					$('#viewModal').modal();
    				}
    			});
    		});

    		// edit data
    		$('.booking_kamar').on('click', function () {
    			var id_kamar = $(this).attr('id');
    			console.log(id_kamar);

    			$.ajax({
    				url: "<?= base_url('candidate/ajax'); ?>",
    				method: "post",
    				data: {
              ajax_menu: 'booking_kamar',
    					id_kamar: id_kamar
    				},
    				success: function (data) {
    					$('#booking_data').html(data);
    					$('#bookingKamar').modal();
    				}
    			});
    		});
    	});
    </script>
  <?php endif; ?>

</body>

</html>
