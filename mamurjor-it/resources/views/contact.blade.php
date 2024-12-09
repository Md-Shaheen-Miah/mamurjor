<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel AJAX CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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



<div class="container mt-5">
    <h1 class="text-center">Laravel AJAX CRUD</h1>



    <div class="mb-4">
        <form id="contactForm">
            <input type="hidden" id="contactId">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="contactTableBody">
            
        </tbody>
    </table>



</div>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $(document).ready(function () {
        fetchContacts(); 
    });

    
    function fetchContacts() {
        $.get('/contacts', function (contacts) {
            let tableRows = '';
            contacts.forEach(contact => {
                tableRows += `
                    <tr>
                        <td>${contact.id}</td>
                        <td>${contact.name}</td>
                        <td>${contact.email}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editContact(${contact.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteContact(${contact.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
            $('#contactTableBody').html(tableRows);
        });
    }

    
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();

        const id = $('#contactId').val();
        const url = id ? `/contacts/update/${id}` : '/contacts/store';
        const method = id ? 'POST' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: {
                _token: csrfToken,
                name: $('#name').val(),
                email: $('#email').val()
            },
            success: function () {
                $('#contactForm')[0].reset();
                fetchContacts(); 
            }
        });
    });

    
    function editContact(id) {
        $.get(`/contacts/edit/${id}`, function (contact) {
            $('#contactId').val(contact.id);
            $('#name').val(contact.name);
            $('#email').val(contact.email);
        });
    }

    
    function deleteContact(id) {
        if (confirm('Are you sure?')) {
            $.ajax({
                url: `/contacts/delete/${id}`,
                type: 'DELETE',
                data: {_token: csrfToken},
                success: function () {
                    fetchContacts(); 
                }
            });
        }
    }
</script>
</body>
</html>
