<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password | SD IT Bunayya</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  
  <!-- Custom styles for this template-->
  <link href="{{url('backend/css/sb-admin-2.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="bg-atas text-center mb-4">
                    <img src="{{url('../../foto/bunayya.png')}}" alt="">
                  </div>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sistem Informasi Akademik SD IT Bunayya</h1>
                  </div>
                  <form class="user" method="POST" action="{{route('postreset')}}">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username (NISN / NIP)" name="username" value="{{old('username')}}">
                      @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    {{-- <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password Lama" name="password-lama">
                    </div> --}}
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('password-baru') is-invalid @enderror" id="exampleInputPassword" placeholder="Masukan Password Baru" name="password-baru" value="{{old('password-baru')}}">
                      @error('password-baru')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                      Reset
                    </button>
                    <a href="{{route('login')}}" style="text-decoration: none; font-size: 15px;">Login</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('backend/js/sb-admin-2.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if (Session::has('status'))
      toastr["warning"]("Username / Password tidak sesuai")
      // toastr.error("{{Session::get('status')}}", "Trimakasih")
    @endif
  </script>
</body>

</html>
