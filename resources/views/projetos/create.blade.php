<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 w-50">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="technologies">Technologies:</label>
                <input type="text" class="form-control" name="technologies" id="technologies" required>
            </div>
            <div class="form-group">
                <label for="languages">Languages:</label>
                <input type="text" class="form-control" name="languages" id="languages" required>
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="url" class="form-control" name="link" id="link">
            </div>
            <div class="form-group">
                <label for="images">Images:</label>
                <input type="file" class="form-control-file" name="images[]" id="images" multiple>
            </div>
            <div class="form-group">
                <label for="files">Files:</label>
                <input type="file" class="form-control-file" name="files[]" id="files" multiple>
            </div>
            <!-- inserir a data de inicio e de fim -->
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" name="start_date" id="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
