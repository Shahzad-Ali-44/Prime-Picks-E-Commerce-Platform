<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Customer Order</title>
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
            flex-direction: column;
            font-family: Arial, sans-serif;
        }

        /* Back Button */
        .back-btn {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: bold;
            margin-left: 20px;
        }

        .back-btn:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }

        /* Navbar */
        .navbar {
            background: var(--primary-color);
            padding: 15px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .nav-link {
            color: var(--light-text);
            font-size: 1.2rem;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #d1c4e9;
        }

        .logo {
            color: var(--light-text);
            font-size: 1.8rem;
            font-weight: bold;
        }
        .navbar .logo:hover {
            color: var(--light-text);
           
        }

        .body1 {
            background: var(--light-text);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .form input[type="phone"],
        .form input[type="text"],
        .form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .form input[type="phone"],
        .form input[type="text"] {
            background-color: #f9f9f9;
        }
        

        .form input[type="submit"] {
            background-color: var(--primary-color);
            color: var(--light-text);
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: var(--secondary-color);
        }

        .alert {
            background-color: #d1c4e9;
            color: #333;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            margin-top: auto;
            background: var(--dark-bg);
            color: var(--light-text);
            padding: 30px 0;
            text-align: center;
        }

        .footer a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            color: #d1c4e9;
        }


        @media (max-width: 768px) {
            .body1 {
                padding: 20px;
            }

            h2 {
                font-size: 1.6rem;
            }

            .form input[type="phone"],
            .form input[type="text"],
            .form input[type="submit"] {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="/" class="navbar-brand logo"><i class="fa fa-shopping-cart"></i> Prime Picks</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/cart" class="nav-link">My Cart <i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Order Page -->
    <div class="container my-5 vh-100">
        <!-- Back Button -->
        <a href="/" class="back-btn text-decoration-none"><i class="fas fa-arrow-left"></i> Back</a>
        <!-- Order Form Section -->
        <div class="body1 mt-3">
            <form action="/orderDone" class="form" method="POST">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif

                @csrf
                <h2>Place Order Here - {{ session('username') }}</h2>

                <label for="phone">Phone No:</label>
                <input type="phone" name="phone" required="true" placeholder="03- .....">
                <br>

                <label for="address">Address:</label>
                <input type="text" name="address" required="true" placeholder="City- Area.....">
                <br>

                <input type="submit" class="btn btn-primary btn-block" value="Place Order" name="submit">
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 <a href="/">Prime Picks</a> | All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
