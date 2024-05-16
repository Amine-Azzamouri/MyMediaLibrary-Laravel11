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
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
