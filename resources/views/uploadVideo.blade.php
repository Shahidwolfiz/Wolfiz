<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Video Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h3 class="text-2xl font-semibold text-center mb-6">Upload a Video</h3>
        <hr class="mb-4">
        <form method="POST" action="{{ route('videos.uploadVideo') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter Title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div class="mb-4">
                <label for="video" class="block text-sm font-medium text-gray-700">Choose Video</label>
                <input type="file" name="video" id="video" accept="video/*" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">Submit</button>
        </form>
    </div>
</body>
</html>
