@extends('layouts.app')
@section('content')
    <div class="container px-4">
        <div class="row gx-5">
            <div class="offset-md-3 col-md-6">
                <h2 class="mt-5 mb-3 text-center">
                    Edit Chick
                </h2>
                <div class="p-3 border">
                    <form action="{{ route('chick.update' , $chick->id ) }}" method="post" id="editChick">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="parent_id" value="{{ $chick->parent_id }}" />
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $chick->title }}" name="title">
                            @if ($errors->has('title'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Breed No</label>
                            <input type="text" class="form-control {{ $errors->has('breed_no') ? ' is-invalid' : '' }}" value="{{ $chick->breed_no }}" name="breed_no">
                            @if ($errors->has('breed_no'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('breed_no') }}.</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Ring No</label>
                            <input type="text" class="form-control" value="{{ $chick->ring_no }}" name="ring_no">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Gender</label>
                            <input type="text" class="form-control" value="{{ $chick->gender }}" name="gender">
                        </div>
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    $(document).ready(function() {
        $("#editChick").validate({
            rules: {
                title: "required",
                breed_no: "required",
            },
            messages: {
                title: "title is requred",
                breed_no: "breed no  is required",
            }
        });
    });
@endsection
