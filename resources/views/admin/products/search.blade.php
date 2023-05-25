@extends('admin.layouts.app')

@section('title','Products List')

@section('content')
<div class="content">
    {{-- <pre>
        {{ var_dump($products) }}
    </pre> --}}

    <div class="card-dark">

        <h2 class="text-center">Searrch Result</h2>

            <form action="{{ route('products.search') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" value="{{ old('keyword') }}" name="keyword"
                        aria-label="type name of product" aria-describedby="basic-addon2">
                        <button class="btn btn-success rounded-pills">Search</button>
                    @error('keyword')
                       <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </form>
@if ($products->count() > 0)
<div class="">
    @if (session('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
    @endif
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
        {{ $products->links() }}
    </div>
    <a href="{{route('products.index')  }}" class="btn btn-light rounded mt-2 ">Back</a>
</div>
@else
    <div class="d-flex">
        <h3 class="text-white">Not found</h3>
    </div>
@endif
    </div>
</div>

@endsection

