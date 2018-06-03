@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User input</div>

                <div class="card-body" id="taskapp">
                    <user-input></user-input>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection