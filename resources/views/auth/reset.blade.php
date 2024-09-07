<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('auth/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('auth/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('auth/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('auth/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('auth/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('auth/assets/img/logo.png') }}" alt="">
                  <span class="d-none d-lg-block">Reset Password</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                  </div>

                  @include('layouts.messages')

                  <form class="row g-3 " action="{{ route('post-reset') }}" method="POST">
                    @csrf
                    <div class="col-12">
                      <label for="password" class="form-label">New Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Confirm New Password</label>
                        <input type="password" name="cpassword" class="form-control" id="password" required>
                      </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                      <p class="small mb-0" style="margin-top:20px;"><a href="{{ route('login') }}">I remined my password</a></p>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('auth/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('auth/assets/js/main.js') }}"></script>

</body>

</html>