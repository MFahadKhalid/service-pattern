<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Category</title>
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
        <h1>Create Category</h1>
        <div class="mt-5">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="parent">Category</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Add New Parent Category</option>
                            @foreach ($data['all'] as $category)
                                <option value="{{ $category?->id }}">{{ $category?->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">@error('parent_id') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <small class="text-danger">@error('name') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="blade_template">Blade Template</label>
                        <input type="text" name="blade" id="blade" class="form-control">
                        <small class="text-danger">@error('blade') {{ $message }} @enderror</small>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div style="float: right;">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
