<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/register.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <form action="{{ route('register.post') }}" method="post">
        @csrf
        <h1>Daftar Akun Baru</h1>
        <div class="input-box">
          <div class="input-field">
            <input type="text" name="username" placeholder="Username" required>
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="input-field">
            <input type="email" name="email" placeholder="Email" required>
            <i class="bx bxl-gmail"></i>
          </div>
        </div>
        <div class="input-box">
          <div class="input-field">
            <input type="password" name="password" placeholder="Password" required>
            <i class="bx bx-lock"></i>
          </div>
          <div class="input-field">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <i class="bx bx-lock"></i>
          </div>
        </div>
        <label>
          <input type="checkbox"> Dengan ini saya menyatakan bahwa informasi di atas benar dan tepat
        </label>
        <button type="submit" class="btn">Register</button>
        <div class="register-link">
          <p>Login? <a href="{{ route('login') }}">Login</a></p>
        </div>
        @if ($errors->any())
          <p>{{ $errors->first() }}</p>
        @endif
      </form>
    </div>
  </body>
</html>
