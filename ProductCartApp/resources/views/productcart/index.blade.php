<!DOCTYPE html>
<html>
<head>
    <title>Product Cart App</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="description" placeholder="Product Description">
        <input type="number" step="0.01" name="price" placeholder="Product Price" required>
        <button type="submit">Add Product</button>
    </form>

    <h1>Products</h1>
    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h1>Cart</h1>
    <ul>
        @foreach($cartItems as $item)
            <li>
                {{ $item->product->name }} - ${{ $item->product->price }}
                <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
