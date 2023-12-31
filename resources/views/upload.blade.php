<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload ZIP Forma</title>
</head>
<body>
    <h2>Upload ZIP Fajla</h2>

    @if(session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ url('/upload-scorm-course') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="zip_file">Izaberite ZIP fajl:</label>
        <input type="file" name="file" accept=".zip" required>
        <input type="number" name="id" required>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
