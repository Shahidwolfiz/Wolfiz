<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Projects</title>
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
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        input[type="text"],
        input[type="url"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
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
            margin: 20px 0;
        }

        li {
            background: #e9ecef;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }

        li ul {
            margin-top: 10px;
            padding-left: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
@include('layouts.header')
    <div class="container">
        <h1>Projects</h1>

        <form method="POST" action="/admin/projects">
            @csrf
            <!-- <input type="text" name="name" placeholder="Project Name" required>
            <button type="submit">Add Project</button> -->
        </form>

        <ul>
            @foreach ($projects as $project)
                <li>
                    <strong>{{ $project->name }}</strong>
                    <form method="POST" action="/admin/projects/{{ $project->id }}/links" style="margin-top: 10px;">
                        @csrf
                        <input type="url" name="url" placeholder="Add Link" required>
                        <button type="submit">Add Link</button>
                    </form>
                    <ul>
                        @foreach ($project->links as $link)
                            <li><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    @include('layouts.footer')
</body>
</html>
