@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="offset-md-3 col-md-6">
                <h2 class="mt-5 mb-3 text-center">
                    Add New Pair
                </h2>
                <div class="p-3 border">
                    <form action="{{ route('pairs.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Pair Name</label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                            @if ($errors->has('title'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cage No</label>
                            <input type="text" name="cage_no"
                                class="form-control {{ $errors->has('cage_no') ? ' is-invalid' : '' }}">
                            @if ($errors->has('cage_no'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('cage_no') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Male Ring No</label>
                            <input type="text" name="male_ring" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Female Ring No</label>
                            <input type="text" name="female_ring" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
