<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #5a5a5a;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: inline-block;
            font-size: 16px;
        }

        a:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c0392b;
        }

        .success-message {
            color: green;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

        .error-message {
            color: red;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Categories</h1>

        <!-- Success message -->
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <!-- Link to Create New Category -->
        <a href="{{ route('categories.create') }}">Create New Category</a>

        <!-- Categories Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->state ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
