<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Nilkamal Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Nilkamal Furniture</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('placeholder.jpg') }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <h3 class="text-primary">${{ number_format($product->price, 2) }}</h3>
                <hr>
                <p>{{ $product->description }}</p>
                <hr>
                <button class="btn btn-success btn-lg">Add to Cart</button>
            </div>
        </div>
    </div>
</body>
</html>