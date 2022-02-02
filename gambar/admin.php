<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("../head.php");
        session_start();

        if (!isset($_SESSION['user'])){
          header("Location: ../login.php");
        }
    ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../dashboard/dashboard.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span>Hondaku</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="../produk/admin.php">Produk</a></li>
            <li><a class="nav-link scrollto" href="../testimoni/admin.php">Testimoni</a></li>
            <li><a class="nav-link scrollto" href="../gambar/admin.php">Gambar</a></li>
            <li><a class="nav-link scrollto" href="../logout.php">Logout</a></li>
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>List</h2>
          <p>Gambar</p>
        </header>

        <div class="row p-2">          
          <div class="row flex-wrap justify-content-center">
            <?php
            include("../database.php");
            $query = "SELECT * FROM gambar";
            $hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
            $no = 1;
            while($baris = mysqli_fetch_row($hasil_mysql))
            {
              for($i = 1 ; $i < count($baris); $i++){
            ?>
                <!-- <div class=""> -->
                  <div class="card my-2" style="width: 15rem;">
                    <img src="../assets/img/gambar/<?= $baris[$i] ?>" class="card-img-top" style="width:100%" alt="...">
                    <div class="card-body">
                      <a class="btn btn-info btn-sm" onclick="modalEdit(<?=$i?>)"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                  </div>
                <!-- </div> -->
                
                
            <?php
              }
            }
            ?>
          </div>
        </div>

      </div>

    </section><!-- End Values Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <?php 
            include('../component/footer-admin.php')
          ?>
        </div>
      </div>
    </div> 

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!--Modal Edit-->
  <div class="modal modal-info fade bs-modal-md-primary" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Produk Anda</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body" id="formEdit">
                  
              </div>
          </div>
      </div>
  </div>  
  
    <!-- Vendor JS Files -->
  
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Authorization': `Bearer {{Session::get('token')}}`
      }
	  });

    tinymce.init({
        selector: '#textareaAdd',
        plugins: [
                  "advlist autolink lists charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "paste wordcount"
              ],
        toolbar: "undo redo | bold italic | bullist numlist outdent indent "
    });

    $('#modalEdit').on('hidden.bs.modal', function () {
      $('#formBarang').trigger("reset");
    });

    $('#modalTambah').on('hidden.bs.modal', function () {
      $('#formBarang').trigger("reset");
    })

    function modalEdit(id){
      $.ajax({
          type: "POST",
          url: 'get-gambar.php',
          data: {
              'id' : id
          },
          success: function(data)
          {
              $('#modalEdit').modal('show');
              $('#formEdit').html(data);

          }
      });

    }

  </script>

</body>

</html>