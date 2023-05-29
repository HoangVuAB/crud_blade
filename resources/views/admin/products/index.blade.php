@extends('admin.layouts.app')

@section('title','Products List')

@section('content')
<div class="content">

    <div class="card-dark">

        <h2 class="text-center">Products List</h2>

        <form action="{{ route('products.index') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter name of product" value="{{old('keyword') }}"
                    name="keyword" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-success rounded-pills">Search</button>
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
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info">Edit</a>

                            <form action="{{ route('products.destroy',$product->id ) }}" id="deleteForm{{ $product->id }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $product->id }}">

                            </form>
                            <button data-form="deleteForm{{ $product->id }}" id="btn-delete"
                                class="btn btn-primary m-2">Del</button>
                        </td>
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
@section('script')

<script>
    $(document).on('click','#btn-delete',function () {
            let formId = $(this).data('form');
            if (confirm("Delete ?")){
                $(`#${formId}`).submit();
            }
        });
</script>

@endsection
