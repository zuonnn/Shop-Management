<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Information</title>
</head>
<body>
    <h1>Product Information</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>${{ number_format($product['price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
</body>
</html>
