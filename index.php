<?php
session_start();
include "config/database.php";

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
  $user = mysqli_fetch_assoc($query);

  if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    $_SESSION['id_user'] = $user['id_user'];


    header("Location: pages/dashboard.php");
    exit;
  } else {
    echo "<script>alert('User atau Password Salah');</script>";
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Icon -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Gravitas+One&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: Poppins, sans-serif;
    }
  </style>

</head>

<body class="bg-black">

  <!-- BACKGROUND -->
  <div class="relative flex min-h-screen items-center justify-center bg-[url('img/bg.png')] bg-cover bg-center">

    <!-- overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/80"></div>

    <!-- LOGIN CARD -->
    <div class="relative z-10 w-full max-w-md">

      <div class="text-center text-white mb-8">

        <div class="flex items-center justify-center gap-3 mb-3">
          <i class="fi fi-ss-book-open-cover text-3xl"></i>
          <h1 class="text-4xl font-[Gravitas-One] tracking-wide">
            Mona Library
          </h1>
          <i class="fi fi-ss-book-open-cover text-3xl"></i>
        </div>

        <p class="text-white/70 text-sm">
          Digital Library Management
        </p>
      </div>


      <div class="bg-white/20 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8">
        <form method="POST" class="space-y-5">
          <h2 class="text-2xl font-semibold text-white text-center">
            Login Account
          </h2>
          <div>
            <label class="text-white text-sm">
              Username
            </label>
            <div class="relative mt-1">
              <span class="absolute left-3 top-3 text-white/70">
                <i class="fi fi-ss-user"></i>
              </span>
              <input
                type="text"
                name="username"
                placeholder="Enter your username"
                class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/10 border border-white/40 text-white placeholder-white/60 focus:border-white focus:outline-none"
                required>
            </div>
          </div>

          <div>
            <label class="text-white text-sm">
              Password
            </label>
            <div class="relative mt-1">
              <span class="absolute left-3 top-3 text-white/70">
                <i class="fi fi-ss-lock"></i>
              </span>
              <input
                type="password"
                name="password"
                placeholder="Enter your password"
                class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/10 border border-white/40 text-white placeholder-white/60 focus:border-white focus:outline-none"
                required>
            </div>
          </div>

          <button
            type="submit"
            name="login"
            class="w-full py-3 rounded-lg bg-white text-black font-semibold transition hover:bg-gray-200 hover:scale-[1.02]">
            Sign In
          </button>

          <div class="text-center text-sm text-white/80">
            Don't have an account?
            <a href="register.php" class="font-semibold hover:underline">
              Create Account
            </a>
          </div>
        </form>
      </div>

      <div class="text-center text-white/60 text-xs mt-6">
        <script>
          document.write(new Date().getFullYear());
        </script>
        © Mona Library
      </div>
    </div>
  </div>
</body>
</html>