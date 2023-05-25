@extends('admin.layouts.app')

@section('title','Products List')

@section('content')
<div class="content">

    <div class="card-dark">

        <h2 class="text-center">Users List</h2>
        <div class="">
            @if (session('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            <a href="{{route('products.create')  }}" class="btn btn-success round-pills mt-2" t> Add </a>
            <table class="table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Users Name</th>
                        <th>email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('products.edit',$user->id) }}" class="btn btn-info">Edit</a>

                                <form action="{{ route('products.delete',$user->id) }}" id="deleteForm{{ $user->id }}" method="post">
                                    @csrf
                                </form>
                                <button data-form="deleteForm{{ $user->id }}" id="btn-delete" class="btn btn-primary m-2">Del</button>


                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="btn-toolbar">
                {{ $users->links() }}
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
