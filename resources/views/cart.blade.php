<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <title>My Cart</title>
    <style>
        /* Custom Styles */
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

        /* Back Button */
        .back-btn {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
           
        }

        .back-btn:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }

        /* Cart Table */
        .cart-table th {
            background: var(--primary-color);
            color: var(--light-text);
            padding: 15px;
        }

        .cart-table td {
            padding: 10px;
        }

        .cart-table .btn-outline-success,
        .cart-table .btn-outline-danger {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .cart-table .btn-outline-success:hover,
        .cart-table .btn-outline-danger:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Total Section */
        .total-section {
            background: var(--secondary-color);
            color: var(--light-text);
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .total-section h4 {
            color: var(--light-text);
        }

        .total-section .btn {
            background: var(--primary-color);
            color: var(--light-text);
            border: none;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .total-section .btn:disabled {
            background-color: #b1a9d4;
        }

        .total-section .text-primary {
            color: var(--primary-color);
        }

        .payment-method input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            background-color: #fff;
            border-radius: 100%;
            width: 20px;
            height: 20px;
            position: relative;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .payment-method input[type="radio"]:checked {
            background-color: #fff;
            border-color: #fff;
        }

        .payment-method input[type="radio"]:checked::after {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            width: 10px;
            height: 10px;
            background-color: #6a0dad;
            border-radius: 50%;
        }

        .payment-method label {
            position: relative;
            font-size: 1.2rem;
            font-weight: 400;
            cursor: pointer;
            padding-left: 5px;
        }

        .payment-method input[type="radio"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.5);
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
            .cart-table {
                font-size: 14px;
            }

            .back-btn {
                margin-left: 10px;
            }

            .total-section .btn {
                font-size: 1.1rem;
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
                    <li class="nav-item"><a href="/cart" class="nav-link">My Cart <i
                                class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cart Page -->
    <div class="container mt-5">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="back-btn text-decoration-none"><i class="fas fa-arrow-left"></i> Back</a>

        <h1 class="text-center my-4" style="color: #6a0dad;">CART ITEMS</h1>

        <!-- Cart Table -->
        <div class="table-responsive">
            <table class="table table-bordered cart-table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Quantity +</th>
                        <th scope="col">Quantity -</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php $count = 1;
                    $total = 0; @endphp
                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_price }} Rs/-</td>
                                            <td>{{ $item->item_quantity }}</td>
                                            <td><a href="/quantityAdd/{{$item->item_name}}/{{$item->item_quantity}}"
                                                    class="btn btn-outline-success">+</a></td>
                                            <td><a href="/quantityminus/{{$item->item_name}}/{{$item->item_quantity}}"
                                                    class="btn btn-outline-danger">-</a></td>
                                            <td><a href="/remove/{{$item->item_name}}" class="btn btn-outline-danger">REMOVE</a></td>
                                            @php $count++;
                                            $total += $item->item_price * $item->item_quantity; @endphp
                                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Your cart is empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Total Section  -->
        <div class="total-section p-4 my-5"
            style="background: #6a0dad; border-radius: 15px; color: white; box-shadow: 0px 10px 20px rgba(0,0,0,0.1);">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Left Section: Total Label -->
                <div>
                    <h3 class="total-label" style="font-size: 1.8rem; font-weight: 600;">Your Total</h3>
                </div>
                <!-- Right Section: Total Price -->
                <div class="text-end">
                    <h3 class="total-amount" style="font-size: 2.2rem; font-weight: bold;">{{ $total }} Rs/-</h3>
                </div>
            </div>
            <div class="payment-section mb-4">
                <!-- Payment Option  -->
                <label class="payment-label" style="font-size: 1.1rem; font-weight: 500;">Choose Payment Method:</label>
                <div class="payment-method mt-2">
                    <div class="d-flex align-items-center">
                        <input type="radio" class="form-check-input" name="paymentOption" id="cashOnDelivery" checked>
                        <label class="form-check-label mx-2" for="cashOnDelivery"
                            style="font-size: 1.2rem; font-weight: 400;">Cash On Delivery</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button id="doneButton" class="btn btn-lg btn-action"
                    style="color: #6a0dad; border: none; padding: 12px 30px; border-radius: 50px; font-weight: bold;"
                    onclick="window.location.href='/process_order';">
                    Done
                </button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 <a href="/">Prime Picks</a> | All Rights Reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            const doneButton = $('#doneButton');

            if ({{ $total }} === 0) {
                doneButton.prop('disabled', true);
                doneButton.css('background-color', '#b1a9d4');
            } else {
                doneButton.prop('disabled', false);
                doneButton.css('background-color', '#fff');
            }

            doneButton.hover(
                function () {
                    doneButton.css({
                        'background-color': '#d1c4e9',
                        'transform': 'scale(1.05)',
                    });
                },
                function () {
                    if (!doneButton.prop('disabled')) {
                        doneButton.css({
                            'background-color': '#fff',
                            'transform': 'scale(1)',
                        });
                    }
                }
            );
        });
    </script>
</body>

</html>