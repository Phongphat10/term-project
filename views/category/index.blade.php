<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Category </h2>
                    <div class="h-1 bg-gray-800 w-32"></div><br>
                </div>
                <div class="pull-right mb-10">
                    <a class="px-4 py-2.5 text-white text-sm bg-green-400 rounded" href="{{ route('category.create') }}"> Create item</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr bgcolor ="Magenta" >
                    <th>S.No</th>
                    <th>Caterory Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr  bgcolor ="Lavenderblush">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>
                            <form action="{{ route('category.destroy',$item->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('category.edit',$item->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $categories->links() !!}
    </div>
</body>
</html>
</x-app-layout>