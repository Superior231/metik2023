<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/assets/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login | METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body style="background-image: url('{{ asset('assets/img/bg-login.svg')}}'); height: 100vh;">

    <div class="wrapper h-100 text-light">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card login-form">
                <a href="{{ route('index') }}"><img src="{{ url('/assets/img/logo.png') }}" alt="logo metik 2023" style="width: 100px;" class="mx-auto mb-3" id="logo-login"></a>
                <div class="card-body px-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <label for="email" class="form-label">Email</label>
                        <div class="content mb-4">
                            <div class="pass-logo">
                                <i class='bx bx-user'></i>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email" autofocus>
                        </div>

                        <label for="password" class="form-label">Password</label>
                        <div class="content mb-2">
                            <div class="pass-logo">
                                <i class='bx bx-lock-alt'></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="off" required>
                            <div class="pass-logo-pass" style="background-color: transparent;">
                                <button class="showPass" style="display: none;"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-login" name="login_btn">Login</button>
                        </div>

                        <div class="back mt-3">
                            <a href="{{ route('index') }}" class="link text-light" style="text-decoration: none;"><i class='bx bx-arrow-back'></i>&nbsp; Back</a>
                        </div>
                    </form>
                    <!-- form login bs5 end -->

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ url('/assets/js/login.js') }}"></script>


</body>

</html>
