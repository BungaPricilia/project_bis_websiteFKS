
<head>
    <?= $this->include('auth/head') ?>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
  
  </div>

<main class="main-content  mt-0">

    <section>
      <div class="page-header min-vh-100">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">

              
              <div class="card-header pb-0 text-start">
                <div class="logo d-flex align-items-center w-auto justify-content-center py-3">
                  <img src="/assets/img/FKS_logo.jpg" alt="logo">
                </div><!-- End Logo -->
                <div class="pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>
                <br>
                <hr>
                <br>
                </div>

              <?php if (session()->getFlashData('success')) { ?>
                <div class="alert alert-success">
                  <?= session()->get('success') ?>
                </div>
              <?php } ?>

              <?php if (session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('errors') ?>
                </div>
              <?php } ?>

              <form action="/login" method="post">
                    <div class="mb-3">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="username" aria-label="username" required>
                      <div class="invalid-feedback">Tolong masukkan username.</div>
                    </div>
                    <br>
                    <div class="mb-3">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="password" aria-label="password" required>
                      <div class="invalid-feedback">Tolong masukkan password!</div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                      
                    </div>
                    <br>
                  </form>
                </div>
                
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" 
              style="background-color: #9683CA">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h1 class="mt-5 text-white font-weight-bolder position-relative">"Welcome to Website"</h1>
                <h4 class="text-white position-relative">DiMS FKS Food</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>

    <?= $this->include('auth/scripts') ?>
</body>

</html>