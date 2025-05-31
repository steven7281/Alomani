<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Batik Alomani</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  
  <style>
    body {
      min-height: 100vh;
      background: url('assets/images/login.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.97);
      border-radius: 10px;
      padding: 40px 30px 30px 30px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .login-title {
      font-weight: bold;
      font-size: 2rem;
      margin-bottom: 30px;
      font-family: 'Montserrat', Arial, sans-serif;
    }

    .form-control {
      background: #e0e0e0;
      border: none;
      border-radius: 5px;
      margin-bottom: 15px;
      font-size: 1rem;
      padding: 12px 15px;
    }

    .form-control:focus {
      border-color: #814603;
      box-shadow: 0 0 0 0.2rem rgba(129, 70, 3, 0.25);
    }

    .btn-login {
      background-color: #814603;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-login:hover {
      background-color: #6b3a02;
    }

    .password-toggle {
      position: relative;
    }

    .password-toggle i {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
    }

    .alert {
      display: none;
      margin-bottom: 20px;
    }

    .divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }

    .divider::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      width: 45%;
      height: 1px;
      background-color: #ddd;
    }

    .divider::after {
      content: "";
      position: absolute;
      right: 0;
      top: 50%;
      width: 45%;
      height: 1px;
      background-color: #ddd;
    }

    .btn-google {
      background-color: #fff;
      color: #666;
      border: 1px solid #ddd;
      padding: 12px;
      border-radius: 5px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .btn-google:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <div class="text-center mb-4">
        <img src="assets/images/logo.png" alt="Batik Alomani Logo" style="max-width: 150px;">
      </div>

      <div class="login-title">Login</div>
      <div class="alert alert-danger" id="errorAlert" role="alert"></div>
      
      <form id="loginForm" onsubmit="return login(event)">
        <div class="mb-3">
          <input type="email" class="form-control" id="loginEmail" placeholder="Email" required>
        </div>
        <div class="mb-3 password-toggle">
          <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
          <i class="fas fa-eye" onclick="togglePasswordVisibility('loginPassword', this)"></i>
        </div>
        <button type="submit" class="btn btn-login">Masuk</button>
      </form>

      <div class="divider">atau</div>

      <button class="btn-google" onclick="loginWithGoogle()">
        <img src="https://www.google.com/favicon.ico" alt="Google" width="20">
        Masuk dengan Google
      </button>

      <div class="text-center mt-3">
        <p>Belum punya akun? <a href="register.html" class="text-decoration-none">Daftar</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>