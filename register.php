<?php
include 'config/database.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 2;

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan');</script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (username, email, password, role) VALUES ( '$username', '$email', '$password', '$role') ");
        if ($query) {
            echo "<script>alert('Register berhasil'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Register gagal');</script>";
        }
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
                    Create your library account
                </p>
            </div>
            <div class="bg-white/20 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8">
                <form method="POST" class="space-y-5">
                    <h2 class="text-2xl font-semibold text-white text-center">
                        Register Account
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
                            Email
                        </label>
                        <div class="relative mt-1">
                            <span class="absolute left-3 top-3 text-white/70">
                                <i class="fi fi-ss-envelope"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                placeholder="Enter your email"
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
                                placeholder="Choose a strong password"
                                class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/10 border border-white/40 text-white placeholder-white/60 focus:border-white focus:outline-none"
                                required>
                        </div>
                    </div>
                    <button
                        type="submit"
                        name="register"
                        class="w-full py-3 rounded-lg bg-white text-black font-semibold transition hover:bg-gray-200 hover:scale-[1.02]">
                        Create Account
                    </button>
                    <div class="text-center text-sm text-white/80">
                        Already have an account?
                        <a href="index.php" class="font-semibold hover:underline">
                            Login here
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