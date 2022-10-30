@extends('layouts.sbn')
@section('content')
    <div class="card">
        <div class="card-header">

            @if (Session::has('message'))
                <p class=" alert alert-success alert-sm m-1 mb-0 text-gray-800">{{ session()->get('message') }}</p>
            @else
                <h3 class="mb-0 text-gray-800">Users</h3>
            @endif

                 <form action="/user/search" method="get" style="display: inline">
                    <input type="text" name="search" value="{{ Request::get('search') }}" class="m-1" id="">
                     <button class="btn btn-success btn-sm" >seach</button>
                    </form>
                    <a href=" user/create" class="btn btn-primary btn-sm float-end"  > New User</a>




        </div>
        <div class="card-body">
            <table class="table">
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">email</th>
                        <th scope="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <th scope="row">{{ $u->id }}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->last_name }}</td>
                            <td>{{ $u->email }}</td>
                            <td><a href="/user/delete/{{ $u->id }}" class="btn btn-sm btn-danger m-2">Delete</a><a
                                    href="/user/edit/{{ $u->id }}" class="btn btn-sm btn-info">Edit</a></td>

                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
@endsection
