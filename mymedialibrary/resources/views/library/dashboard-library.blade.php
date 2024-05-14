<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <!-- Assuming you're storing images as binary data -->
                    <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" alt="Product Image">
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>