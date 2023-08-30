<?= $this->extend('base/baseAdmin') ?>
<?= $this->section('content') ?>

<style>
  /* Atur ukuran container grafik */
  .chart-container {
    width: 50px;
    height: 50px;
  }
</style>

<div class="container-fluid py-4 ">
    <div class="pagetitle">
      <h1 class="font-weight-bolder text-white mb-0">Dashboard</h1>
      <nav>
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Pages</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <?php if (!empty(session()->getFlashdata('success'))): ?>
      <div class="alert alert-success" role="alert">
        <?php echo session()->getFlashdata('success'); ?>
      </div>
    <?php endif; ?>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <!-- Customer Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Customers </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($jumlah) ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Barang Terjual</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($totalQuantity) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Pendapatan </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?php echo "Rp. ".number_format($totalPrice) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

             <!-- Reports -->
             <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>
                  <center>
                  <p class="card-title" style= "font-size: 25px">Grafik 10 Produk TOP </p>
                  <br>
                <div>
                  <canvas id="thread_product" class="chart-container"></canvas>
                </div>

                </div>
                </div>
              </div>
            </div><!-- End Reports -->

      </div>
    </section>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('chartjs/Chart.bundle.min.js') ?>"></script>
<script>
  var thread_product = document.getElementById('thread_product');
  var data_thread_product = [];
  var label_thread_product = [];
  var colors = []; // Array untuk menyimpan warna-warna grafik

  // Ambil hanya 10 data produk dengan jumlah terbanyak
  <?php
  $sorted_thread_per_product = array_slice($thread_per_product, 0, 10);
  foreach ($sorted_thread_per_product as $value):
  ?>
    data_thread_product.push(<?= $value['jumlah'] ?>);
    label_thread_product.push('<?= $value['product'] ?>'); // Masukkan nama produk sebagai label legenda

    // Generate warna secara dinamis dengan fungsi rand() untuk setiap batang grafik
    var color = 'rgba(' + Math.floor(Math.random() * 256) + ','
                        + Math.floor(Math.random() * 256) + ','
                        + Math.floor(Math.random() * 256) + ', 0.8)';
    colors.push(color);
  <?php endforeach ?>

  var data_thread_per_product = {
    datasets: [{
      data: data_thread_product,
      backgroundColor: colors, // Setiap batang grafik akan memiliki warna acak
    }],
    labels: label_thread_product, // Gunakan label produk sebagai legenda
  }

  var chart_thread_product = new Chart(thread_product, {
    type: 'bar',
    data: data_thread_per_product,
    options: {
      legend: { display: false }, // Menampilkan legenda
    }
  });

</script>
<?= $this->endSection() ?>
