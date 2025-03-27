<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Picks - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        /* Custom Purple Theme */
        :root {
            --primary-color: #6a0dad;
            --secondary-color: #9b59b6;
            --dark-bg: #2c2c2c;
            --light-text: #fff;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .form {
            background: var(--light-text);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form h2 {
            text-align: center;
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .form input[type="text"],
        .form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        .form input[type="text"]:focus,
        .form input[type="password"]:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .form button {
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: var(--light-text);
            border: none;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
        }

        .form button:hover {
            background-color: var(--secondary-color);
        }

        button:focus,
        button:active {
            outline: none !important;
            box-shadow: none !important;
            background-color: var(--primary-color) !important;
            border: none !important;
        }

        button,
        input,
        textarea {
            outline: none !important;
        }


        .alert {
            background-color: #d1c4e9;
            color: #333;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .form {
                padding: 25px;
            }

            .form h2 {
                font-size: 1.6rem;
            }

            .form input[type="text"],
            .form input[type="password"] {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <div class="form">
        @if (session('fail'))
            <div class="alert alert-danger h5 text-center" role="alert">
                {{ session('fail') }}
            </div>
        @endif
         @if (session('logout'))
            <div class="alert alert-info h5 text-center" role="alert">
                {{ session('logout') }}
            </div>
        @endif

        <h2>Admin Login</h2>

        <form action="/admin/login" method="post">
            @csrf
            <input type="text" id="username" name="name" required placeholder="Enter username">
            <br><br>
            <input type="password" id="password" name="pass" required placeholder="Enter password">
            <br><br>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>
</html>