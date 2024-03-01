<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Detail</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="maindiv">
    <div id="loader" style="display: none;"></div>
    <div class="container mt-5">
        <div style="float: right;">
            <a href="{{ route('category.index') }}" class="btn btn-primary">Category</a>
        </div>
        <h1>Category Detail</h1>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif
        <div class="mt-5">
            <div class="card">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Parent Category</th>
                            <td>{{ $data?->parent_category?->name }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $data?->name }}</td>
                        </tr>
                        <tr>
                            <th>Blade Template</th>
                            <td>{{ $data?->blade_template }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $data?->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
