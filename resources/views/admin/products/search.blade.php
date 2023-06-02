@extends('admin.layouts.app')

@section('title','Products List')

@section('content')
<div class="content">

    <div class="card-dark">

        <h2 class="text-center">Search Result</h2>

        <form action="{{ route('products.index',$keyword) }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter name of product" value="{{ $keyword ? $keyword : old('keyword')  }}"
                    name="keyword" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button type="submit" class="btn btn-success rounded-pills">Search</button>
            </div>
        </form>
        @error('keyword')
        <p class="text-danger"> {{ $message }}</p>
        @enderror

        <div class="">
            @if (session('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            <a href="{{route('products.create')  }}" class="btn btn-success round-pills mt-2" t> Add </a>
            <table class="table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="btn-toolbar">
                {{ $products->appends(Request::except($keyword))->links() }}
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@endsection


