@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col-md-12">
                    
                <h2 class="mt-5 mb-3 text-center">
                    {{ $pair->title }} Pair Hisotry
                </h2>    
                    
                <a href="{{ route('chick.create' , $pair->id ) }}" class="btn btn-primary">Add New</a>
  
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col">Chick Name</th>
                            <th scope="col">Ring No</th>
                            <th scope="col">Breed No</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chicks as $chick)
                            <tr>
                                <td> {{ $chick->id }}</td>
                                <td> {{ $chick->title }}</td>
                                <td>{{ $chick->ring_no }}</td>
                                <td>{{ $chick->breed_no }}</td>
                                <td>{{ $chick->gender }}</td>
                                <td>
                                    <a href="{{ route('chick.edit' , $chick->id ) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('chick.destroy', $chick->id  ) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6"> Data Not Found</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
