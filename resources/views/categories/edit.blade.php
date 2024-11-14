<!-- resources/views/categories/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Edit Category</h1>

    <!-- Display Validation Errors if Any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to Edit the Category -->
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <select class="form-control" name="state" required>
                <option value="1" {{ $category->state == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $category->state == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional for interactive features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
