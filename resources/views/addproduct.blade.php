<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prime Picks - Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;

        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #6a0dad;
            border-color: #6a0dad;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
        }

        .btn-primary:hover,
        .btn-primary:active {
            background-color: #9b59b6 !important;
            border-color: #9b59b6 !important;
            outline: none !important;
        }


        .alert {
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .back-btn {
            background-color: #6a0dad;
            color: #fff;
            border-radius: 5px;
            padding: 8px 20px;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 2rem;
        }

        .back-btn:hover {
            background-color: #9b59b6;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .file-upload-label {
            display: inline-block;
            background-color: #6a0dad;
            color: white;
            border-radius: 8px;
            padding: 8px 20px;
            cursor: pointer;
        }

        .file-upload-label:hover {
            background-color: #9b59b6;
        }

        .form-control:focus {
            border-color: #9b59b6;
            box-shadow: 0 0 10px rgba(155, 89, 182, 0.3);
        }

        .alert-danger,
        .alert-success {
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Alerts for success or error messages -->
        @if (session('PicType') == 'error')
            <div class="alert alert-danger" role="alert">Sorry, the file type of image is not supported!</div>
        @endif

        @if (session('alertSuccess') == 'true')
            <div class="alert alert-success" role="alert">The product has been added successfully.</div>
        @endif

        @if (session('alertError') == 'true')
            <div class="alert alert-danger" role="alert">Sorry, there was an error adding your product.</div>
        @endif

        <a href="/admin/dashboard" class="back-btn">Back</a>

        <h2 class="text-center mb-4">Add New Product</h2>

        <!-- Add Product Form -->
        <form action="/admin/dashboard/productAdded" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formFileLg" class="form-label">Item Image (jpg, jpeg, png, webp)</label>
                <input class="form-control form-control-lg" required id="formFileLg" type="file" name="pic">
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" class="form-control" required id="name" name="name" placeholder="Enter item name">
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Item Price</label>
                <input type="number" class="form-control" required id="price" name="price" placeholder="Enter price"
                    step="0.01">
            </div>

            <div class="form-group">
                <label for="quantity" class="form-label">Item Quantity</label>
                <input type="number" class="form-control" required id="quantity" name="quantity"
                    placeholder="Enter quantity">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>