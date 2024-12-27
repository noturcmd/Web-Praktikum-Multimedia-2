<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Beastie Brain Tease</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #000A1F;
      color: #ffffff;
      font-family: 'Arial', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: linear-gradient(145deg, #000A1F, #001B3D);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.8);
      width: 100%;
      max-width: 400px;
    }

    .login-container h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      text-align: center;
      color: #FFD700; /* Warna kuning emas */
    }

    .btn-primary {
      background: linear-gradient(90deg, #FFD700, #FFB800);
      border: none;
      transition: all 0.3s ease-in-out;
      font-weight: bold;
      color: #000A1F;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #FFC700, #FFA500);
    }

    .form-control {
      background-color: #001B3D;
      color: #ffffff;
      border: 1px solid #FFD700;
      border-radius: 10px;
      padding: 10px 15px;
    }

    .form-control:focus {
      background-color: #002850;
      color: #ffffff;
      box-shadow: 0 0 10px #FFD700;
      border-color: #FFD700;
    }

    .form-control::placeholder {
      color: #FFD700;
      opacity: 0.8;
    }

    .form-label {
      font-size: 1rem;
      font-weight: 500;
      color: #FFD700;
    }

    .text-center a {
      color: #FFD700;
      text-decoration: none;
      font-weight: bold;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h1>Login</h1>
    <form method="POST" action="business-logic/validate-login.php" name="form-login">
      <div class="mb-4">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn btn-primary w-100 py-2" name="login">Login</button>
    </form>
    <div class="text-center mt-4">
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</body>

</html>
