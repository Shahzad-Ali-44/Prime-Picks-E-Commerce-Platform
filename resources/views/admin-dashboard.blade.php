<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Picks - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Custom Purple Theme */
        :root {
            --primary-color: #6a0dad;
            --secondary-color: #9b59b6;
            --light-text: #fff;
            --dark-bg: #2c2c2c;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            color: var(--primary-color);
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Navbar Styling */
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

        .navbar .navbar-brand {
            color: var(--light-text);
            font-size: 1.8rem;
            font-weight: bold;
        }

        .navbar-toggler {
            border: none;
        }

        /* Content Styles */
        .container {
            flex-grow: 1;
        }

        .btn-info {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            color: var(--light-text);
            transition: background-color 0.3s;
        }

        .btn-info:hover {
            background-color: var(--secondary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: var(--primary-color);
            color: var(--light-text);
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        .logout-btn {
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 20px;
        }

        .logout-btn:hover {
            background-color: #c9302c;
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

        /* Responsive Table */
        .table-responsive {
            overflow-x: auto;
        }

        /* Product Card Layout */
        .product-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 90%;
            transition: transform 0.3s ease-in-out;
        }

        .product-row img {
            width: 200px;
            height: 200px;
            object-fit: contain;
            border-radius: 10px;
        }

        .product-info {
            text-align: center;
            margin-top: 15px;
            flex-grow: 1;
        }

        .product-info h4 {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .product-info p {
            color: #666;
            font-size: 0.9rem;
        }

        .product-actions {
            display: flex;
            justify-content: center;
            margin-top: 15px;

        }

        .product-actions a {
            color: var(--light-text);
            text-decoration: none;
            font-weight: bold;
            margin-right: 5px;
            border-radius: 5px;
            background-color: var(--primary-color);
            transition: background-color 0.3s ease;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border: none;
            font-size: 15px;
        }

        .product-actions a:hover {
            background-color: var(--secondary-color);
        }

        .product-actions a:focus,
        .product-actions a:active {
            outline: none !important;
            box-shadow: none !important;
            background-color: var(--primary-color) !important;
            border: none !important;
        }

        .product-row:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px #6a0dad;
        }

        /* Modal Buttons */
        .modal-footer .btn-secondary {
            background-color: var(--secondary-color) !important;
            border: none;
            color: var(--light-text);
            transition: background-color 0.3s ease;
        }

        .modal-footer .btn-danger {
            background-color: var(--primary-color) !important;
            border: none;
            color: var(--light-text);
            transition: background-color 0.3s ease;
        }

        .modal-footer .btn-secondary:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        .modal-footer .btn-danger:hover {
            background-color:var(--secondary-color) !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="" class="navbar-brand"><i class="fa fa-shopping-cart"></i> Prime Picks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/admin/dashboard/productadd" class="nav-link">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/logout" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Order Details Section -->
    <section>
        <div class="container my-5">
        @if (session('productdeleted') == 'true')
            <div class="alert alert-success" role="alert">The product has been deleted successfully.</div>
        @endif
            <h2>Order Details Of Customer</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_price }}</td>
                                <td>{{ $item->item_quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No data available!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Inventory Store Section -->
    <section>
        <div class="container">
            <h2>Inventory Store</h2>
            <div class="row">
                @foreach ($data2 as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-row">
                            <img src="{{ asset('storage/uploads/' . $product->item_pic) }}" alt="{{ $product->item_name }}">
                            <div class="product-info">
                                <h4>{{ $product->item_name }}</h4>
                                <p>Price: ${{ $product->item_price }}</p>
                                <p>@if ($product->item_quantity > 0) Stock available: {{ $product->item_quantity }} @else
                                Out of stock @endif</p>
                            </div>
                            <div class="product-actions">
                                <a href="/admin/dashboard/editProduct/{{ $product->id }}" class="btn btn-primary">Edit
                                    Product</a>
                                <a href="javascript:void(0);" class="btn btn-danger"
                                    onclick="openDeleteModal('{{ $product->id }}')">Delete Product</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: var(--primary-color); color: var(--light-text);">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #f9f9f9;">
                    <p style="color: #333;">Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 <a href="">Prime Picks</a> | All Rights Reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let productIdToDelete = null;
        // Function to open the modal 
        function openDeleteModal(productId) {
            productIdToDelete = productId;
            $('#deleteModal').modal('show'); 
        }

        // Function to perform the deletion
        $('#confirmDeleteBtn').click(function () {
            if (productIdToDelete !== null) {
                window.location.href = '/admin/dashboard/removeProduct/' + productIdToDelete;
            }
        });
    </script>
</body>
</html>