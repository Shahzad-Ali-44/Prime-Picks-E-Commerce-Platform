<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- SEO Meta Tags -->
     <meta name="description" content="Prime Picks offers the best online shopping experience with a wide range of products, customer reviews, and seamless checkout. Explore now!">
    <meta name="keywords" content="online shopping, best deals, buy online, e-commerce, Prime Picks, shopping cart">
    <meta name="author" content="Prime Picks Team">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <title>Prime Picks</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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


        /* Hero Section */
        .hero {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--light-text);
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* Product Card Layout */
        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 100%;

        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px #6a0dad;
        }

        .product-card img {
            width: 200px;
            height: 200px;
            object-fit: contain;
            border-radius: 10px;
        }

        .product-card .card-body {
            text-align: center;
            padding: 10px;
            flex-grow: 1;
        }

        .product-card .btn {
            background: var(--primary-color);
            border: none;
            transition: background 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .product-card .btn:hover {
            background: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .product-card {
                padding: 10px;
            }

            .product-card img {
                height: 180px;
            }

            .product-card .card-body {
                padding: 10px;
            }
        }


        /* Reviews Section */
        .review-section {
            background: #f5f5f5;
            padding: 50px 0;
            text-align: center;
        }

        .review-slider {
            width: 90%;
            margin: auto;
        }

        .swiper-slide {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .review-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .review-card p {
            font-style: italic;
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
        }

        .review-card h5 {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            color: #6a0dad;
            background-color: white;
            border-radius: 50%;
            padding: 15px;
            font-size: 30px;
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

        /* Popup Messages */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            background: var(--primary-color);
            color: white;
            border-radius: 8px;
            padding: 10px;
        }

        /* Sign Up Link */
        .signup-link,
        .login-link {
            color: #6a0dad;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s, text-decoration 0.3s;
        }

        .signup-link:hover,
        .login-link:hover {
            color: #9b59b6;
            text-decoration: underline;
        }

        /* All Products Button */
        .allproducts-btn {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            display: block;
            text-align: right;
        }

        .allproducts-btn:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }
    </style>
</head>

<body>



    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="" class="navbar-brand logo"><i class="fa fa-shopping-cart"></i> Prime Picks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#products" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="#reviews" class="nav-link">Reviews</a></li>
                    <li class="nav-item"><a href="/cart" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>

                    <!-- Login / Logout -->
                    @if (session('isLoggedIn'))
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link" onclick="logoutUser()">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>

                    @else
                        <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
                                data-bs-target="#loginModal"><i class="fas fa-user"></i> Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>



    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background: #6a0dad;">
                    <h5 class="modal-title" id="loginModalLabel">Login to Prime Picks</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required
                                autocomplete="email">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required
                                autocomplete="current-password">
                        </div>
                        <button type="submit" class="btn w-100 text-white" style="background: #6a0dad;">Login</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <p>Don't have an account? <a href="#" class="signup-link" data-bs-toggle="modal"
                            data-bs-target="#signupModal" class="text-primary">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header  text-white" style="background: #6a0dad;">
                    <h5 class="modal-title" id="signupModalLabel">Create a Prime Picks Account</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form id="signupForm">
                        @csrf
                        <div class="mb-3">
                            <label for="signupUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="signupUsername" name="username" required
                                autocomplete="username">
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="signupEmail" name="email" required
                                autocomplete="email">
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="password" required
                                autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn w-100 text-white" style="background: #6a0dad;">Sign Up</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <p>Already have an account? <a href="#" class="login-link" data-bs-toggle="modal"
                            data-bs-target="#loginModal" class="text-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Best Deals on Top Products</h1>
            <p>Exclusive discounts on premium items. Shop now!</p>
        </div>
    </section>

    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer"></div>

    <!-- Product Section -->
    <section class="container mt-5 mb-5" id="products">
        <h2 class="text-center my-5">Our <span style="color: #6a0dad;">Products</span></h2>
        @if ($data->isEmpty())
            <div class="alert alert-success text-center">
                No products available. <br> Please <a href="/admin/dashboard" class="text-decoration-none">add products</a>
                from the admin page.
            </div>
        @else
            <div class="row mb-5">
                @foreach ($data->take(6) as $item)
                    <div class="col-md-4 p-2">
                        <div class="card product-card">
                            <img src="{{ asset('storage/uploads/' . $item->item_pic) }}" alt="{{ $item->item_pic }}">
                            <div class="card-body">
                                <h4>{{ $item->item_name }}</h4>
                            </div>
                            <p class="text-muted">{{ $item->item_price }} Rs/-</p>
                            <button class="btn btn-primary w-100 addToCart" data-name="{{ $item->item_name }}"
                                data-price="{{ $item->item_price }}">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="/productpage" class="allproducts-btn text-decoration-none">All Products <i
                class="fas fa-arrow-right"></i></a>

    </section>




    <!-- Reviews Section -->
    <section class="review-section mb-5" id="reviews">
        <h2 class="my-5">Customer <span style="color: #6a0dad;">Reviews</span></h2>
        <div class="swiper review-slider">
            <div class="swiper-wrapper mb-5">
                <!-- Review 1 -->
                <div class="swiper-slide review-card">
                    <img src="image/customer1.jpg" alt="Customer 1" class="review-img">
                    <p>"Great service and amazing products!"</p>
                    <h5>- Sara</h5>
                </div>
                <!-- Review 2 -->
                <div class="swiper-slide review-card">
                    <img src="image/customer2.jpg" alt="Customer 2" class="review-img">
                    <p>"Fast delivery and excellent quality!"</p>
                    <h5>- Michael</h5>
                </div>
                <!-- Review 3 -->
                <div class="swiper-slide review-card">
                    <img src="image/customer3.jpg" alt="Customer 3" class="review-img">
                    <p>"Highly recommended. 5 stars!"</p>
                    <h5>- Jazy</h5>
                </div>
                <!-- Review 4 -->
                <div class="swiper-slide review-card">
                    <img src="image/customer4.jpg" alt="Customer 4" class="review-img">
                    <p>"Amazing customer support and easy returns."</p>
                    <h5>- John</h5>
                </div>
            </div>

            <!-- Slider Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
    <p>&copy;  <script>document.write(new Date().getFullYear());</script>  <a href="/">Prime Picks</a> | All Rights Reserved | Developed by <a
          href="https://www.linkedin.com/in/shahzad-ali-8817632ab/" class="text-decoration-underline" target="_blank"
          rel="noopener noreferrer">Shahzad Ali</a>   </p> 
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Logout Function
        function logoutUser() {
            $.ajax({
                url: "/logout",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    showToast("You have logged out successfully.", "success");
                    setTimeout(function () { location.reload(); }, 1000);
                },
                error: function (xhr) {
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : "Logout failed!";
                    showToast(errorMessage, "danger");
                }
            });
        }

        // TOAST FUNCTION (For Success/Error Messages)
        function showToast(message, type) {
            var toastHtml = `<div class="toast align-items-center text-white bg-${type} show" role="alert">
                        <div class="d-flex">
                            <div class="toast-body">${message}</div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>`;
            $("#toastContainer").html(toastHtml);
            setTimeout(function () { $(".toast").remove(); }, 3000);
        }





        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var isLoggedIn = @json(session('isLoggedIn'));

            // Cart click handler
            $(".nav-link[href='/cart']").click(function (e) {
                e.preventDefault();
                if (!isLoggedIn) {
                    showToast("You are not logged in!", "danger");
                } else {
                    window.location.href = "/cart";
                }
            });


            // ADD TO CART 
            $(".addToCart").click(function () {
                if (!isLoggedIn) {
                    showToast("You must be logged in to add items to the cart!", "danger");
                    return;
                }

                var itemName = $(this).data("name");
                var itemPrice = $(this).data("price");

                $.ajax({
                    url: "/addToCart",
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        item_Name: itemName,
                        price: itemPrice
                    },
                    success: function (response) {
                        showToast(response.message, "success");
                    },
                    error: function (xhr) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : "Failed to add to cart.";
                        showToast(errorMessage, "danger");
                    }
                });
            });


            // LOGIN FORM 
            $("#loginForm").submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: "/login",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#loginModal").modal("hide");
                        showToast(response.message, "success");
                        setTimeout(function () { location.reload(); }, 1000);
                    },
                    error: function (xhr) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : "Invalid login credentials!";
                        showToast(errorMessage, "danger");
                    }
                });
            });

            // SIGNUP FORM 
            $("#signupForm").submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: "/signup",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#signupModal").modal("hide");
                        showToast(response.message, "success");
                        setTimeout(function () { location.reload(); }, 1000);
                    },
                    error: function (xhr) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : "Signup failed!";
                        showToast(errorMessage, "danger");
                    }
                });
            });

            // SWIPER SLIDER
            var swiper = new Swiper('.review-slider', {
                loop: true,
                slidesPerView: 3,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000, //
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    375: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    }
                }
            });

        });
    </script>
</body>

</html>