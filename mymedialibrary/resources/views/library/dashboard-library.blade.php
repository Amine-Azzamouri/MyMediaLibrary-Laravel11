<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }
        .navbar {
            Background-color: #42423f;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        .navbar h1 {
            margin: 0;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .navbar button {
            background-color: #555;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        .navbar button:hover {
            background-color: #333; /* Darker color on hover */
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 16px; /* Adjust the gap between cards */
            justify-content: center; /* Center the grid items horizontally */
            padding: 16px; /* Add padding to avoid overlap with the navbar */
        }
        .card {
            width: calc(33.333% - 32px); /* Three cards per row with gap accounted for */
            background-color: #f8f8f8; /* Background color for the card */
            border: 1px solid #ddd; /* Border for the card */
            border-radius: 8px; /* Rounded corners */
            overflow: hidden; /* Hide overflow */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }
        .card img {
            width: 100%;
            height: 200px; /* Fixed height for the image */
            object-fit: cover; /* Ensure the image covers the area */
        }
        .card-body {
            padding: 16px; /* Padding inside the card */
            text-align: center; /* Center align text */
        }
        .card-body h5 {
            margin: 0 0 8px 0; /* Margin adjustments for spacing */
            font-size: 1.5rem; /* Larger font size for the name */
        }
        .card-body p {
            margin: 0;
            font-size: 1rem; /* Smaller font size for the description */
        }
    </style>
</head>
<body>
<div class="navbar">
    <button onclick="window.history.back()">Go Back</button>
    <h1>My Library</h1>
</div>
<div class="container">
    @foreach ($products as $product)
        <div class="card">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <div class="card-body">
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
