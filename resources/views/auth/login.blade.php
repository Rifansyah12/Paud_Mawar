<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Paud Mawar</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      rel="stylesheet"
    />

    <style>
      body {
        background: linear-gradient(to right, #00ffff, #e0f7fa);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .login-card {
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
      }

      .login-card .form-control {
        border-radius: 30px;
      }

      .login-card .btn-primary {
        background-color: #00cccc;
        border: none;
        border-radius: 30px;
      }

      .login-card .btn-primary:hover {
        background-color: #009999;
      }
    </style>
  </head>
  <body>
    <div class="login-card">
     <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="username"><i class="fas fa-user mr-2"></i>Email</label>
          <input
            type="email"
            class="form-control"
            id="username"
            name="email"
            required
          />
        </div>

        <div class="form-group">
          <label for="password"><i class="fas fa-lock mr-2"></i>Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
          />
        </div>

        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember" />
          <label class="form-check-label" for="remember">Ingat Saya</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>

      <p class="text-center mt-3">
        <a href="{{ route('password.request') }}">Lupa Password?</a>
      </p>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
