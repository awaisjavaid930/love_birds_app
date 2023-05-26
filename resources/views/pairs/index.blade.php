@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col-md-12">
                    
                <h2 class="mt-5 mb-3 text-center">
                    Love Birds Pair List
                </h2>    
                    
                <a href="{{ route('pairs.create') }}" class="btn btn-primary">Add New</a>

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col">Pair Name</th>
                            <th scope="col">Cage No</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($parents as $parent)
                        <tr>
                            <td>{{ $parent->id }}</td>
                            <td>{{ $parent->title }}</td>
                            <td>{{ $parent->cage_no }}</td>
                            <td>
                                <a href="{{ route('pair.chicks' , $parent->id ) }}" class="btn btn-primary">Breed</a>
                                <a href="{{ route('pairs.edit' , $parent->id ) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('pairs.delete', $parent->id  ) }}" method="post" style="display:inline-block;">
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
