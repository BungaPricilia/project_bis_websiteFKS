<?= $this->extend('base/baseAdmin') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">

    <div class="pagetitle">
      <h1 class="font-weight-bolder text-white mb-0">Form Layouts</h1>
      <nav>
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" >Forms</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Layouts</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Form</h5>

              <!-- Multi Columns Form -->
                        
              <form method="post" action="<?= base_url(); ?>/Admin/update/<?= $Admin['id'] ?>"
                            enctype="multipart/form-data">

               <?= csrf_field(); ?>

                    <div class="row">
                        <div class="form-group col-5">
                            <div class="mb-3">
                                <label for="subdistid" class="form-label">subdistid</label>
                                <input type="text" class="form-control" id="subdistid" name="subdistid"
                                    value="<?= $Admin['subdistid']; ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                            <div class="form-group col-7">
                            <div class="mb-3">
                                <label for="customer" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" id="customer"
                                    name="customer" value="<?= $Admin['customer']; ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat"
                        name="alamat" value="<?= $Admin['alamat']; ?>" style="height: 55px; vertical-align: top;">
                    </div>

                    <div class="mb-3">
                        <label for="product" class="form-label">product</label>
                        <input type="text" class="form-control" id="product"
                        name="product" value="<?= $Admin['product']; ?>" style="height: 55px; vertical-align: top;">
                    </div>

                    <div class="mb-3">
                        <label for="invoice" class="form-label">Tanggal invoice</label>
                        <input type="date" class="form-control" id="invoice" name="invoice"
                            value="<?= $Admin['invoice']; ?>" style="height: 50px;">
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group col-5">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="<?= $Admin['quantity']; ?>" style="height: 55px; vertical-align: top;">
                            </div>
                            </div>
                            <div class="form-group col-5">
                            <div class="mb-3">
                                <label for="price" class="form-label">price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="<?= $Admin['price']; ?>" style="height: 55px; vertical-align: top;">
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

