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
            position: relative;
        }
        .go-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #0070e0;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        .go-back:hover {
            background-color: #0054a4;
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

        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .errorfilekind {
        padding: 15px;
        background-color: #f8d7da; 
        color: #721c24; 
        border: 1px solid #f5c6cb; 
        border-radius: 4px;
        margin-bottom: 20px;
        }

        .errorfilesize {
            padding: 15px;
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('previous.page') }}" class="go-back">Go Back</a>
    <h2>Upload Foto's</h2>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="errorfilesize">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="uploadForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>
    @if($errors->has('name'))
        <div class="errorfilekind">
            @foreach ($errors->get('name') as $message)
                {{ $message }}
            @endforeach
        </div>
    @endif
    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>
    @if($errors->has('description'))
        <div class="errorfilekind">
            @foreach ($errors->get('description') as $message)
                {{ $message }}
            @endforeach
        </div>
    @endif
    <label for="images">Images:</label>
    <input type="file" name="images[]" id="images" multiple required>
    @if($errors->has('images'))
        <div class="errorfilekind">
            @foreach ($errors->get('images') as $message)
                {{ $message }}
            @endforeach
        </div>
    @endif
    <button type="submit">Upload</button>
</form>
</div>

<script>

    document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const fileInput = document.getElementById('images');
    const errorContainer = document.querySelector('.errorfilekind');
    if (fileInput.files.length === 0) {
        e.preventDefault();
        errorContainer.innerHTML = 'Please select at least one image.';
        errorContainer.style.display = 'block';
    } else {
        errorContainer.style.display = 'none';
    }
});
    const fileInput = document.getElementById('images');
    const fileLabel = document.querySelector('label[for="images"]');

    fileInput.addEventListener('change', function() {
        const files = this.files;
        if (files.length > 0) {
            if (files.length === 1) {
                fileLabel.textContent = files[0].name;
            } else {
                fileLabel.textContent = files.length + ' photos selected';
            }
        } else {
            fileLabel.textContent = 'No photo selected';
        }
    });
</script>

</body>
</html>
