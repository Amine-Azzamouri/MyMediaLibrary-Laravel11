<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto's</title>
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            background-color: #0070e0;
            color: #fff;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 12px;
            transition: background-color 0.3s ease;
        }
        label:hover {
            background-color: #0054a4;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="file"] {
            display: none;
        }
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #0070e0;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0054a4;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Foto's</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name">
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    const fileInput = document.getElementById('image');
    const fileLabel = document.querySelector('label[for="image"]');

    fileInput.addEventListener('change', function() {
        const files = this.files;
        if (files.length > 0) {
            if (files.length === 1) {
                fileLabel.textContent = files[0].name;
            } else {
                fileLabel.textContent = files.length + ' foto\'s geselecteerd';
            }
        } else {
            fileLabel.textContent = 'Geen foto geselecteerd';
        }
    });
</script>

</body>
</html>
