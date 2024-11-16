<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }
        .card {
            margin-bottom: 20px;
        }
        .note-header {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
        .note-content {
            font-size: 1rem;
            color: #555;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">My Notes</h1>
        
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Create New Note</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="list-group">
            @foreach ($posts as $post)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title note-header">{{ $post->title }}</h5>
                        <p class="card-text note-content">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
