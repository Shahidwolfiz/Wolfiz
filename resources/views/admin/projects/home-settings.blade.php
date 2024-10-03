<form action="{{ route('admin.home-settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="background_video">Upload Background Video:</label>
    <input type="file" name="background_video" id="background_video" accept="video/mp4,video/x-m4v,video/*">
    <button type="submit">Update</button>
</form>
