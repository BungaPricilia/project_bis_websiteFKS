 <!--   Core JS Files   -->
 <script>
    // Mendapatkan referensi ke elemen quantity, price, dan total_price
    var quantityInput = document.getElementById('quantity');
    var priceInput = document.getElementById('price');
    var totalPriceInput = document.getElementById('totalprice');

    // Fungsi untuk menghitung dan mengisi total harga tanpa desimal
    function calculateTotalPrice() {
        var quantity = parseFloat(quantityInput.value) || 0; // Mengambil nilai quantity (jika kosong, maka 0)
        var price = parseFloat(priceInput.value) || 0; // Mengambil nilai price (jika kosong, maka 0)
        var total = quantity * price; // Menghitung total harga
        totalPriceInput.value = Math.round(total); // Mengisi nilai total harga tanpa desimal
    }

    // Mendengarkan perubahan pada input quantity dan price
    quantityInput.addEventListener('input', calculateTotalPrice);
    priceInput.addEventListener('input', calculateTotalPrice);
</script>


  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <!-- /2 -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>