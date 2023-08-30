<?= $this->extend('base/baseSuperAdmin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="pagetitle">
      <h1 class="font-weight-bolder text-white mb-0">Form Layouts</h1>
      <nav>
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" >Forms</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">New Layouts</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <a href="javascript:history.back()" class="btn btn-primary" type="button">Back</a>

              <h1 class="row justify-content-center ">Data Form</h1>
              <br>

              <!-- Multi Columns Form -->
              <?php if (!empty(session()->getFlashdata('error'))): ?>
                            <div class="alert alert-danger" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        
                <form method="post" action="<?= base_url(); ?>/Admin/save" enctype="multipart/form-data">
                <?= csrf_field(); ?> 

                    <div class="row  row justify-content-center">
                        <div class="form-group col-3">
                            <div class="mb-3">
                                <label for="subdistid" class="form-label">subdistid</label>
                                <input type="text" class="form-control" id="subdistid" name="subdistid"
                                    value="<?= old('subdistid'); ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                            <div class="form-group col-7">
                            <div class="mb-3">
                                <label for="customer" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" id="customer"
                                    name="customer" value="<?= old('customer'); ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                    <div class="form-group col-10">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat"
                        name="alamat" value="<?= old('alamat'); ?>" style="height: 55px; vertical-align: top;">
                    </div>
                    </div>

                    <div class="mb-3  row justify-content-center">
                    <div class="form-group col-10">
                        <label for="product" class="form-label">product</label>
                        <input type="text" class="form-control" id="product"
                        name="product" value="<?= old('product'); ?>" style="height: 55px; vertical-align: top;">
                    </div>
                    </div>

                    <div class="mb-3 row justify-content-center">
                    <div class="form-group col-10">
                        <label for="invoice" class="form-label">Tanggal invoice</label>
                        <input type="date" class="form-control" id="invoice" name="invoice"
                            value="<?= old('invoice'); ?>" style="height: 50px;">
                    </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group col-5">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="<?= old('quantity'); ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                            <div class="form-group col-5">
                            <div class="mb-3">
                                <label for="price" class="form-label">price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="<?= old('price'); ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                            <div class="form-group col-5">
                                <div class="mb-3">
                                    <label for="totalprice" class="form-label">Total Harga</label>
                                    <input type="text" class="form-control" id="totalprice" name="totalprice"
                                        value="<?= old('totalprice'); ?>" style="height: 55px; vertical-align: top;" readonly>
                                </div>
                            </div>
                    </div>


                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>
        </div>
      </div>
    </section>

    </div>

<?= $this->endSection() ?>