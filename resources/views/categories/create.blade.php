<!-- resources/views/categories/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Create Category</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" required>
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <select class="form-control" name="state" id="state" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>

<!-- Include Bootstrap JS (optional for interactive features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
