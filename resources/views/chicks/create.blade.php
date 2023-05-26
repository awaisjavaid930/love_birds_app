@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="offset-md-3 col-md-6">
                <h2 class="mt-5 mb-3 text-center">
                    Add New Chick
                </h2>
                <div class="p-3 border">
                    <form action="{{ route('chick.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $pair->id }}" />
                        <div class="mb-3">
                            <label class="form-label"> Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                            @if ($errors->has('title'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Breed No</label>
                            <input type="text" class="form-control {{ $errors->has('breed_no') ? ' is-invalid' : '' }}" name="breed_no">
                            @if ($errors->has('breed_no'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('breed_no') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Ring No</label>
                            <input type="text" class="form-control" name="ring_no">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Gender</label>
                            <input type="text" class="form-control" name="gender">
                        </div>
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
