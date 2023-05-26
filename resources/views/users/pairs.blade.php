@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col-md-12">

                <h2 class="mt-5 mb-3 text-center">
                    User List
                </h2>

                <a href="{{ route('pairs.create') }}" class="btn btn-primary">Add New</a>

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col"> Name </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pairs as $pair)
                            <tr>
                                <td>{{ $pair->id }}</td>
                                <td>{{ $pair->title }}</td>
                                <td>
                                    <form action="{{ route('pairs.delete', $pair->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
