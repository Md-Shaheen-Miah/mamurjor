<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="/" class="logo">MAMURJOR<span style="color:red;">*</span>IT</a>
        <ul class="nav-links">
            <li><a href="{{ route('image-upload.create') }}">Image-Upload</a></li>
            <li><a href="/contact">Crud</a></li>
            <li><a href="/info1">Information</a></li>
            <li><a href="/description">Task-Description</a></li>
        </ul>
          <div style="margin-right: 10%; ">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a style="color: #ffffff;"
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
     <h1>Information Form part-1</h1>
     <form action="#" method="#">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter your name" required>
        
        <label>Father Name:</label>
        <input type="text" name="father_name" placeholder="Enter your father's name" required>
        
        <label>Mother Name:</label>
        <input type="text" name="mother_name" placeholder="Enter your mother's name" required>
        
        <label>Gender:</label>
        <select name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        
        <button type="submit">Next</button>
    </form>
    
    

</body>
</html>





