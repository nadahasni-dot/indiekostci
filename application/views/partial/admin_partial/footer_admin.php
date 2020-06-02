<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; INDIEKOST 2019</span>
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
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

<!-- lightbox -->
<script src="<?= base_url('assets/js/lightbox.js') ?>"></script>

<!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>


<?php if($menu == 'dashboard'): ?>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
      '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          <?php
            foreach($pendapatanByBulan as $row) {
              echo "'".$row['bulan']."'".", ";
            }      
          ?>
        ],
        datasets: [{
          label: "Pendapatan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            <?php
              foreach($pendapatanByBulan as $row) {
                echo $row['pendapatan_bulanan'].', ';
              } 
            ?>
          ],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return 'Rp ' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>
<?php elseif($menu == 'penghuni'): ?>
  <script>
      $(document).ready(function () {

        // untuk view data
        $('#dataTable').on('click','.view_data', function () {
          var id_pengguna = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'get_penghuni',
              id_pengguna: id_pengguna
            },
            success: function (data) {
              $('#detail_pengguna').html(data);
              $('#viewModal').modal();
            }
          });
        });

        // edit data
        $('#dataTable').on('click','.edit_data', function () {
          var $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
            return $(this).text();
          }).get();

          var id_pengguna = data[1];

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_penghuni',
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

<?php elseif($subMenu == 'data_layanan'): ?>

  <script>
    $(document).ready(function(){
      // untuk view data
      $('#dataTable').on('click','.view_data', function () {
          var id_layanan = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_datalayanan',
              id_layanan: id_layanan
            },
            success: function (data) {
              $('#detail_layanan').html(data);
              $('#updateModal').modal();
            }
          });
        });
    });
    </script>
<?php elseif($subMenu == 'data_jenis_pengeluaran'): ?>
  <script>
    $(document).ready(function(){
      // untuk view data
      $('#dataTable').on('click','.view_data', function () {
          var id_jenis_pengeluaran = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_datajenispengeluaran',
              id_jenis_pengeluaran: id_jenis_pengeluaran
            },
            success: function (data) {
              $('#detail_jenis_pengeluaran').html(data);
              $('#updateModal').modal();
            }
          });
        });
    });
    </script>
    <?php elseif ($subMenu == 'data_tipe_kamar' ) : ?>
      <script>
    $(document).ready(function(){
      // untuk view data
      $('#dataTable').on('click','.view_data', function () {
          var id_tipe = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_datatipekamar',
              id_tipe: id_tipe
            },
            success: function (data) {
              $('#detail_tipe_kamar').html(data);
              $('#updateModal').modal();
            }
          });
        });
    });
    </script>

  <?php elseif($menu == 'pembayaran' && $subMenu == 'pemasukan'): ?>
  <script>
    $(document).ready(function () {

      // untuk view data
      $('#dataTable').on('click','.view_data', function () {
        var id_pembayaran = $(this).attr('id');
        console.log(id_pembayaran);

        $.ajax({
          url: "<?= base_url('admin/ajax'); ?>",
          method: "post",
          data: {
            ajax_menu: 'get_pembayaran',
            id_pembayaran: id_pembayaran
          },
          success: function (data) {
            $('#detail_pembayaran').html(data);
            $('#viewModal').modal();
          }
        });
      });

      // edit data
      $('#dataTable').on('click','.edit_data', function () {
        var $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();

        var id_pembayaran = data[1];
        console.log(id_pembayaran);

        $.ajax({
          url: "<?= base_url('admin/ajax'); ?>",
          method: "post",
          data: {
            ajax_menu: 'edit_pembayaran',
            id_pembayaran: id_pembayaran
          },
          success: function (data) {
            $('#detail_edit').html(data);
            $('#updateModal').modal();
          }
        });
      });
    });
  </script>
  <?php elseif($menu == 'pembayaran' && $subMenu == 'pengeluaran'): ?>

  <script>
      $(document).ready(function () {

        // untuk view data
        $('#dataTable').on('click', '.view_data', function () {
          var id_pengeluaran = $(this).attr('id');
          console.log(id_pengeluaran);

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'get_pengeluaran',
              id_pengeluaran: id_pengeluaran
            },
            success: function (data) {
              $('#detail_pengeluaran').html(data);
              $('#viewModal').modal();
            }
          });
        });

        // edit data
        $('#dataTable').on('click', '.edit_data', function () {
          var $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
            return $(this).text();
          }).get();

          var id_pengeluaran = data[1];
          console.log(id_pengeluaran);

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_pengeluaran',
              id_pengeluaran: id_pengeluaran
            },
            success: function (data) {
              $('#detail_edit').html(data);
              $('#updateModal').modal();
            }
          });
        });
      });
  </script>
<?php elseif($menu == 'kamar' && $subMenu == 'menghuni'): ?>
<script>
  $(document).ready(function () {

    // untuk view data
    $('#dataTable').on('click','.view_data', function () {
      var id_menghuni = $(this).attr('id');
      console.log(id_menghuni);

      $.ajax({
        url: "<?= base_url('admin/ajax'); ?>",
        method: "post",
        data: {
          ajax_menu: 'get_menghuni',
          id_menghuni: id_menghuni
        },
        success: function (data) {
          $('#detail_menghuni').html(data);
          $('#viewModal').modal();
        }
      });
    });

    // edit data
    $('#dataTable').on('click','.edit_data', function () {
      var $tr = $(this).closest('tr');          

      var data = $tr.children("td").map(function () {
        return $(this).text();
      }).get();

      var id_menghuni = data[1];
      console.log(id_menghuni);

      var judul = "Edit Data Menghuni id: ";
      var stringJudul = judul + id_menghuni

      $('#editJudul').html(stringJudul);

      $.ajax({
        url: "<?= base_url('admin/ajax'); ?>",
        method: "post",      
        data: {
          ajax_menu: 'edit_menghuni',
          id_menghuni: id_menghuni
        },
        success: function (data) {
          $('#detail_edit').html(data);
          $('#updateModal').modal();
        }
      });
    });
  });
</script>
<?php elseif($menu == 'kamar' && $subMenu == 'booking_kamar'): ?>
  <script>
        $(document).ready(function () {

          // untuk view data
          $('#dataTable').on('click','.view_data', function () {
            var id_booking = $(this).attr('id');
            console.log(id_booking);

            $.ajax({
              url: "<?= base_url('admin/ajax'); ?>",
              method: "post",
              data: {
                ajax_menu: 'get_booking',
                id_booking: id_booking
              },
              success: function (data) {
                $('#detail_kamar').html(data);
                $('#viewModal').modal();
              }
            });
          });

          // edit data
          $('#dataTable').on('click','.edit_data', function () {
            var $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
              return $(this).text();
            }).get();

            var id_booking = data[1];
            console.log(id_booking);

            $.ajax({
              url: "<?= base_url('admin/ajax'); ?>",
              method: "post",
              data: {
                ajax_menu: 'update_booking',
                id_booking: id_booking
              },
              success: function (data) {
                $('#detail_edit').html(data);
                $('#updateModal').modal();
              }
            });
          });
        });
      </script>
<?php endif; ?>

</body>

</html>
