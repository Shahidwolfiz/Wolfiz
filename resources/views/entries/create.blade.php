<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Entries</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@include('layouts.header')
    <h1>Add Entries</h1>
    <form id="entryForm" action="{{ route('entries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="entries">
            <div class="entry" style="margin-bottom: 20px;">
                <label>Name:</label>
                <input type="text" name="name[]" required>

                <label>Description:</label>
                <textarea name="description[]" required></textarea>

                <label>Video URL:</label>
                <input type="url" name="video[]">

                <label>Image:</label>
                <input type="file" name="image[]">

                <label>Background Color:</label>
                <input type="color" name="background_color" required>
            </div>
        </div>
        <button type="button" id="addMore">Add More</button>
        <button type="submit">Submit</button>
    </form>
    <!-- @include('layouts.footer') -->
    <script>
        $('#addMore').click(function() {
            $('#entries').append(`
                <div class="entry" style="margin-bottom: 20px;">
                    <label>Name:</label>
                    <input type="text" name="name[]" required>

                    <label>Description:</label>
                    <textarea name="description[]" required></textarea>

                    <label>Video URL:</label>
                    <input type="url" name="video[]">

                    <label>Image:</label>
                    <input type="file" name="image[]">

                    <label>Background Color:</label>
                    <input type="color" name="background_color" required>
                </div>
            `);
        });
    </script>
</body>
</html>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 2px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #0076bd;
    }

    form {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        margin: auto;
    }

    .entry {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #f7f7f7;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="url"],
    input[type="color"],
    textarea {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    input[type="color"] {
        padding: 0;
        height: 40px;
        border: none;
        outline: none;
        cursor: pointer;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    input[type="file"] {
        padding: 0;
    }

    button {
        background-color: #0076bd;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #005fa3;
    }

    #addMore {
        background-color: #f0f0f0;
        color: #333;
        margin-right: 10px;
    }

    #addMore:hover {
        background-color: #e0e0e0;
    }

    @media (max-width: 600px) {
        form {
            padding: 15px;
        }

        button {
            width: 100%;
            margin-top: 10px;
        }

        #addMore {
            width: 100%;
            margin: 10px 0;
        }
    }
</style>
