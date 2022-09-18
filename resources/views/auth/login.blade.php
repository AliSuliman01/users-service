@extends('layouts.app')
@section('main')

    <div class="card w-75 h-50">
        <div class="card-header">
            Login
        </div>
        <div class="card-body d-flex justify-content-center align-items-center">

            <div class="w-75">

                <form action="">

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <div class="col-sm-4">
                    <input type="submit" class="btn btn btn-outline-primary form-control" id="inputSubmit" value="login">
                </div>
            </div>

                </form>
            </div>
        </div>
    </div>

@endsection
