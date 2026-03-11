<?php

session_start();
include "config/database.php";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $user = mysqli_fetch_assoc($query);

  var_dump($user);

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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CDN TAILWINDCSS -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- CDN FALTICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

  <!-- CDN FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Container dan Background -->
  <div class="relative flex min-h-dvh items-center justify-center 
  bg-[url('img/bg.png')] bg-cover bg-center">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Wrapper -->
    <div class="z-10 flex flex-col items-center">

      <!-- Judul -->
      <div class="text-white font-bold mb-6 tracking-wide">
        <i class="fi fi-ss-book-open-cover text-2xl mx-3"></i>
        <span class="text-4xl font-[Gravitas-One]"> Mona Library </span>
        <i class="fi fi-ss-book-open-cover text-2xl mx-3"></i>
      </div>

      <div class="rounded-lg bg-white/30 backdrop-blur-sm p-6 w-100 shadow-lg lg:p-10">

        <form class="space-y-4" method="POST">

          <div class="text-2xl font-bold text-white">
            <p>Login</p>
          </div>

          <div class="space-y-1">
            <label class="inline-block font-medium text-white" for="username">
              Username
            </label>

            <input
              type="text"
              id="username"
              name="username"
              class="block w-full appearance-none rounded-sm border border-white/70 px-4 py-3 text-white placeholder-white/60 outline-hidden focus:border-white focus:ring-0"
              placeholder="Enter your Username"
              required />
          </div>

          <div class="space-y-1">
            <label class="inline-block font-medium text-white" for="password">
              Password
            </label>

            <input
              type="password"
              id="password"
              name="password"
              class="block w-full appearance-none rounded-sm border border-white/70 px-4 py-3 text-white placeholder-white/60 outline-hidden focus:border-white focus:ring-0"
              placeholder="Enter your password"
              required />
          </div>

          <div>
            <button
              type="submit"
              name="login"
              class="block w-full rounded-sm bg-white/40 px-4 py-3 font-semibold text-white transition hover:bg-white/60">
              Sign In
            </button>
          </div>

          <div class="flex justify-between">
            <a
              class="text-sm text-white hover:underline"
              href="register.php">
              Create Account
            </a>
          </div>

        </form>


      </div>
      <div class="mt-6 text-center text-xs text-white">
        <script>
          document.write(new Date().getFullYear());
        </script>

        &copy;
        <a
          class="font-medium text-white hover:underline"
          href="javascript:void(0)">
          Terms & Conditions
        </a>
      </div>

    </div>

  </div>

</body>

</html>