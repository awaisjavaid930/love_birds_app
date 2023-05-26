@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col-md-12">
                    
                <h2 class="mt-5 mb-3 text-center">
                    User List
                </h2>    
                    
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add New</a>

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col"> Name </th>
                            <th scope="col">Email </th>
                            <th scope="col">Role </th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Admin' : 'User'  }}</td>
                            {{-- <td>
                                <a href="{{ route('users.pairs' , $user ) }}" class="btn btn-primary">Breed</a>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Not Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
