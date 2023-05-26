@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="offset-md-3 col-md-6">
                <h2 class="mt-5 mb-3 text-center">
                    Edit Pair Detail
                </h2>
                <div class="p-3 border">
                    <form action="{{ route('pairs.update' , $pair->id) }}" method="post" id="editPair">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label fo class="form-label">Pair Name</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $pair->title }}">
                            @if ($errors->has('title'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cage No</label>
                            <input type="text" class="form-control {{ $errors->has('cage_no') ? ' is-invalid' : '' }}" name="cage_no" value="{{ $pair->cage_no }}">
                            @if ($errors->has('cage_no'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('cage_no') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Male Ring No</label>
                            <input type="text" class="form-control" name="male_ring" value="{{ $pair->male_ring }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Female Ring No</label>
                            <input type="text" class="form-control" name="female_ring" value="{{ $pair->female_ring }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    $(document).ready(function() {
        $("#editPair").validate({
            rules: {
                title: "required",
                cage_no: "required",
            },
            messages: {
                title: "title is requred",
                cage_no: "Cage no  is required",
            }
        });
    });
@endsection
