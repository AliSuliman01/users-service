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

                        <div class="d-flex justify-content-around">
                            <a href="{{route('dashboard.database')}}"
                               class="btn btn-link btn-lg p-0">
                                <div class="jumbotron pr-5 pl-5 m-0">{{__('Database')}}
                                </div>
                            </a>
                            <a href="{{route('dashboard.endpoints')}}"
                               class="btn btn-lg btn-link p-0">
                                <div class="jumbotron pr-5 pl-5 m-0">{{__('Endpoints')}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
