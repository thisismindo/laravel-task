@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To Do List</div>

                <div class="card-body" id="taskapp">
                    <task-list :tasks="tasks"></task-list>
                    <task-composer v-on:newtask="newTask"></task-composer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
