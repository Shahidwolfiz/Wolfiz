<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Social Icons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="url"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }

        li {
            background: #e9ecef;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        li i {
            margin-right: 10px;
            font-size: 24px; /* Adjust size of icons */
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
@include('layouts.header')
    <div class="container">
        <h1>Social Icons</h1>

        <form method="POST" action="/admin/social-icons">
            @csrf
            <input type="text" name="name" placeholder="Social Name" required>
            <input type="text" name="icon" placeholder="Icon Class (e.g., fab fa-facebook)" required>
            <input type="url" name="url" placeholder="Social URL" required>
            <button type="submit">Add Social Icon</button>
        </form>

        <ul>
            @foreach ($socialIcons as $socialIcon)
                <li>
                    <i class="{{ $socialIcon->icon }}"></i> 
                    <a href="{{ $socialIcon->url }}" target="_blank">{{ $socialIcon->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    @include('layouts.footer')
</body>
</html>
