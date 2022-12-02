<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="/css/regis-styles.css">
    

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background-color:rgb(132, 224, 252)">
    <main class="form-signin" style="background-color: #fff; border-radius: 25px;box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"
    >
      <form action="/login" method="post">
        @csrf
        @if (session()->has('success'))
          <div class="alert alert-success col-lg" role="alert">
              {{ session('success') }}
          </div>
        @endif
        @if (session()->has('loginError'))
          <div class="alert alert-danger col-lg" role="alert">
              {{ session('loginError') }}
          </div>
        @endif
        <h1 class="mb-3">Login</h1>     
        <div class="form-floating mb-3 ">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" autofocus required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
              <div class="invallid-feedback m-1" style="text-align: left; font-size: 15px; color: red; font-weight: bold">
                {{ 'Email tidak sesuai!!' }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-3 ">
          <input type="password" name="password" class="form-control" id="password" placeholder="" required>
          <label for="password">Password</label>
        </div>
        <button class="w-75 btn btn-lg btn-primary" type="submit">Login</button>
        <br>
        <small style="text-align: center">Belum punya akun? <a href="/register" style="text-decoration: none">Registrasi sekarang!</a></small>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>


    
  </body>
</html>
