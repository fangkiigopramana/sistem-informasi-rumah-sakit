<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Registrasi</title>

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
  <body class="text-center" style="background-color:rgb(136, 231, 140); background-repret: no-repeat; background-size: 100%;">
    
    <main class="form-signin" style="margin-top: 100px">
      <form action="/register" method="post">
        <h1 class="mb-3">Registrasi</h1>
        <div class="form-group align-self-start">
          @csrf
          <div class="form-floating mb-1">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" required value="{{ old('name') }}">
            <label for="name">Nama</label>
            @error('name')
            <div class="invalid-feedback" style="text-align: left">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-1">
            <input type="text" name="username"class="form-control @error('username') is-invalid @enderror" id="username" placeholder="" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback" style="text-align: left">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-1">
            <input type="email" name ="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback" style="text-align: left">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-1">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback" style="text-align: left">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <button class="w-75 btn btn-lg btn-primary" type="submit">Daftar</button>
        <br>
        <small style="text-align: center">Sudah punya akun? <a href="/login" style="text-decoration: none">Login sekarang!</a></small>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>


    
  </body>
</html>
