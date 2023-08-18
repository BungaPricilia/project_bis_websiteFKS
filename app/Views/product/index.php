<?= $this->extend('base/baseAdmin') ?>
<?= $this->section('content') ?>
<div class="container-fluid py-4">

    <div class="pagetitle">
      <h1 class="font-weight-bolder text-white mb-0">Data Tables</h1>
      <nav>
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm "><a class="opacity-5 text-white" >Tables</a></li>
        <li class="breadcrumb-item text-sm text-white" aria-current="page">Data</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">

        <div class="card-header">
        <div class="row align-items-center">
            <div class="form-group col-6 mb-3">
            <div id="header" class="search-bar">
                  <form class="search-form d-flex align-items-center" method="get" action="">
                    <input type="text" name="keyword" placeholder="Search" title="Enter search keyword" style="width:250pt; height:40px; margin-left:30px; margin-right:10px;">
                    <button type="submit" title="Search" name="tombolcari" style="width:50pt; height:40px;"><i class="bi bi-search"></i></button>
                  </form>
            </div><!-- End Search Bar -->
            </div>
            <br>

            <div class="form-group col-6 mb-3 ">
                  <div class="d-flex">
                      <a href="<?= base_url(); ?>/export" class="btn btn-primary" style="height:40px; font-size: 17px;" >
                          <i class="fas fa-file-download"></i> Export CSV</a>
                  </div>
            </div>
        </div>
        </div>

            <div class="card-body">
            <div class="card-body table-responsive">
              <h5 class="card-title">List Data Customer</h5>

              <!-- Table with stripped rows -->
              
              <?php if (!empty(session()->getFlashdata('success'))): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
              
              <table class="table">
              <tbody>
                  <tr>
                  <th scope="col ">ID</th>
                  <th scope="col ">Subdistid</th>
                  <th scope="col ">Customer</th>
                  <th scope="col ">Alamat</th>
                  <th scope="col ">Product</th>
                  <th scope="col ">Invoice</th>
                  <th scope="col ">Quantity</th>
                  <th scope="col ">Price</th>
                  <th scope="col ">Action</th>
                  </tr>
                  <?php
                  $i = 1;
                  foreach ($product as $item):?>
                  <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $item['subdistid'] ?></td>
                      <td><?= $item['customer'] ?></td>
                      <td><?= $item['alamat'] ?></td>
                      <td><?= $item['product'] ?></td>
                      <td><?php echo date('d/m/Y', strtotime($item['invoice']))?></td>
                      <td><?= $item['quantity'] ?></td>
                      <td><?php echo "Rp. ".number_format($item['price']) ?></td>
                      <td>
                          <div class="btn-group " role="group " aria-label="Basic example ">
                              <form action="/Admin/<?= $item['id'] ?>" method="POST" onsubmit="return confirm(`Are you sure?`)">

                                  <a href="/Admin/<?= $item['id'] ?>/edit" class="btn btn-success btn-sm "> Edit </a>
                                  <input type="hidden" name="_method" value="DELETE" /> <button class="btn btn-danger btn-sm" type="submit"> Delete </button>
                              </form>
                          </div>
                      </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

              <div class="col-12">
            <?= $pager->links('products', 'custom_pagination') ?>
            </div>
            </div>
            
      </div>
    </section>

 </div>

<?= $this->endSection() ?>