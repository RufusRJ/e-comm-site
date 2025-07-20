<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilkamal Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .product-card img {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Nilkamal Furniture</a>
        <div>
            {{-- ADD THIS NEW LINK --}}
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary ms-2">Admin</a>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <h1 class="mb-4">Our Products</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100 product-card">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('placeholder.jpg') }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">${{ number_format($product->price, 2) }}</p>
                            {{-- This link points to the original route --}}
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p>No products available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>