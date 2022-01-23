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
        <span>FlexStart</span>
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
          <p>Testimoni</p>
        </header>

        <div class="row p-2">
          <span>
            <button type="button" class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
          </span>

          <div class="row p-2">
         
          <div class="col-12">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include("../database.php");
            $query = "SELECT * FROM testimoni";
            $hasil_mysql = mysqli_query($sambungan,$query) or die (mysqli_error($sambungan));
            $no = 1;
            while($baris = mysqli_fetch_row($hasil_mysql))
            {
            ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?php echo $baris[1] ?></td>
                    <td>
                        <a onclick="modalEdit(<?php echo $baris[0] ?>)" class="btn btn-success btn-sm mb-1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="delete-testimoni.php?id=<?=$baris[0]?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
          </div>
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
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="formEdit">
              
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

  <!--Modal Tambah-->
  <div class="modal modal-info fade bs-modal-md-primary" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body">
              <form action="save-testimoni.php" method="POST" id="formKey" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" id="namas" aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" id="kodes">
                  </div>

                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" id="kodes">
                  </div>

                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Foto</label>
                      <input type="file" name="foto">
                  </div>

                  <button type="submit" class="btn btn-primary">Tambah</button>
              </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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

    $('#modalEdit').on('hidden.bs.modal', function () {
      $('#formBarang').trigger("reset");
    });

    $('#modalTambah').on('hidden.bs.modal', function () {
      $('#formBarang').trigger("reset");
    });

    function modalEdit(id){
      $.ajax({
          type: "POST",
          url: 'get-testimoni.php',
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