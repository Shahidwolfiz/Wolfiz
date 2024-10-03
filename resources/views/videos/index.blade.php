<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
</head>
<body>
    
    <h3>Upload a Video</h3>
    <form method="POST" action="{{ route('videos.uploadVideo') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter Title" required>
        </div>
        <div>
            <label>Choose Video</label>
            <input type="file" name="video" accept="video/*" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    
    <h1>Uploaded Videos</h1>
    @if($videos->isEmpty())
        <p>No videos uploaded yet.</p>
    @else
        <ul>
            @foreach($videos as $video)
                <li>
                    <strong>{{ $video->title }}</strong><br>
                    <video width="320" height="240" controls>
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
