<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="maindiv">
    <div id="loader" style="display: none;"></div>
    <div class="container mt-5">
        <div style="float: right;">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
        </div>
        <h1>Category</h1>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Parent Name</th>
                        <th>Category Name</th>
                        <th>Blade Template</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['all'] as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (!empty($category->parent_category))
                                <td>{{ $category?->parent_category?->name }}</td>
                                @else
                                <td>-</td>
                            @endif
                            <td>{{ $category?->name }}</td>
                            <td>{{ $category?->blade_template }}</td>
                            <td>{{ $category?->status }}</td>
                            <td style="display: flex; justify-content: space-between; align-items: center;">
                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        Trash
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
