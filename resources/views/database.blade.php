@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Database') }}</div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" id="search-box">
                            </div>
                        </div>
                        <div id="tables">
                            @foreach($tables as $table)
                                <a href="database/{{$table->Tables_in_wanna_learn}}" class="btn btn-outline-info">
                                        {{$table->Tables_in_wanna_learn}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
