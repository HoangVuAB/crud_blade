@extends('admin.layouts.app')
@section('title','Users')

@section('content')
{{-- {{ var_dump($usersList) }} --}}
<div class="content">
    <div class="card-dark">
        <h2>Users List</h2>
        <div class="">
            <table class="table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersList as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
            <div class="btn-toolbar">
                {{ $usersList->links() }}
            </div>
        </div>
    </div>

</div>

@endsection


;
