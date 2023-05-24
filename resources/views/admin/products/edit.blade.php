@extends('admin.layouts.app')

@section('title','Edit List')

@section('content')
<div class="content">
    <div class="card-dark mt-3">
        <h2 class="text-center">Edit products</h2>
        {{-- <pre>
            {{ var_dump($productData) }}
        </pre> --}}

        <div class="text-white">

            <form class="text-white" action="{{ route('products.update',$productData->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" value="{{ $productData->name  }}"
                            placeholder="Product name">
                        <label for="floatingInput" class="text-info">Name</label>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingPassword" name="price" value="{{ $productData->price  }}"
                            placeholder="Price">
                        <label for="floatingPassword" class="text-info">Price</label>
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <select class="form-select text-white" id="floatingSelect" name="category_id"
                            aria-label="Floating label select example">
                            <option selected value="">Category</option>
                            @foreach ($categories as $category)
                               <option value="{{ $category->id }}" {{ ($productData->category_id == $category->id) ? 'selected' : ""  }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect" class="text-info">Choose category:</label>
                    </div>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <a href="{{route('products.index')  }}" class="btn btn-light rounded mt-2 ">Back</a>
                    <button type="submit" class="btn btn-success mt-2 ">Add</button>
                </div>

            </form>

        </div>
    </div>
</div>


@endsection
;
