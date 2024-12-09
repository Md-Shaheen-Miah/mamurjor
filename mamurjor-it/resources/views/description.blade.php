<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="/" class="logo">MAMURJOR<span style="color:red;">*</span>IT</a>
        <ul class="nav-links">
            <li><a href="{{ route('image-upload.create') }}">Image-Upload</a></li>
            <li><a href="/contact">Crud</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="/description">Task-Description</a></li>
        </ul>
          <div style="margin-right: 10%; ">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a style="color: #ffffff; text-decoration:none; "
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
        
                        @if (Route::has('register'))

                            <a style="color: #ffffff;margin-left:30px; text-decoration:none;"
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    </div>
    </nav>

    <h1 style="margin-left: 5%;margin-top:2%;">The details of how the work is done are given below:</h1>
    <p style="margin-left: 5%;margin-top:2%;">
        1.First Laravel Composer is installed.<br>
        => composer create-project --prefer-dist Laravel/Laravel MAMURJOR-IT <br><br>
        2.Installed breeze for Authentication <br>
        =>Composer require Laravel/breeze --dev <br>
        =>php artisan breeze:install blade<br>
    </p>

</body>
</html>
