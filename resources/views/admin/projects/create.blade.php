<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 2px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #103B99;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: black;
        }

        img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
@include('layouts.header')
    <div class="container">
        <h1>Add Project</h1>

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Project Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <div>
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>

        @if (session('image'))
            <h2>Uploaded Image:</h2>
            <img src="{{ asset('storage/' . session('image')) }}" alt="Uploaded Image">
        @endif
    </div>
    @include('layouts.footer')
</body>
</html>
