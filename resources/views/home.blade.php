@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div class="container text-center">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="p-3">

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Auth::user()->name }} Aviary <br /> </h5>
                                        <p class="card-text"> {{ count($parents) }} <b> Pairs </b> </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="col-6">
                            <div class="p-3">

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
