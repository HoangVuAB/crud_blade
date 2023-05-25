@extends('admin.layouts.app')

@section('title','Products List')

@section('content')
<div class="content">

    <div class="card-dark">
        <pre class="text-white">
            {{ var_dump($products[0]) }}
        </pre>

        <h2>Products List</h2>
        <div class="">
            <table class="table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>
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
        </div>
    </div>
</div>

@endsection

